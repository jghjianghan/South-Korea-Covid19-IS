<?php
date_default_timezone_set("Asia/Bangkok");
$url = $_SERVER['REDIRECT_URL'];
$baseURL = '/South-Korea-Covid19-IS';
$uri_path = parse_url($url, PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);

session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	switch ($url) {
		case $baseURL . '/index':
			require_once "controller/mainController.php";
			$ctrl = new MainController();
			echo $ctrl->viewHome();
			break;

		case $baseURL . '/admin/login':
			if (isset($_SESSION['username'])) {
				header('location: dataOverall');
			} else {
				require_once "controller/adminController.php";
				$ctrl = new AdminController();
				echo $ctrl->viewLogin();
			}
			break;

		case $baseURL . '/admin/logout':
			require_once "controller/adminController.php";
			$ctrl = new AdminController();
			echo $ctrl->logout();
			break;
			
		case $baseURL . '/admin/dataOverall':
			if (isset($_SESSION['username'])) {
				require_once "controller/adminController.php";
				$ctrl = new AdminController();
				echo $ctrl->viewDataOverall($ctrl->getDataOverall());
			} else {
				header('location: login');
			}
			break;

		case $baseURL . '/admin/dataRegional':
			if (isset($_SESSION['username'])) {
				require_once "controller/adminController.php";
				$ctrl = new AdminController();
				echo $ctrl->viewDataRegional($ctrl->getDataRegional());
			} else {
				header('location: login');
			}
			break;

		case $baseURL . '/admin/data/add':
			if (isset($_SESSION['username'])) {
				require_once "controller/adminController.php";
				$ctrl = new AdminController();
				echo $ctrl->viewAddData();
			} else {
				header('location: ../login');
			}
			break;

		case $baseURL . '/admin/addAccount':
			if (isset($_SESSION['username'])) {
				require_once "controller/adminController.php";
				$ctrl = new AdminController();
				echo $ctrl->viewAddAccount();
			} else {
				header('location: login');
			}
			break;

		case $baseURL . '/admin/changePassword':
			if (isset($_SESSION['username'])) {
				require_once "controller/adminController.php";
				$ctrl = new AdminController();
				echo $ctrl->viewChangePassword();
			} else {
				header('location: login');
			}
			break;

		case $baseURL . '/admin':
			if (isset($_SESSION['username'])) {
				header('location: admin/login');
			} else {
				header('location: admin/dataOverall');
			}
			break;

		case $baseURL . '/dataOverall':
			require_once "controller/mainController.php";
			$ctrl = new MainController();
			echo $ctrl->viewDataOverall();
			break;

		case $baseURL . '/dataRegional':
			require_once "controller/mainController.php";
			$ctrl = new MainController();
			echo $ctrl->viewDataRegional();
			break;

		case $baseURL . '/about':
			require_once "controller/mainController.php";
			$ctrl = new MainController();
			echo $ctrl->viewAbout();
			break;

		case $baseURL . '/data/overall':
			require_once "controller/tabelController.php";
			$ctrl = new TabelController();
			if (isset($_GET['start']) && isset($_GET['end'])){
				echo json_encode($ctrl->getDataOverallRange($_GET['start'], $_GET['end']));
			} else {
				echo json_encode($ctrl->getDataOverall());
			}
			break;
		case $baseURL . '/data/regional':
			echo (isset($_GET["province"])?$_GET["province"]:"regional");
			break;
		case $baseURL . '/chart/overall':
			require_once "controller/mainController.php";
			$ctrl = new MainController();
			echo json_encode($ctrl->getTime(NULL, NULL));
			break;
      
		default:
			echo '404 Not Found';
			break;
	}
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
	switch ($url) {
		case $baseURL . '/admin/login':
			require_once "controller/adminController.php";
			$ctrl = new AdminController();
			echo $ctrl->validateLogin();
			break;

		case $baseURL . '/admin/addAccount':
            require_once "controller/adminController.php";
            $ctrl = new AdminController();
            echo $ctrl->addAccount();
			break;
			
		case $baseURL . '/admin/changePassword':
			require_once "controller/adminController.php";
			$ctrl = new AdminController();
			echo $ctrl->changePassword();
			break;

		case $baseURL . '/admin/data/add':
			require_once "controller/adminController.php";
			$ctrl = new AdminController();
			echo $ctrl->addCases();
			break;

		case $baseURL . '/admin/dataRegional':
			require_once "controller/adminController.php";
			$ctrl = new AdminController();
			echo $ctrl->viewDataRegional($ctrl->getDataRegional());
			break;
	
		default:
			echo '404 Not Found';
			break;
	}
}
