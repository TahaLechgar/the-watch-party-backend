<?php

namespace app\core;


class Controller
{

    protected Response $response;


    public function __construct()
    {
        $this->response = new Response();
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST ' );
        header('Access-Control-Allow-Credentials: true');
    }


    /**
     * @param $view
     * @param array $params
     * @return string
     */
    public function render($view, array $params = []): string
    {
        return Application::$app->router->renderView($view, $params);
    }

    /**
     * @param $model
     * @return mixed|null
     */

    public function model($model)
    {

        if(file_exists(dirname(__DIR__)."\models\\".$model.".php")){
            $model = "\app\models\\".$model;
            return new $model();
        }
        return null;
    }
}