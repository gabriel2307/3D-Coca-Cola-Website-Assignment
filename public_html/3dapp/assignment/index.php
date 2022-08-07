<?php

use app\controllers\SiteController;
use app\core\Application;

//this configuration only works at /public_html/3dapp/assignments/index.php
require_once __DIR__ . '/../../../vendor/autoload.php';

$app = new Application(dirname(dirname(dirname(__DIR__))));

$app->router->get('/~gu33/3dapp/assignment/index.php', [SiteController::class, 'home']);
$app->router->get('/~gu33/3dapp/assignment/index.php?page=models', [SiteController::class, 'models']);
$app->router->get('/~gu33/3dapp/assignment/index.php?page=about', [SiteController::class, 'about']);

$app->run();