<?php

namespace app\routers;

class Router
{
    public function setRouter()
    {
        $router = [];

        $RoutersObject = new Routers();
        $routers = $RoutersObject->routes();
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//        echo $uri . '<br>';
        if (!empty($uri) && strpos($uri, '=')) {
            $variable = substr($uri, (strripos($uri, '/') + 1));
            $router['parameter'] = explode('=', $variable);
            $uri = substr($uri, 0, (strripos($uri, '/') + 1)) . '{' . $router['parameter'][0] . '}';
            if (in_array($uri, array_flip($routers)) && !empty($router['parameter'][1])) {
                $pathAndMethod = explode('+', $routers[$uri]);
                $router['path'] = $pathAndMethod[0];
                if (strpos($router['path'], '/')) {
                    $temp = str_replace('/', '.', $router['path']);
                    $router['class'] = substr($temp, (strripos($temp, '.') + 1));
                } else {
                    $router['class'] = $router['path'];
                }
                $router['method'] = $pathAndMethod[1];
            } else {
                $router['path'] = '404';
            }

        } else {
            if (in_array($uri, array_flip($routers))) {
                $pathAndMethod = explode('+', $routers[$uri]);
                $router['path'] = $pathAndMethod[0];

                if (strpos($router['path'], '/')) {
                    $temp = str_replace('/', '.', $router['path']);
                    $router['class'] = substr($temp, (strripos($temp, '.') + 1));
                } else {
                    $router['class'] = $router['path'];
                }

                $router['method'] = $pathAndMethod[1];
            } else {
                $router['path'] = '404';
            }
        }
        return $router;
    }
}