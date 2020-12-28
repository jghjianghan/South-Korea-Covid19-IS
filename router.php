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
			require_once "controller/adminController.php";
			$ctrl = new AdminController();
			echo $ctrl->viewLogin();
			break;

		case $baseURL . '/admin/data':
			require_once "controller/adminController.php";
			$ctrl = new AdminController();
			echo $ctrl->viewData();
			break;
			
		case $baseURL . '/admin/data/add':
			require_once "controller/adminController.php";
			$ctrl = new AdminController();
			echo $ctrl->viewAddData();
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
			echo "overall";
			break;
		case $baseURL . '/data/regional':
			echo (isset($_GET["province"])?$_GET["province"]:"regional");
			break;
		case $baseURL . '/test':
			require_once "controller/tabelController.php";
			$ctrl = new tabelController();
			echo json_encode($ctrl->getDataRegionRange('Seoul','21/01/2020','11/02/2020'));
			break;
		default:
			echo '404 Not Found';
			break;
	}
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
	switch ($url) {
		case $baseURL . '/login':
			require_once "controller/mainController.php";
			$ctrl = new MainController();
			// do something
			break;
		default:
			echo '404 Not Found';
			break;
	}
}
