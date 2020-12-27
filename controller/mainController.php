<?php
    require_once "controller/services/mysqlDB.php";
    require_once "controller/services/view.php";
    require_once "controller/controller.php";

    class MainController extends Controller{
        
        public function getTimeProvince($datefilterfrom,$datefilterto,$provincefilter){
            $this->db->openConnection();
            $query = "SELECT * FROM `timeprovince`";
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
            echo var_dump($hasil);

        }

        public function getTime($datefilterfrom,$datefilterto){
            $this->db->openConnection();
            $query = "SELECT * FROM `time`";
            if($datefilterfrom!=NULL){
                $query.=" WHERE date between '".$datefilterfrom."' and '".$datefilterto."'";
            }
            $hasil=$this->db->executeSelectQuery($query);
            echo var_dump($hasil);
        }


        public function viewHome()
        {
            return View::createView("home.php",[
                'title' => "Corea",
                'page' => "home",
            ]);
        }

        public function viewDataOverall()
        {
            return View::createView("dataOverall.php",[
                'title' => "Corea - Overall Data",
                'page' => "data",
            ]);
        }

        

        public function viewDataRegional()
        {
            //$this->getTime("2020-01-20","2020-02-20");
            $this->getTimeProvince("2020-06-30","2020-08-20","Busan");
            return View::createView("dataRegional.php",[
                'title' => "Corea - Regional Data",
                'page' => "data",
            ]);
            
        }

        public function viewAbout()
        {
            return View::createView("about.php",[
                'title' => "Corea - About",
                'page' => "about",
            ]);
        }

        

        
    }
