<?php
    require_once "controller/services/mysqlDB.php";
    require_once "controller/services/view.php";
    require_once "controller/controller.php";
    require_once "model/tabel.php";

    class TabelController extends Controller{
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
        /**
         * Method untuk mengambil data overall dengan rentang x - y
         * @param string $from
         * @param string $to
         * @return array data overall dengan rentang waktu
         */
        public function getDataOverallRange($from, $to)
        {
            // $f1 = str_replace('/','-',$from);
            // $t1 = str_replace('/','-',$to);
            $newFrom = ($from!=="")?date("Y-m-d",strtotime($from)):"";
            $newTo = ($to!=="")?date("Y-m-d",strtotime($to)):"";
            $currentCase = ($newFrom!=="")?$this->getPrefCurrentCaseOverall($newFrom):0;
            
            $query = "";
            if ($newFrom === "" && $newTo === ""){
                return $this->getDataOverall();
            } else if ($newFrom === ""){
                $query = "
                    SELECT date,confirmed,released,deceased 
                    FROM time 
                    WHERE date <= '$newTo' 
                ";
            } else if ($newTo === ""){
                $query = "
                    SELECT date,confirmed,released,deceased 
                    FROM time 
                    WHERE date >= '$newFrom' 
                ";
            } else { //lengkap
                $query = "
                    SELECT date,confirmed,released,deceased 
                    FROM time 
                    WHERE date >= '$newFrom' AND date <= '$newTo' 
                ";
            }
            $query_result = $this->db->executeSelectQuery($query);

            $result = [];

            foreach($query_result as $key => $value){
                $result [] = new Tabel($value['date'],$value['confirmed']-$currentCase,$value['confirmed'],$value['released'],$value['deceased']);
                $currentCase = $value['confirmed'];
            }
            return $result;
        }
        /**
         * Method untuk mengambil data region dengan rentang x - y
         * @param string $region
         * @param string $from
         * @param string $to
         * @return array data region dengan rentang waktu
         */
        public function getDataRegionRange($region,$from,$to)
        {
            // $f1 = str_replace('/','-',$from);
            // $t1 = str_replace('/','-',$to);
            $newFrom = ($from!=="")?date("Y-m-d",strtotime($from)):"";
            $newTo = ($to!=="")?date("Y-m-d",strtotime($to)):"";            
            $currentCase = ($newFrom!=="")?$this->getPrefCurrentCaseRegion($region,$newFrom):0;

            $query = "";
            if ($newFrom === "" && $newTo === ""){
                return $this->getDataOverall();
            } else if ($newFrom === ""){
                $query = "
                    SELECT date, confirmed, released, deceased 
                    FROM timeprovince 
                    WHERE province_name='$region' AND date <= '$newTo' 
                ";
            } else if ($newTo === ""){
                $query = "
                    SELECT date, confirmed, released, deceased 
                    FROM timeprovince 
                    WHERE province_name='$region' AND date >= '$newFrom' 
                ";
            } else { //lengkap
                $query = "
                    SELECT date, confirmed, released, deceased 
                    FROM timeprovince 
                    WHERE province_name='$region' AND date >= '$newFrom' AND date <= '$newTo' 
                ";
            }
            $query_result = $this->db->executeSelectQuery($query);

            $result = [];

            foreach ($query_result as $key => $value) {
                $result [] = new Tabel($value['date'],$value['confirmed']-$currentCase,$value['confirmed'],$value['released'],$value['deceased']);
                $currentCase = $value['confirmed'];
            }
            return $result;
        }
        public function getPrefCurrentCaseOverall($from)
        {
            $yesterday = date('Y-m-d',strtotime($from."-1 days"));
            $query = "
                SELECT confirmed 
                FROM time
                WHERE date = '$yesterday'
            ";
            $query_result = $this->db->executeSelectQuery($query);
            $result = [];

            foreach ($query_result as $key => $value) {
                $result [] = $value['confirmed'];
            }
            if(empty($result)){
                return 0;
            }
            return $result[0];
        }
        public function getPrefCurrentCaseRegion($region,$from)
        {
            $yesterday = date('Y-m-d',strtotime($from."-1 days"));
            $query = "
                SELECT confirmed 
                FROM timeprovince
                WHERE province_name='$region' AND date = '$yesterday'
            ";
            $query_result = $this->db->executeSelectQuery($query);
            $result = [];

            foreach ($query_result as $key => $value) {
                $result [] = $value['confirmed'];
            }
            if(empty($result)){
                return 0;
            }
            return $result[0];
        }
    }
