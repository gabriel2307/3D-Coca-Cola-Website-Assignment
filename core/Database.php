<?php


namespace app\core;


use PDO;

class Database
{
    public $pdo;
    /**
     * Database constructor.
     */
    public function __construct()
    {
        $path = "sqlite:" . Application::$root . "/databases/gabslab.db";

        $this->pdo = new PDO($path);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $applied = $this->getAppliedMigrations();

        $newMigrations = [];
        $files = scandir(Application::$root.'/migrations');
        $toApply = array_diff($files, $applied);
        foreach ($toApply as $migration) {
            if($migration === '.' || $migration === '..') continue;

            require_once Application::$root.'/migrations/'.$migration;
            $className = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $className();
            $this->log("Applying migration $migration");
            $instance->up();
            $this->log("Applied migration $migration");
            $newMigrations[] = $migration;
        }

        if(!empty($newMigrations)) {
            $this->saveMigrations($newMigrations);
        } else{
            $this->log("All migrations are applied");
        }
    }

    public function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");
    }

    public function getAppliedMigrations()
    {
        $stmt = $this->pdo->prepare("SELECT migration FROM migrations");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function saveMigrations(array $migrations)
    {
        $migrations = implode(',', array_map(function($m){ return "('$m')"; }, $migrations));

        $stmt = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES
            $migrations
        ");

        $stmt->execute();
    }

    private function log($message)
    {
        echo "[" . date("Y-m-d H:i:s") . "] - " . $message . PHP_EOL;
    }
}