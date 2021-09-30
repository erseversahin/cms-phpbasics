<?php

namespace App\Controllers;

use App\Model\ModelUser;
use Core\BaseController;
use Core\Session;

class User extends BaseController
{


    public function Index()
    {
        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['user'] = Session::getAllSession();

        echo $this->view->load('user/index',compact('data'));

    }
    public function EditProfile()
    {

    }
    public function ChangePassword()
    {

    }

}