<?php

namespace App\Middlewares;

use Core\BaseMiddleware;
use Core\Session;

class AuthMiddleware extends BaseMiddleware
{


    public function isLogin(){

        $login = Session::getSession('login');

        if (!$login){
            session_destroy();
            redirect('giris');
        }

    }


}