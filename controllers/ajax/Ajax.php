<?php


class Ajax extends BaseController
{
    public function game()
    {
        $this->template = 'games.game';
        return;
    }

    public function ajaxPush()
    {
        $this->template = 'ajax.ajax';
        return;
    }
}