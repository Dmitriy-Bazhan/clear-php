<?php

use \models\query\Query;

class WorkWithDB extends BaseController
{
    public function create()
    {
        $objectQuery = new Query;
        $objectQuery->createUsersTable();
        $objectQuery->createAddressesTable();
        $objectQuery->createOrdersTable();

        $this->template = 'workDB.create';
        return;
    }

    public function fillTable()
    {
        $objectQuery = new Query;
        $string = 'abcdefgihjklmnopqrstuvwxyz';
        $data = '';

        for ($m = 0; $m < 10; $m++) {
            for ($i = 0; $i < 10000; $i++) {
                $name = '';
                for ($t = 0; $t < 2; $t++) {
                    $cnt = rand(0, 25);
                    for ($j = 0; $j < 3; $j++) {
                        $name = $name . $string[$cnt];
                    }
                }
                $email = $name . '@gmail.com';
                $value = "(" . "'" . $name . "'" . ',' . "'" . $email . "'" . ',' . rand(48, 52) . ',' . rand(0, 1) . ")" . ",";
                $data = $data . $value;
            }
            $objectQuery->fillUsers(rtrim($data, ','));
            $data = '';

            $user_id = $objectQuery->getLastTenThousandsUserId();

            // user_id, city, street, number
            for ($i = 0; $i < 10000; $i++) {
                $city = '';
                $street = '';
                for ($j = 0; $j < 4; $j++) {
                    $cnt = rand(0, 25);
                    $city = $city . $string[$cnt];
                    $street = $street . $string[$cnt] . $string[rand(0, 25)];
                }
                $value = "(" . $user_id[$i]['id'] . ',' . "'" . $city . "'" . ',' . "'" . $street . "'" . ',' . rand(1, 100) . ")" . ",";
                $data = $data . $value;
            }
            $objectQuery->fillAddresses(rtrim($data, ','));
            $data = '';


            //user_id, orders, price
            for ($i = 0; $i < 10000; $i++) {
                $countOfOrders = rand(0, 5);
                for ($o = 0; $o < $countOfOrders; $o++) {
                    $orders = '';
                    for ($j = 0; $j < 4; $j++) {
                        $cnt = rand(0, 25);
                        $orders = $orders . $string[$cnt];
                    }
                    $rnd = rand(true, false);
                    if ($rnd) {
                        continue;
                    }
                    $value = "(" . $user_id[$i]['id'] . ',' . "'" . $orders . "'" . ',' . rand(10, 10000) . ")" . ",";
                    $data = $data . $value;
                }
            }
            $objectQuery->fillOrders(rtrim($data, ','));
            $data = '';

        }
        $this->template = 'workDB.fill';
        return;
    }

    public function selectAll()
    {
        $start_time = microtime(true);
        $object = new Query;
        $this->data['result'] = $object->selectAll();
        $this->data['time'] = (microtime(true) - $start_time) * 1000;
        $this->data['page'] = 'SELECT';

//        $start_time = microtime(true);
//        $this->data['result2'] = $object->simpleSelect();
//        $this->data['time2'] = (microtime(true) - $start_time) * 1000;

        $this->template = 'workDB.select_all';
        return;
    }

    public function clear($table)
    {
        $objectQuery = new Query;
        $objectQuery->clear('addresses');
        $objectQuery->clear('orders');
        $objectQuery->clear('users');
        $this->template = 'workDB.clear';
        return;
    }

    public function delete($table)
    {
        $objectQuery = new Query;
        $objectQuery->delete('addresses');
        $objectQuery->delete('orders');
        $objectQuery->delete('users');
        $this->template = 'workDB.clear';
        return;
    }

    public function selectByAge($age)
    {
        $start_time = microtime(true);
        $objectQuery = new Query;
        $result = $objectQuery->selectLeftJoin($age, 1);
        $this->data['result_left_join'] = $result;

//        foreach ($this->data['result'] as & $value) {
//            $value['id'] = 1;
//        }
//        unset($value);

        $this->data['time_left_join'] = (microtime(true) - $start_time) * 1000;


        $start_time = microtime(true);
        $result = $objectQuery->selectRightJoin($age, 1);
        $this->data['result_right_join'] = $result;
        $this->data['time_right_join'] = (microtime(true) - $start_time) * 1000;


        $start_time = microtime(true);
        $result = $objectQuery->selectJoin($age, 1);
        $this->data['result_join'] = $result;
        $this->data['time_join'] = (microtime(true) - $start_time) * 1000;


        $this->template = 'workDB.selectByAge';
        return;
    }

    public function createProcedure()
    {
        $object = new Query;
        $object->createProcedure();
        $this->template = 'workDB.create';
        return;
    }
}