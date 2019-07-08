<?php

require 'Connection.php';


class Department extends Connection
{

    public function register($name,$sort_name){

        $query = "insert into department(name,sort_name)values ('$name','$sort_name')";

        try{

            return $this->connect()->query($query);

        }catch (Exception $exception){

            return $exception->getMessage();
        }


    }

}