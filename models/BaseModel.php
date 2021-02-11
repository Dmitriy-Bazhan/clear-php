<?php

namespace models;

use app\Connect\Connect;

class BaseModel
{
    protected $config;
    protected $connect;

    public function __construct()
    {
        $this->config = require 'config' . DS . 'connect_to_clear_php.php';
        $this->connect = Connect::makeConnect($this->config);
    }

    protected function myQuery($query, $param = [])
    {
        $connect = $this->connect;
        try {
            $connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $connect->beginTransaction();
            $result = $connect->prepare($query);
            $result->execute($param);
            $connect->commit();

        } catch (\PDOException $e) {
            $connect->rollBack();
            if (SHOW_DEBUG) {
                die('QUERY NOT POSSIBLE, BECAUSE : ' . $e->getMessage());
            } else {
                die('QUERY NOT POSSIBLE');
            }
        }
        return $result;
    }
}