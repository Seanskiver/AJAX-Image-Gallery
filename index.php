<?php 
	require_once('models/file.php');


	$fileUpload = new File();

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

		case '': 
			include 'views/header.php';
			include 'views/footer.php';
	}

?>


