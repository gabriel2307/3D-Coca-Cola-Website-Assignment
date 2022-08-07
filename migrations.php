<?php

use app\controllers\SiteController;
use app\core\Application;

require_once __DIR__ . '/vendor/autoload.php';

$app = new Application(__DIR__);

$app->db->applyMigrations();