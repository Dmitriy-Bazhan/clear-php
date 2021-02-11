<?php


class Post extends BaseController
{
    public function index()
    {
//        \Tools::showServer();
//        \Tools::showEnv();
        $this->template = 'post.post';
        return;
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $errors = [];
            $value = [];

            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $value['name'] = \Tools::clearValue($_POST['name']);
                if(!\Tools::validateName($value['name'])){
                    $errors[] = 'Not valid name';
                }
            } else {
                    $errors[] = 'Enter name';
            }

            if (isset($_POST['lastname']) && !empty($_POST['lastname'])) {
                $value['lastname'] = \Tools::clearValue($_POST['lastname']);
                if(!\Tools::validateName($value['lastname'])){
                    $errors[] = 'Not valid lastname';
                }
            }else{
                $errors[] = 'Enter last name';
            }

            if (isset($_POST['age']) && !empty($_POST['age'])) {
                $value['age'] = \Tools::clearValue($_POST['age']);
                if(!\Tools::validateAge($value['age'])){
                    $errors[] = 'Not valid age';
                }
            }else{
                $errors[] = 'Enter age';
            }
        }
        if(count($errors) == 0)
        {
            $this->storeToDb();
        }
        $this->data['errors'] = $errors;
        $this->data['value'] = $value;
        $this->template = 'post.post';
        return;
    }

    public function storeToDb()
    {
        Tools::redirectTo('/complete');
        return;
    }

    public function complete()
    {
        $this->template = 'post.post';
        $this->data['complete'] = 'complete';
        return;
    }
}