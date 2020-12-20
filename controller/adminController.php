<?php
    require_once "controller/services/mysqlDB.php";
    require_once "controller/services/view.php";
    require_once "controller/controller.php";

    class AdminController extends Controller{
        
        public function viewLogin($message = "")
        {
            return View::createView("login.php",[
                'title' => "Login",
                'styleSrcList' => ["adminStyle.css"],
                'scriptSrcList' => ["adminScript.js"],
                'uplevel' => 1,
                "message" => $message
            ]);
        }

        public function viewData($message = "")
        {
            return View::createView("data.php",[
                'title' => "Data",
                'styleSrcList' => ["adminStyle.css"],
                'scriptSrcList' => ["adminScript.js"],
                'uplevel' => 1,
                "message" => $message
            ]);
        }

        public function viewAddData($message = "")
        {
            return View::createView("addData.php",[
                'title' => "Add Data",
                'styleSrcList' => ["adminStyle.css"],
                'scriptSrcList' => ["adminScript.js"],
                'uplevel' => 2,
                "message" => $message
            ]);
        }

        public function viewAddAccount($message = "")
        {
            return View::createView("addAccount.php",[
                'title' => "Add Account",
                'styleSrcList' => ["adminStyle.css"],
                'scriptSrcList' => ["adminScript.js"],
                'uplevel' => 1,
                "message" => $message
            ]);
        }

        public function viewChangePassword($message = "")
        {
            return View::createView("changePassword.php",[
                'title' => "Change Password",
                'styleSrcList' => ["adminStyle.css"],
                'scriptSrcList' => ["adminScript.js"],
                'uplevel' => 1,
                "message" => $message
            ]);
        }
    }
