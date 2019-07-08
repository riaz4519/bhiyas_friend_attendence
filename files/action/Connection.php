<?php



class Connection
{

    public $connect;

    public function __construct()
    {

        $this->connect = new mysqli('localhost','root','','attendance') or die();

    }

    public function connect(){


        return $this->connect;
    }

}