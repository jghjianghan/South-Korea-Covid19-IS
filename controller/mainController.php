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
            ]);
        }

        public function viewDataOverall()
        {
            return View::createView("dataOverall.php",[
                'title' => "Corea - Overall Data",
                'page' => "data",
                'scriptSrcList' => ['tableEntry.js', 'caseTableOverall.js']
            ]);
        }

        public function viewDataRegional()
        {
            return View::createView("dataRegional.php",[
                'title' => "Corea - Regional Data",
                'page' => "data",
                'scriptSrcList' => ['tableEntry.js', 'caseTableRegional.js']
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
