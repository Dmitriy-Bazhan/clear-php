<?php

class BaseController
{
    public $template = '';
    public $data;

    public function render()
    {
        if (!empty($this->template)) {
            $data = $this->data;
            if (file_exists('templates' . DS . str_replace('.', DS, $this->template) . '.php')) {
                require_once 'templates' . DS . 'layout' . DS . 'layout.php';
            }
        }
        return;
    }
}