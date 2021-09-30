<?php

namespace App\Model;

use Core\BaseModel;
use Core\Session;

class ModelProject extends BaseModel
{
    public function createProject($data){
        extract($data);

        if (!$customer_id || $customer_id == null || is_string($customer_id)){
            $customer_id = 0;
        }
        $start_date = !$start_date ? date('Y-m-d') : $start_date;
        $end_date = !$end_date ? date('Y-m-d') : $end_date;

        $user = $this->db->connect->prepare('INSERT INTO projects SET 
                          projects.customer_id =?,
                          projects.title =?,
                          projects.description =?,
                          projects.start_date =?,
                          projects.end_date =?,
                          projects.added_id =?,
                          projects.progress =?,
                          projects.status =?
                          ');
        $insert = $user->execute([
           $customer_id,
           $title,
           $description ?? '',
           $start_date,
           $end_date,
           intval(Session::getSession('id')),
           $progress ?? 1,
           $status ?? 'a'
        ]);

        if ($insert){
            return true;
        }else{
            return false;
        }
    }

    public function getProjects(){

        return $this->db->query('SELECT projects.*, customer_id, CONCAT(c.name," ", c.surname) as customer_name FROM projects  LEFT JOIN customers c on c.id = projects.customer_id', true);

    }
    public function getProjectsByStatus($status = 'a'){

        return $this->db->query("SELECT projects.*, customer_id, CONCAT(c.name,' ', c.surname) as customer_name FROM projects  
                                    LEFT JOIN customers c on c.id = projects.customer_id 
                                    WHERE projects.status = '$status' ", true);

    }
    public function getProjectsByCustomerID($id){

        return $this->db->query("SELECT * FROM projects WHERE projects.customer_id = '$id' ", true);

    }
    public function getProject($id){

        return $this->db->query("SELECT * FROM projects WHERE id = '$id' " , false);

    }
    public function editProject($data){

        extract($data);

        if (!$customer_id || $customer_id == null){
            $customer_id = 0;
        }
        $start_date = !$start_date ? date('Y-m-d') : $start_date;
        $end_date = !$end_date ? date('Y-m-d') : $end_date;

        $user = $this->db->connect->prepare('UPDATE projects SET 
                          projects.customer_id =?,
                          projects.title =?,
                          projects.description =?,
                          projects.start_date =?,
                          projects.end_date =?,
                          projects.added_id =?,
                          projects.progress =?,
                          projects.status =? WHERE projects.id =?
                          ');
        $insert = $user->execute([
            intval($customer_id),
            $title,
            $description ?? '',
            $start_date,
            $end_date,
            intval(Session::getSession('id')),
            $progress ?? 1,
            $status ?? 'a',
            $id
        ]);

        if ($insert){
            return true;
        }else{
            return false;
        }

    }
}