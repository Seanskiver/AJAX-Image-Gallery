var files;
$('#imageUpload').change(function(e) {
	files = e.target.files;
});	

function ajaxSubmit() {
	var data = new FormData();
	var error = 0;

	// Append action, title and description onto the form data
	data.append('action', 'upload');
	data.append('title', $('#title').val());
	data.append('description', $('#description').val());
	// Append file onto form data
	for (var i = 0; i < files.length; i++) {
		var file = files[i];
		if (!file.type.match('image.*')) {
			$('#errors').html('Images only');
			error = 1;
		} else if (file.size > 1048576) {
			$('#errors').html('File is too large');
			error = 1;
		} else {
			data.append('imageUpload', file, file.name);
		}
	}



	if (!error) {
		xhr = new XMLHttpRequest();

		xhr.open('POST', '.', true);
		xhr.send(data);

		xhr.onload = function () {
			if (xhr.status === 200) {
				$('#success').html('file successfully uploaded');
			} else if (xhr.status === 400) {
				var error = JSON.parse(xhr.responseText);
				$('#errors').html(error.err.msg);
			}
		}
	}
}


$('#imageForm').submit(function(e) {
	e.preventDefault();
	ajaxSubmit();
});

