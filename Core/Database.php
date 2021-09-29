<?php

namespace Core;

class Database
{
    public $connect;

    public function __construct()
    {

        $this->connect = new \PDO('mysql:host='.HOST.';dbname='.DB.';', DB_USER,DB_PASSWORD);
    }

    public function query($sql,$multi = false)
    {

        if ($multi == false){
            return $this->connect->query($sql, \PDO::FETCH_ASSOC)->fetch() ?? [];
        }else{
            return $this->connect->query($sql, \PDO::FETCH_ASSOC)->fetchAll() ?? [];
        }
    }

}