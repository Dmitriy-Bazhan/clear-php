<?php


namespace app\routers;


class Routers
{
    public function routes()
    {
        return [

            '/' => 'mainpage+index',

            '/create' => 'workDB/WorkWithDB+create',

            '/fill' => 'workDB/WorkWithDB+fillTable',

            '/clear' => 'workDB/WorkWithDB+clear',

            '/delete' => 'workDB/WorkWithDB+delete',

            '/select/{age}' => 'workDB/WorkWithDB+selectByAge',

            '/select' => 'workDB/WorkWithDB+selectAll',

            '/create-procedure' => 'workDB/WorkWithDB+createProcedure',

            '/game' => 'ajax/Ajax+game',

            '/ajax_push' => 'ajax/Ajax+ajaxPush',

            '/check_post' => 'post/Post+index',

            '/store' => 'post/Post+store',

            '/store_to_db' => 'post/Post+storeToDb',

            '/complete' => 'post/Post+complete',
        ];
    }
}