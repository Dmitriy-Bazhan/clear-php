<?php

use app\routers\Routers;

class Mainpage extends BaseController
{
    public function index()
    {

        $this->template = 'mainpage';
        return;
    }
}