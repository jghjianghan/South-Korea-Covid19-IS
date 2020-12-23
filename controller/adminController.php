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

        public function validateLogin()
        {
            if (isset($_POST['username']) && $_POST['username']!="" && isset($_POST['password']) && $_POST['password']!=""){
                $username = $this->db->escapeString($_POST['username']);
                $password = $_POST['password'];

                $result = $this->db->executeSelectQuery("SELECT idAdmin, username FROM admin WHERE username = '$username'");
                
                if ($result != null){
                    $idUser = $result[0]['idAdmin'];
                    if ($password == $this->db->executeSelectQuery("SELECT password FROM admin WHERE idAdmin = $idUser")[0]['password']){
                        $_SESSION['idAdmin'] = $idUser;
                        $_SESSION['username'] = $result[0]['username'];
                        log("berhasil login");
                        return;
                    } else {
                        return $this->viewLogin("Wrong password");
                    }
                }
                return $this->viewLogin("User not found");
            } else {
                return $this->viewLogin("Please fill both username and password");
            }
        }

        public function logout()
        {
            session_unset();
            session_destroy();
            header("location: admin/login");
        }
    }
