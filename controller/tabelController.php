<?php
    require_once "controller/services/mysqlDB.php";
    require_once "controller/services/view.php";
    require_once "controller/controller.php";
    require_once "model/tabel.php";

    class tabelController extends Controller{
        /**
         * Method untuk mengambil data overall dari database
         * @return array data overall
         */
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
        /**
         * Method untuk mengambil data region dari database
         * @param string $region
         * @return array data region
         */
        public function getDataRegion($region)
        {
            $currentCase = 0;
            $query = "
                SELECT date, confirmed, released, deceased 
                FROM timeprovince 
                WHERE province_name='$region'
            ";
            $query_result = $this->db->executeSelectQuery($query);

            $result = [];

            foreach ($query_result as $key => $value) {
                $result [] = new Tabel($value['date'],$value['confirmed']-$currentCase,$value['confirmed'],$value['released'],$value['deceased']);
                $currentCase = $value['confirmed'];
            }
            return $result;
        }
        /**
         * Method untuk mengambil data nama province
         * @return array data nama provincce
         */
        public function getAllProvince()
        {
            $query = "
                SELECT DISTINCT province_name 
                FROM timeprovince
            ";
            $query_result = $this->db->executeSelectQuery($query);

            $result = [];

            foreach ($query_result as $key => $value) {
                $result [] = $value['province_name'];
            }
            return $result;
        }
        
    }
?>