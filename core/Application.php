<?php
namespace app\core;

class Application
{
    public static $root;
    public static $app;
    public $router;
    public $request;
    public $response;
    public $db;

    public function __construct($rootPath)
    {
        self::$root = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);

        $this->db = new Database();
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}