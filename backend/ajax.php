<?php
require_once('./controller.php');

$action = $_GET['action'];
$controller = new Controller();

if($action == 'signup'){
	$response = $controller->signup();
	if($response)
		echo $response;
}

if($action == 'login'){
	$response = $controller->login();
	if($response)
		echo $response;
}

if($action == 'logout'){
	$response = $controller->logout();
	if($response)
		echo $response;
}

?>