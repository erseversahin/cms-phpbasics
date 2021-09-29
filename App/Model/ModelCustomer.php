<?php

namespace App\Model;

use Core\BaseModel;
use Core\Session;

class ModelCustomer extends BaseModel
{
    public function createCustomer($data){

        extract($data);

        $user = $this->db->connect->prepare('INSERT INTO customers SET 
                          customers.name =?,
                          customers.surname =?,
                          customers.email =?,
                          customers.phone =?,
                          customers.gsm =?,
                          customers.address =?,
                          customers.company =?
                          ');
        $insert = $user->execute([
           $customer_name,
           $customer_surname,
           $customer_email,
           $customer_phone,
           $customer_gsm,
           $customer_address,
           $customer_company
        ]);

        if ($insert){
            return true;
        }else{
            return false;
        }
    }

    public function getCustomers(){

        return $this->db->query('SELECT * FROM customers', true);

    }
    public function getCustomer($id){

        return $this->db->query("SELECT * FROM customers WHERE id = '$id' " , false);

    }
    public function editCustomer($data){

        extract($data);

        $user = $this->db->connect->prepare('UPDATE customers SET 
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
}