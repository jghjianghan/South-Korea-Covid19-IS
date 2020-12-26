<?php
    require_once "controller/services/mysqlDB.php";
    require_once "controller/services/view.php";
    require_once "controller/controller.php";
    require_once "model/AdminTable.php";

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

        public function viewDataOverall($message)
        {
            return View::createView("dataOverallAdmin.php",[
                'title' => "Data",
                'styleSrcList' => ["adminStyle.css"],
                'scriptSrcList' => ["adminScript.js"],
                'uplevel' => 1,
                "message" => $message
            ]);
        }

        public function viewDataRegional($message)
        {
            return View::createView("dataRegionalAdmin.php",[
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
                        header("location: dataOverall");
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
            header("location: login");
        }

        public function getDataOverall()
        {
            $currentCase = 0;
            $query_result = $this->db->executeSelectQuery("SELECT date, confirmed, released, deceased FROM time");

            $result = [];
            foreach($query_result as $key => $value){
                $result [] = new AdminTable($value['date'],$value['confirmed']-$currentCase,$value['confirmed'],$value['released'],$value['deceased']);
                $currentCase = $value['confirmed'];
            }
            return $result;
        }
        
        public function getDataRegional()
        {
            if (isset($_POST['region']) && $_POST['region']!="") {
                $region = $_POST['region'];
            } else {
                $region = "Busan";
            }
            $currentCase = 0;

            $query = "
                SELECT date, confirmed, released, deceased 
                FROM timeprovince 
                WHERE province_name = '$region'
            ";

            $query_result = $this->db->executeSelectQuery($query);

            $result = [];
            foreach ($query_result as $key => $value) {
                $result [] = new AdminTable($value['date'],$value['confirmed']-$currentCase,$value['confirmed'],$value['released'],$value['deceased']);
                $currentCase = $value['confirmed'];
            }
            return $result;
        }

        public function addAccount() 
        {
            if (isset($_POST['username']) && $_POST['username']!="" && isset($_POST['password']) && $_POST['password']!=""){
                $username = $this->db->escapeString($_POST['username']);
                $password = $_POST['password'];

                $this->db->executeSelectQuery("INSERT INTO admin(username, password) VALUES ('$username', '$password')");
                header("location: dataOverall");
                return;
            } else {
                return $this->viewAddAccount("Please fill both username and password");
            }
        }

        public function changePassword() 
        {
            if (isset($_POST['oldPassword']) && $_POST['oldPassword']!="" && isset($_POST['newPassword']) && $_POST['newPassword']!="" && isset($_POST['confirmPassword']) && $_POST['confirmPassword']!=""){
                $idAdmin = $_SESSION['idAdmin'];
                $temp = "SELECT password FROM admin WHERE idAdmin = '$idAdmin'";
                $temp_res = $this->db->executeNonSelectQuery($temp);
                $row = mysqli_fetch_row($temp_res);
                $oldPassword = $row[0];

                if($oldPassword == $_POST['oldPassword']) {
                    if($_POST['newPassword'] == $_POST['confirmPassword']) {
                        $password = $_POST['confirmPassword'];
                        
                        $query = "
                            UPDATE admin
                            SET password = '$password'
                            WHERE idAdmin = '$idAdmin'
                        ";
        
                        $this->db->executeSelectQuery($query);
                        header("location: dataOverall");
                        return;
                    } else {
                        return $this->viewChangePassword("New Password and Confirm Password are not identic");
                    }
                } else {
                    return $this->viewChangePassword("Incorrect Old Password");
                }
            } else {
                return $this->viewChangePassword("Please fill all field");
            }
        }

        public function addCases() 
        {
            if (isset($_POST['date']) && $_POST['date']!="" && isset($_POST['region']) && $_POST['region']!="" && isset($_POST['confirmedCases']) && $_POST['confirmedCases']!="" && isset($_POST['releasedCases']) && $_POST['releasedCases']!="" && isset($_POST['deceasedCases']) && $_POST['deceasedCases']!=""){
                $date = $_POST['date'];
                $region = $_POST['region'];
                $testedCases = $_POST['testedCases'];
                $negativeCases = $_POST['negativeCases'];
                $confirmedCases = $_POST['confirmedCases'];
                $releasedCases = $_POST['releasedCases'];
                $deceasedCases = $_POST['deceasedCases'];

                $this->db->executeSelectQuery("INSERT INTO timeprovince(date, province_name, confirmed, released, deceased) VALUES ('$date', '$region', '$confirmedCases', '$releasedCases', '$deceasedCases')");
                
                $temp = "
                    SELECT COUNT(1)
                    FROM time
                    WHERE date = '$date';
                ";
                $temp_res = $this->db->executeNonSelectQuery($temp);
                $row = mysqli_fetch_row($temp_res);
                $count = $row[0];

                if ($count == 0){
                    $this->db->executeSelectQuery("INSERT INTO time(date, test, negative, confirmed, released, deceased) VALUES ('$date', '$testedCases', '$negativeCases', '$confirmedCases', '$releasedCases', '$deceasedCases')");
                } else {
                    $query = "
                        UPDATE time
                        SET 
                            test = test + $testedCases,
                            negative = negative + $negativeCases,
                            confirmed = confirmed + $confirmedCases,
                            released = released + $releasedCases,
                            deceased = deceased + $deceasedCases
                        WHERE date = '$date'
                    ";
                    $this->db->executeSelectQuery($query);
                }
                
                header("location: ../dataOverall");
                return;
            } else {
                return $this->viewAddData("Please fill all field");
            }
        }
    }
