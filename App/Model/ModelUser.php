<?php

namespace App\Model;

use Core\BaseModel;
use Core\Session;

class ModelUser extends BaseModel
{

    public function getProfile(){
        $id = intval(Session::getSession('id'));
        return $this->db->query("SELECT * FROM system_users WHERE id = '$id' " , false);

    }
    public function editProfile($data){

        extract($data);

        $user = $this->db->connect->prepare('UPDATE system_users SET 
                          customers.name =?,
                          customers.surname =?,
                          customers.email =?,
                          customers.phone =?,
                          customers.gsm =?,
                          customers.address =?,
                          customers.company =? WHERE customers.id =?
                          ');
        $update = $user->execute([
            $customer_name,
            $customer_surname,
            $customer_email,
            $customer_phone,
            $customer_gsm,
            $customer_address,
            $customer_company,
            $customer_id,
        ]);

        if ($update){
            return true;
        }else{
            return false;
        }

    }

    public function changePassword($data){

    }

}