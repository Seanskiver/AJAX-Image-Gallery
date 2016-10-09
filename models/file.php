<?php 
	class File {
		// Directory where images are stored
		private $upload_dir = 'img/';
		// Allowed file types
		private $allowableTypes = ['jpg', 'jpeg', 'gif', 'png'];

		// expects $FILES[file_field_name]
		public function handle_file($file) {
			$name = $file['name'];
			$size = $file['tmp_name'];
			$path = $this->upload_dir.$name;
			$exists = file_exists($path);
			$type = pathinfo($path, PATHINFO_EXTENSION);

			// DEBUGGING
			// echo $name . '<br>';
			// echo $size. '<br>';
			// echo $path. '<br>';
			// echo $exists. '<br>';
			// echo $type. '<br>';

			//-------------ERROR CHECKING
			//is not an image
			if ($size === false) throw new Exception('This is not an image');
			//file already exists
			if ($exists) throw new Exception('This file already exists. Please try another title');
			//file is too large
			if ($size > 500000) throw new Exception('This image is too large. Please try a smaller image');
			//file isn't acceptable file type
			if (!in_array($type, $this->allowableTypes)) throw new Exception('This image is too large. Please try a smaller image');
		}

		// Expects $FILES[file_field_name] for $file and $_POST['description'] or GET['description'] for $description
		public function upload_file($file, $description) {
			if (!move_uploaded_file($file['tmp_name'], $this->upload_dir.$file['name'])) {
				throw new Exception('Error uploading file. Please try again later');
			} 
		}

	}

?>