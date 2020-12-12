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
		case $baseURL . '/index/login':
			require_once "controller/mainController.php";
			$ctrl = new MainController();
			echo $ctrl->viewLogin();
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
