<?php
    require_once "controller/services/mysqlDB.php";
    require_once "controller/services/view.php";
    require_once "controller/controller.php";

    class MainController extends Controller{
        
        public function viewHome()
        {
            return View::createView("home.php",[
                'title' => "Welcome",
                'styleSrcList' => ['homeStyle.css'],
                'scriptSrcList' => ['contoh.js']
            ]);
        }
        public function viewLogin($message = "")
        {
            return View::createView("login.php",[
                'title' => "Login",
                'styleSrcList' => ["loginStyle.css"],
                'uplevel' => 1,
                "message" => $message
            ]);
        }
        public function viewAbout($message = "")
        {
            return View::createView("about.php",[
                'title' => "about",
                'styleSrcList' => ["mainStyle.css"],
                'uplevel' => 1,
                "message" => $message
            ]);
        }
    }
