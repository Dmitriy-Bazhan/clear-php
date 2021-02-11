<?php

namespace Core;

use app\routers\Router;

class Application
{
    public function run()
    {
        $routers = new Router();
        $action = $routers->setRouter();

        if (file_exists('controllers' . DS . $action['path'] . '.php')) {
            $object = new $action['class'];
            $method = $action['method'];
            $variable = isset($action['parameter']) ? $action['parameter'][1] : '';
            $object->$method($variable);
            if (method_exists($object, 'render')) {
                $object->render();
            }
        } else {
            echo 'not exists';
        }
    }


}