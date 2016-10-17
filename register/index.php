<?php 
    require_once('../models/user.php');

	if (isset($_POST['action'])) {
		$action = $_POST['action'];
	} else if (isset($_GET['action'])) {
		$action = $_GET['action'];
	} else {
		$action = null;
	}
	
	
	if ($action === null) {
	    include '../views/header.php';
	    include '../views/register-form.php';
	    include '../views/footer.php';
	} else if ($action == 'register') {
	    $user = new User();
	    
	    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	    
	    $user->createUser($username, $password);
	    $user->login($username, $password);
	    
		header('Location: ../');
	}
	
    
?>