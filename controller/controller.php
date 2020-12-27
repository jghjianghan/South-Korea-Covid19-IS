<?php
    require_once "controller/services/mysqlDB.php";
    require_once "controller/services/view.php";

    abstract class Controller{
        protected $db;

        public function __construct()
        {
            //instansiasi database di sini
             $this->db = new MySQLDB("localhost","root","", "covid19");
        }
    }
