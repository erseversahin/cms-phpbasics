<?php

namespace App\Model;

use Core\BaseModel;
use Core\Session;

class ModelAuth extends BaseModel
{
    public function userLogin($data){

        extract($data);

        $password = md5($password);

        $user = $this->db->query("SELECT * FROM system_users 
            WHERE system_users.email = '$email' && system_users.password = '$password' ");

        if ($user){
            Session::setSession('login',true);
            Session::setSession('name',$user['name']);
            Session::setSession('surname',$user['surname']);
            Session::setSession('email',$user['email']);
            Session::setSession('id',$user['id']);
            Session::setSession('password',$user['password']);
            return true;
        }else{
            return false;
        }
    }
}