<?php
    require_once "controller/services/mysqlDB.php";
    require_once "controller/services/view.php";
    require_once "controller/controller.php";

    class MainController extends Controller{
        
        public function viewHome()
        {
            return View::createView("home.php",[
                'title' => "Corea",
                'page' => "home",
                'role' => "visitor"
            ]);
        }

        public function viewDataOverall()
        {
            return View::createView("dataOverall.php",[
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
    }
