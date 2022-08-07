<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\X3DModel;

class SiteController extends Controller
{
    public function home()
    {
        return $this->render('home');
    }

    public function models()
    {
        $models = (new X3DModel())->all();

        return $this->render('model', [
            'models' => $models
        ]);
    }

    public function about()
    {
        return $this->render('about');
    }
}