<?php
    require_once "controller/services/mysqlDB.php";
    require_once "controller/services/view.php";
    require_once "controller/controller.php";
    require_once "model/tabel.php";
    require_once "model/dataAggregate.php";

    class DataController extends Controller
    {
        public function viewHome()
        {
            $result = $this->getAggregateOverall();
            return View::createView("home.php",[
                'result'=> $result,
                'title' => "Corea",
                'page' => "home",
                'role' => "visitor"
            ]);
        }

        public function viewDataOverall()
        {
            $result = $this->getAggregateOverall();
            return View::createView("dataOverall.php",[
                'result' => $result,
                'title' => "Corea - Overall Data",
                'page' => "data",
                'scriptSrcList' => ['caseChart.js', 'chartEntry.js','tableEntry.js', 'caseTableOverall.js'],
                'role' => "visitor"
            ]);
        }

        

        public function viewDataRegional()
        {
            //$this->getTime("2020-01-20","2020-02-20");
            // $this->getTimeProvince("2020-06-30","2020-08-20","Busan");
            return View::createView("dataRegional.php",[
                'title' => "Corea - Regional Data",
                'page' => "data",
                'scriptSrcList' => ['caseChart.js', 'chartEntry.js', 'tableEntry.js', 'caseTableRegional.js'],
                'role' => "visitor"
            ]);
            
        }

        public function viewAbout()
        {
            return View::createView("about.php",[
                'title' => "Corea - About",
                'page' => "about",
                'role' => "visitor"
            ]);
        }

        public function getAggregateOverall()
        {
            $query = "
                SELECT MAX(confirmed) as 'tC', MAX(test) as 'tT', MAX(negative) as 'tN', MAX(released) as'tR',MAX(deceased)as'tD'
                FROM time
            ";
            $query_result = $this->db->executeSelectQuery($query);

            $result = [];
            
            foreach($query_result as $key => $value){
                $result [] = new DataAggregate($value['tC'],$value['tT'],$value['tN'],$value['tR'],$value['tD']);
            }

            return $result; 
        }

        public function getAggregateRegional($region)
        {
            $query = "
                SELECT MAX(confirmed) as 'totalConfirmed'
                FROM timeprovince
                WHERE province_name = '$region'
            ";
            $query_result = $this->db->executeSelectQuery($query);

            $result = [];
            
            foreach($query_result as $key => $value){
                $result [] = $value['totalConfirm'];
            }

            $query = "
                SELECT MAX(released) as 'totalReleased'
                FROM timeprovince
                WHERE province_name = '$region'
            ";
            $query_result = $this->db->executeSelectQuery($query);

            foreach($query_result as $key => $value){
                $result [] = $value['totalReleased'];
            }

            $query = "
                SELECT MAX(deceased) as 'totalDeceased'
                FROM timeprovince
                WHERE province_name = '$region'
            ";
            $query_result = $this->db->executeSelectQuery($query);
            
            foreach($query_result as $key => $value){
                $result [] = $value['totalDeceased'];
            }

            return new DataAggregate($result[0],null,null,$result[1],$result[3]);
        }
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
?>