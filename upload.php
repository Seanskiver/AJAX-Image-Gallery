<?php
require_once('models/file.php');

$fileUpload = new File();

$file = $_FILES['imageUpload'];
print_r($file);
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
	$fileUpload->upload_file($file, $title, $description);
} catch (Exception $e) {
	http_response_code(400);
	echo json_encode(array(
			'msg' => $e->getMessage()
		)
	);
	
}



?>