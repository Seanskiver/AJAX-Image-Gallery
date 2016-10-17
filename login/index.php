<?php 
    require_once('../models/user.php');

	if (isset($_POST['action'])) {
		$action = $_POST['action'];
	} else if (isset($_GET['action'])) {
		$action = $_GET['action'];
	} else {
		$action = null;
	}
	
	$user = new User();
	
	include '../views/header.php';
	if ($action === null) {
	    include '../views/login-form.php';
	} else if ($action == 'login') {
	    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	    
	    $user->login($username, $password);
	    header('Location: ../');
	} else if ($action == 'logout') {
		$user->logout();
		header('Location: ../');
	}
	
	include '../views/footer.php';
    
?>