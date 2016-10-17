<?php
require_once('models/file.php');
// $target_dir = "img/";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $uploadOk = 1;
// $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//     if($check !== false) {
//         echo "File is an image - " . $check["mime"] . ".";
//     } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//     }
// }

// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }

//  // Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }

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