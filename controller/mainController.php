<?php
    require_once "controller/services/mysqlDB.php";
    require_once "controller/services/view.php";
    require_once "controller/controller.php";
    require_once "model/dataChart.php";
    require_once "model/dataAggregate.php";

    class MainController extends Controller{
        
        public function getTimeProvince($datefilterfrom,$datefilterto,$provincefilter){
            $this->db->openConnection();
            $query = "SELECT date, confirmed 
                        FROM `timeprovince`";
            $sum = 0;
            if($datefilterfrom!=NULL or $provincefilter!=""){
                $query.=" WHERE ";

                if($provincefilter!=""){
                    $query.=" province_name = '".$provincefilter."'";
                    $sum+=1;
                }
                if($datefilterfrom){
                    if($sum>0){
                        $query.=" and ";
                    }
                    $query.=" date between '".$datefilterfrom."' and '".$datefilterto."'"; 
                }
            }
            
            $hasil=$this->db->executeSelectQuery($query);
            // echo var_dump($hasil);

        }

        public function getTime($datefilterfrom,$datefilterto){
            $this->db->openConnection();
            $query = "SELECT date, confirmed
                        FROM `time`";
            if($datefilterfrom!=NULL){
                $query.=" WHERE date between '".$datefilterfrom."' and '".$datefilterto."'";
            }
            $query_result =$this->db->executeSelectQuery($query);

            $result = [];
            $currentCase = 0;

            foreach($query_result as $key => $value){
                $result [] = new DataChart($value['date'],$value['confirmed']-$currentCase);
                $currentCase = $value['confirmed'];
            }
            // echo var_dump($hasil);

            return $result;
        }


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
                'scriptSrcList' => ['caseChart.js', 'chartEntry.js'],
                'role' => "visitor"
            ]);
        }

        

        public function viewDataRegional()
        {
            //$this->getTime("2020-01-20","2020-02-20");
            $this->getTimeProvince("2020-06-30","2020-08-20","Busan");
            return View::createView("dataRegional.php",[
                'title' => "Corea - Regional Data",
                'page' => "data",
                'scriptSrcList' => ['caseChart.js', 'chartEntry.js'],
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
                SELECT MAX(confirmed) as 'totalConfirm'
                FROM time
            ";
            $query_result = $this->db->executeSelectQuery($query);

            $result = [];
            
            foreach($query_result as $key => $value){
                $result [] = $value['totalConfirm'];
            }

            $query = "
                SELECT MAX(test) as 'totalTest'
                FROM time
            ";
            $query_result = $this->db->executeSelectQuery($query);
            
            foreach($query_result as $key => $value){
                $result [] = $value['totalTest'];
            }

            $query = "
                SELECT MAX(negative) as 'totalNegative'
                FROM time
            ";
            $query_result = $this->db->executeSelectQuery($query);
            
            foreach($query_result as $key => $value){
                $result [] = $value['totalNegative'];
            }

            $query = "
                SELECT MAX(released) as 'totalReleased'
                FROM time
            ";
            $query_result = $this->db->executeSelectQuery($query);
            
            foreach($query_result as $key => $value){
                $result [] = $value['totalReleased'];
            }

            $query = "
                SELECT MAX(deceased) as 'totalDeceased'
                FROM time
            ";
            $query_result = $this->db->executeSelectQuery($query);
            
            foreach($query_result as $key => $value){
                $result [] = $value['totalDeceased'];
            }

            return new DataAggregate($result[0],$result[1],$result[2],$result[3],$result[4]);
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
    }
