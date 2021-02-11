<?php


class Tools

{
    public static function includeTemplate(string $template, $data = null)
    {
        $filePath = 'templates' . DS . str_replace('.', DS, $template) . '.php';
        if (file_exists($filePath)) {
            require_once $filePath;
        }
    }

    public static function redirectTo($url)
    {
        header('Location: ' . $url);
        die('Please click <a href="' . $url . '">here</a>  to proceed.');
    }

    public static function clearValue($value)
    {
        $value = trim($value);
        $value = trim($value, '/');
        $value = stripslashes($value);
        $value = strip_tags($value);
//        $value = htmlspecialchars($value, ENT_QUOTES);
        $value = htmlentities($value, ENT_QUOTES);
        return $value;
    }

    public static function validateName($value)
    {
        return preg_match('/^[A-Za-zА-Яа-я _-]{1,10}$/u', $value);
    }

    public static function validateAge($value)
    {
        return preg_match('/^[0-9]+$/i', $value);
    }

    public static function agent()
    {
        return $_SERVER['HTTP_USER_AGENT'];
    }

    public static function showEnv()
    {
        echo '<pre>';
        print_r(getenv());
        echo '</pre>';
    }

    public static function showServer()
    {
        echo '<pre>';
        print_r($_SERVER);
        echo '</pre>';
    }

    public static function dd($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
        die();
    }

    public static function dump($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
}