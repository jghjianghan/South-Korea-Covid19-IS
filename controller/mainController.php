<?php
    require_once "controller/services/mysqlDB.php";
    require_once "controller/services/view.php";
    require_once "controller/controller.php";
    require_once "model/dataAggregate.php";

    class MainController extends Controller{
        
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
                'role' => "visitor"
            ]);
        }

        public function viewDataRegional()
        {
            return View::createView("dataRegional.php",[
                'title' => "Corea - Regional Data",
                'page' => "data",
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
