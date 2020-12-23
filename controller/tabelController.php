<?php
    require_once "controller/services/mysqlDB.php";
    require_once "controller/services/view.php";
    require_once "controller/controller.php";
    require_once "model/tabel.php";

    class tabelController extends Controller{
        
        public function getDataOverall(){
            $currentCase = 0;
            $query = "
                SELECT date,confirmed,released,deceased 
                FROM time
            ";
            $query_result = $this->db->executeSelectQuery($query);

            $result = [];

            foreach($query_result as $key => $value){
                $result [] = new Tabel($value['date'],$value['confirmed']-$currentCase,$value['confirmed'],$value['released'],$value['deceased']);
                $currentCase = $value['confirmed'];
            }
            return $result;
        }
    }
?>