<?php 
	session_start();
	require_once('models/file.php');
	require_once('models/user.php');

	$fileUpload = new File();
	$user = new User();

	if (isset($_POST['action'])) {
		$action = $_POST['action'];
	} else if (isset($_GET['action'])) {
		$action = $_GET['action'];
	} else {
		$action = null;
	}

	switch ($action) {
		case 'upload': 
			$file = $_FILES['imageUpload'];
			$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
			$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

			// Check file
			try {
				$fileUpload->handle_file($file);
			} catch (Exception $e) {
				http_response_code(400);

				echo json_encode(array(
					'err' => array(
						'msg' => $e->getMessage()
					),
				));
			}
			// Upload File
			try {
				$fileUpload->upload_file($file, $description);
			} catch (Exception $e) {
				http_response_code(400);
				echo json_encode(array(
						'msg' => $e->getMessage()
					)
				);
				
			}
			break;
			
		case 'get_images':
			
			break;
			
		case 'logout':
			$user->logout();
			break;
			
		case 'login':
			$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
			$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
			
			try {
				$user->login($username, $password);
				echo json_encode(array(
						'msg' => 'Logged in Successfully!'
					)
				);							
			} catch (Exception $e) {
				http_response_code(401);
				echo json_encode(array(
						'msg' => $e->getMessage()
					)
				);				
			} 
			break;
		
		case 'register':
			$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
			$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
			$verify = filter_input(INPUT_POST, 'verify', FILTER_SANITIZE_STRING);
			
			if ($username == '' || $password == '' || $verify == '') {
				http_response_code(401);
				echo json_encode(array(
						'msg' => 'Please fill out all form fields'
					)
				);	
				
				break;
			}
			
			
			// If passwords do not match
			if (strcmp($password, $verify) != 0) {
				http_response_code(401);
				echo json_encode(array(
						'msg' => 'Passwords do not match'
					)
				);	
				
				break;
			}
			
			// try to create user
			try {
				$user->createUser($username, $password);	
				$user->login($username, $password);
				
				$user->login($username, $password);
				echo json_encode(array(
						'msg' => 'Registration sucessful!'
					)
				);	
			} catch (Exception $e) {
				// Set HTTP error to unauthorized
				http_response_code(401);
				// Send error in JSON
				echo json_encode(array(
						'msg' => $e->getMessage()
					)
				);	
			}
			
			break;
		
		case '':
			include_once 'views/header.php';
			echo '<div id="nav-load">';
				include_once('views/nav.php');				
			echo '</div>';
			include_once('views/login-form.php');
			include_once('views/register-form.php');
			include_once('views/upload_form.php');
			include_once('views/searchBar.php');
			include_once('views/image-results.php');
			include_once 'views/footer.php';
			break;
	}

?>


