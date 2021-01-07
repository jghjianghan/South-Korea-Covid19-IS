<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "controller/controller.php";

class AdminController extends Controller
{
    /**
     * Method untuk merender halaman login
     * @param string $message
     * @return view halaman login
     */
    public function viewLogin($message = "")
    {
        return View::createView("login.php", [
            'title' => "Login",
            'styleSrcList' => ["adminStyle.css"],
            'scriptSrcList' => ["adminScript.js"],
            'uplevel' => 1,
            "message" => $message,
            'role' => 'admin-out'
        ]);
    }

    /**
     * Method untuk merender halaman data overall admin
     * @return view halaman data overall admin
     */
    public function viewDataOverall()
    {
        return View::createView("dataOverallAdmin.php", [
            'title' => "Data",
            'styleSrcList' => ["adminStyle.css"],
            'scriptSrcList' => ['adminScript.js', 'DailyData.js', 'caseChart.js', 'caseTable.js', 'caseAggregate.js', 'dataOverallAdminManager.js'],
            'uplevel' => 1,
            'role' => 'admin'
        ]);
    }

    /**
     * Method untuk merender halaman data regional admin
     * @return view halaman data regional admin
     */
    public function viewDataRegional()
    {
        require_once "controller/dataController.php";
        $provinces = (new DataController())->getProvince();
        return View::createView("dataRegionalAdmin.php", [
            'title' => "Data",
            'styleSrcList' => ["adminStyle.css"],
            'scriptSrcList' => ['adminScript.js', 'DailyData.js', 'caseChart.js', 'caseTable.js', 'caseAggregate.js', 'dataRegionalAdminManager.js'],
            'uplevel' => 1,
            "provinces" => $provinces,
            'role' => 'admin',
        ]);
    }

    /**
     * Method untuk merender halaman add data
     * @param string $message
     * @return view halaman add data
     */
    public function viewAddData($message = "")
    {
        require_once "controller/dataController.php";
        $provinces = (new DataController())->getProvince();
        return View::createView("addData.php", [
            'title' => "Add Data",
            'styleSrcList' => ["adminStyle.css"],
            'scriptSrcList' => ["adminScript.js"],
            'uplevel' => 2,
            "message" => $message,
            'role' => 'admin',
            'provinces' => $provinces
        ]);
    }

    /**
     * Method untuk merender halaman add account
     * @param string $message
     * @return view halaman add account
     */
    public function viewAddAccount($message = "")
    {
        return View::createView("addAccount.php", [
            'title' => "Add Account",
            'styleSrcList' => ["adminStyle.css"],
            'scriptSrcList' => ["adminScript.js"],
            'uplevel' => 1,
            "message" => $message,
            'role' => 'admin'
        ]);
    }

    /**
     * Method untuk merender halaman change password
     * @param string $message
     * @return view halaman change password
     */
    public function viewChangePassword($message = "")
    {
        return View::createView("changePassword.php", [
            'title' => "Change Password",
            'styleSrcList' => ["adminStyle.css"],
            'scriptSrcList' => ["adminScript.js"],
            'uplevel' => 1,
            "message" => $message,
            'role' => 'admin'
        ]);
    }

    /**
     * Method untuk login
     * @return void jika sukses, string message jika gagal
     */
    public function validateLogin()
    {
        if (isset($_POST['username']) && $_POST['username'] != "" && isset($_POST['password']) && $_POST['password'] != "") {
            $username = $this->db->escapeString($_POST['username']);
            $password = $_POST['password'];

            $result = $this->db->executeSelectQuery("SELECT idAdmin, username FROM admin WHERE username = '$username'");

            if ($result != null) {
                $idUser = $result[0]['idAdmin'];
                if ($password == $this->db->executeSelectQuery("SELECT password FROM admin WHERE idAdmin = $idUser")[0]['password']) {
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

    /**
     * Method untuk logout
     * @return void
     */
    public function logout()
    {
        session_unset();
        session_destroy();
        header("location: login");
    }

    /**
     * Method untuk menambahkan akun admin
     * @return void jika sukses, string message jika gagal
     */
    public function addAccount()
    {
        if (isset($_POST['username']) && $_POST['username'] != "" && isset($_POST['password']) && $_POST['password'] != "" && isset($_POST['confirmPassword']) && $_POST['confirmPassword'] != "") {
            $username = $this->db->escapeString($_POST['username']);
            $password = $_POST['password'];

            $temp = "
                    SELECT COUNT(1)
                    FROM admin
                    WHERE username = '$username';
                ";
            $temp_res = $this->db->executeNonSelectQuery($temp);
            $row = mysqli_fetch_row($temp_res);
            $count = $row[0];

            if ($count == 0) {
                if ($_POST['password'] == $_POST['confirmPassword']) {
                    $this->db->executeSelectQuery("INSERT INTO admin(username, password) VALUES ('$username', '$password')");
                    header("location: dataOverall");
                    return;
                } else {
                    return $this->viewAddAccount("Password and Confirm Password are not identical");
                }
            } else {
                return $this->viewAddAccount("Username already taken");
            }
        } else {
            return $this->viewAddAccount("Please fill all field");
        }
    }

    /**
     * Method untuk mengubah password pengguna (admin)
     * @return void jika sukses, string message jika gagal
     */
    public function changePassword()
    {
        if (isset($_POST['oldPassword']) && $_POST['oldPassword'] != "" && isset($_POST['newPassword']) && $_POST['newPassword'] != "" && isset($_POST['confirmPassword']) && $_POST['confirmPassword'] != "") {
            $idAdmin = $_SESSION['idAdmin'];
            $temp = "SELECT password FROM admin WHERE idAdmin = '$idAdmin'";
            $temp_res = $this->db->executeNonSelectQuery($temp);
            $row = mysqli_fetch_row($temp_res);
            $oldPassword = $row[0];

            if ($oldPassword == $_POST['oldPassword']) {
                if ($_POST['newPassword'] == $_POST['confirmPassword']) {
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
                    return $this->viewChangePassword("New Password and Confirm Password are not identical");
                }
            } else {
                return $this->viewChangePassword("Incorrect Old Password");
            }
        } else {
            return $this->viewChangePassword("Please fill all field");
        }
    }

    /**
     * Method untuk menambahkan kasus baru ke dalam database
     * @return void jika sukses, string message jika gagal
     */
    public function addCases()
    {
        if (
            isset($_POST['region']) && $_POST['region'] != "" && 
            isset($_POST['confirmedCases']) && $_POST['confirmedCases'] != "" && 
            isset($_POST['releasedCases']) && $_POST['releasedCases'] != "" && 
            isset($_POST['deceasedCases']) && $_POST['deceasedCases'] != "" &&
            isset($_POST['date']) && $_POST['date'] != ""
            ) {
            $testedCases = $_POST['testedCases'];
            $negativeCases = $_POST['negativeCases'];
            $confirmedCases = $_POST['confirmedCases'];
            $releasedCases = $_POST['releasedCases'];
            $deceasedCases = $_POST['deceasedCases'];

            if (!is_numeric($testedCases) || !is_numeric($negativeCases) || !is_numeric($confirmedCases) || !is_numeric($releasedCases) || !is_numeric($deceasedCases)){
                return $this->viewAddData("Values must be integer");
            }
            if ($testedCases < 0 || $negativeCases<0 || $confirmedCases<0 || $releasedCases<0 || $deceasedCases<0){
                return $this->viewAddData("Values must not be negative");
            }
            
            $date = $_POST['date'];
            $today = date("Y-m-d");

            if ($date > $today){
                return $this->viewAddData("The date cannot be later than today");
            }

            $region = $_POST['region'];

            $terakhir = $this->db->executeSelectQuery("SELECT * FROM time ORDER BY date DESC LIMIT 1");

            $tglAkhir = $terakhir[0]['date'];
            $testAkhir = $terakhir[0]['test'];
            $negativeAkhir = $terakhir[0]['negative'];
            $confirmAkhir = $terakhir[0]['confirmed'];
            $releasedAkhir = $terakhir[0]['released'];
            $deceasedAkhir = $terakhir[0]['deceased'];

            $targetFormatted = date_create($date);
            $hariiniFormatted = date_create($today);
            $lastFormatted = date_create($tglAkhir);
            $diff = date_diff($targetFormatted, $lastFormatted)->days;

            // return $this->viewAddData($diff);

            if ($date > $tglAkhir) {
                $query = "INSERT INTO time 
                        VALUES";
                $queryProv = "INSERT INTO timeprovince 
                        VALUES";
                $provLastCase = $this->db->executeSelectQuery("SELECT * FROM timeprovince WHERE date='" . $tglAkhir . "'");;
                $lengthProvLC = count($provLastCase);
                date_add($lastFormatted, date_interval_create_from_date_string("1 day"));
                for ($i = 0; $i < $diff; $i++) {
                    $tgl = $lastFormatted->format("Y-m-d");
                    if ($diff - 1 == $i) {
                        $query .= "('$tgl','$testAkhir','$negativeAkhir','$confirmAkhir','$releasedAkhir', '$deceasedAkhir')";
                        foreach ($provLastCase as $idx => $row) {
                            if ($lengthProvLC - 1 == $idx) {
                                $queryProv .= "('$tgl','" . $row['province_name'] . "','" . $row['confirmed'] . "','" . $row['released'] . "','" . $row['deceased'] . "')";
                            } else {
                                $queryProv .= "('$tgl','" . $row['province_name'] . "','" . $row['confirmed'] . "','" . $row['released'] . "','" . $row['deceased'] . "'),";
                            }
                        }
                    } else {
                        date_add($lastFormatted, date_interval_create_from_date_string("1 day"));
                        $query .= "('$tgl','$testAkhir','$negativeAkhir','$confirmAkhir','$releasedAkhir', '$deceasedAkhir'),";
                        foreach ($provLastCase as $row) {
                            $queryProv .= "('$tgl','" . $row['province_name'] . "','" . $row['confirmed'] . "','" . $row['released'] . "','" . $row['deceased'] . "'),";
                        }
                    }
                }
                $this->db->executeNonSelectQuery($query);
                $this->db->executeNonSelectQuery($queryProv);
            }

            $query = "
                        UPDATE time
                        SET 
                            test = test + $testedCases,
                            negative = negative + $negativeCases,
                            confirmed = confirmed + $confirmedCases,
                            released = released + $releasedCases,
                            deceased = deceased + $deceasedCases
                        WHERE date >= '$date'
                    ";
            $this->db->executeNonSelectQuery($query);

            $queryProv = "
                        UPDATE timeprovince
                        SET 
                            confirmed = confirmed + $confirmedCases,
                            released = released + $releasedCases,
                            deceased = deceased + $deceasedCases
                        WHERE province_name = '$region' AND date >= '$date'
                    ";
            $this->db->executeNonSelectQuery($queryProv);

            header("location: ../dataOverall");
            return;
        } else {
            return $this->viewAddData("Please fill all field");
        }
    }
}
