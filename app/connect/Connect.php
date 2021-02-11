<?php

namespace app\Connect;

class Connect
{
    public static function makeConnect($config)
    {
        try {
            $connect = new \PDO($config['dns'], $config['user'], $config['password'],[\PDO::ATTR_PERSISTENT => true]);
        } catch (\PDOException $ex) {
            if (SHOW_DEBUG) {
                die('NO CONNECT' . $ex->getMessage());
            } else {
                die('NO CONNECT');
            }
        }
        return $connect;
    }

}