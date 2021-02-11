<?php

namespace Core;

class Loader
{
    public static $path = [];

    public static function load(string $className)
    {
        $filePath = str_replace('/\\', DS, $className) . '.php';
        if (file_exists($filePath)) {
            require_once $filePath;
        } else {
            foreach (self::$path as $path) {
                $fileName = rtrim($path, '/\\') . DS . $filePath;
                if (file_exists($fileName)) {
                    require_once $fileName;
                }
            }
        }
    }

    public static function registerPath($path)
    {
        if (in_array($path, self::$path)) {
            return FALSE;
        }
        self::$path[] = $path;
    }
}