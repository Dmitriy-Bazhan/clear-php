<?php

require_once __DIR__ . DS . 'Core' . DS . 'Loader.php';

$class = 'Core' . DS . 'Loader';
spl_autoload_register([$class, 'load']);

Core\Loader::registerPath(__DIR__);
Core\Loader::registerPath(__DIR__ . DS . '..' . DS . 'controllers');

$routing = new \app\routers\Routers();
$registerPath = $routing->routes();

foreach ($registerPath as $item) {
    if (strpos($item, '/')) {
        $temp = str_replace('/', DS, substr($item, 0, strripos($item, '/')));
        Core\Loader::registerPath(__DIR__ . DS . '..' . DS . 'controllers' . DS . $temp);
    } else {
        continue;
    }
}
