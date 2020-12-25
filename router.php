<?php
date_default_timezone_set("Asia/Bangkok");
$url = $_SERVER['REDIRECT_URL'];
$baseURL = '/South-Korea-Covid19-IS';

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
			require_once "controller/adminController.php";
			$ctrl = new AdminController();
			echo $ctrl->viewDataOverall($ctrl->getDataOverall());
			break;

		case $baseURL . '/admin/dataRegional':
			require_once "controller/adminController.php";
			$ctrl = new AdminController();
			echo $ctrl->viewDataRegional($ctrl->getDataRegional());
			break;

		case $baseURL . '/admin/data/add':
			require_once "controller/adminController.php";
			$ctrl = new AdminController();
			echo $ctrl->viewAddData();
			break;

		case $baseURL . '/admin/addAccount':
			require_once "controller/adminController.php";
			$ctrl = new AdminController();
			echo $ctrl->viewAddAccount();
			break;

		case $baseURL . '/admin/changePassword':
			require_once "controller/adminController.php";
			$ctrl = new AdminController();
			echo $ctrl->viewChangePassword();
			break;

		case $baseURL . '/admin/logout':
			require_once "controller/adminController.php";
			$ctrl = new AdminController();
			echo $ctrl->logout();
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
