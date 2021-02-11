<?php

namespace models\query;

use models\BaseModel;

class Query extends BaseModel
{
    public function getLastTenThousandsUserId()
    {
        $query = "SELECT id FROM users ORDER BY id DESC LIMIT 10000";
        $result = $this->myQuery($query);
        return array_reverse($result->fetchAll(\PDO::FETCH_ASSOC));
    }

    public function createUsersTable()
    {

        $query = "CREATE TABLE IF NOT EXISTS users(
                  id bigint AUTO_INCREMENT, 
                  name varchar(255) NOT NULL, 
                  email varchar(255) NOT NULL, 
                  age tinyint,
                  gender tinyint,
                  PRIMARY KEY (id)
                  )";
        $this->myQuery($query);
        return;
    }

    public function createAddressesTable()
    {

        $query = "CREATE TABLE IF NOT EXISTS addresses(
                  id bigint AUTO_INCREMENT, 
                  user_id bigint,
                  city varchar(255) NOT NULL, 
                  street varchar(255) NOT NULL, 
                  number tinyint,
                  PRIMARY KEY (id),
                  FOREIGN KEY address_user_id(user_id) REFERENCES users(id) ON DELETE CASCADE 
                  )";
        $this->myQuery($query);
        return;
    }

    public function createOrdersTable()
    {

        $query = "CREATE TABLE IF NOT EXISTS orders(
                  id bigint AUTO_INCREMENT, 
                  user_id bigint,
                  orders varchar(255) NOT NULL, 
                  price numeric(10,2),
                  PRIMARY KEY (id),
                  FOREIGN KEY works_user_id(user_id) REFERENCES users(id) ON DELETE CASCADE
                  )";
        $this->myQuery($query);
        return;
    }

    public function fillUsers($data)
    {
        $query = "INSERT INTO users(name, email, age, gender) VALUES $data";
        $this->myQuery($query);
        return;
    }

    public function fillAddresses($data)
    {
        $query = "INSERT INTO addresses(user_id, city, street, number) VALUES $data";
        $this->myQuery($query);
        return;
    }

    public function fillOrders($data)
    {
        $query = "INSERT INTO orders(user_id, orders, price) VALUES $data";
        $this->myQuery($query);
        return;
    }

    public function clear($table)
    {
        $query = "SET FOREIGN_KEY_CHECKS =  0";
        $this->myQuery($query);
        $query = "TRUNCATE TABLE clear_php.$table";
        $this->myQuery($query);
        $query = "SET FOREIGN_KEY_CHECKS = 1";
        $this->myQuery($query);
        return;
    }

    public function delete($table)
    {
        $query = "DROP TABLE clear_php.$table";
        $this->myQuery($query);
        return;
    }

    public function selectAll()
    {
//        $query = "SELECT *,users.id AS user_id, orders.id AS order_id, addresses.id AS addresses_id
//                  FROM users
//                  JOIN orders ON users.id = orders.user_id
//                  JOIN addresses ON users.id = addresses.user_id";

        $query = "CALL Name(@name)";
        $result = $this->myQuery($query);
//        \Tools::dd($result);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function simpleSelect()
    {
        $query = "SELECT name FROM users";
        $result = $this->myQuery($query);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectLeftJoin($age, $gender)
    {
        $query = "SELECT * , users.id AS user
                  FROM users LEFT JOIN orders ON users.id = orders.user_id WHERE users.age BETWEEN 48 AND 52";
        $param = [$age];
        $result = $this->myQuery($query, $param);

        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectRightJoin($age, $gender)
    {
        $query = "SELECT * , users.id AS user
                  FROM users RIGHT JOIN orders ON users.id = orders.user_id WHERE users.age BETWEEN 48 AND 52";
        $param = [$age];
        $result = $this->myQuery($query, $param);

        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectJoin($age, $gender)
    {
        $query = "SELECT * , users.id AS user
                  FROM users JOIN orders ON users.id = orders.user_id WHERE users.age BETWEEN 48 AND 52";
        $param = [$age];
        $result = $this->myQuery($query, $param);

        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function createProcedure()
    {
        $query = "USE clear_php;
DELIMITER //
CREATE PROCEDURE SelectAllNames(OUT name VARCHAR(6))BEGIN SELECT name FROM users;
END//
DELIMITER ;";
        $connect = $this->connect;
        $connect->query($query);
        return;
    }
}