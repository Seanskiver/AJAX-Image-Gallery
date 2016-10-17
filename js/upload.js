// for successuful form submission
function succeed(message, divId) {
	$('.err').html('');
	console.log(message);
	$('.err-container').css({display:'none'});
	$('#'+divId).html(message);
	$('#'+divId).parent().css({display:'inline-block'});

	window.setTimeout(function() {
		$('#'+divId).parent().fadeOut();
		closeForm();
	}, 1000);
}
// for form submission failure
function fail(message, divId) {
	$('.success').html('');
	$('#'+divId).parent().css({display:'inline-block'});
	$('#'+divId).html(message);
}

// load in images when the document loads
$(document).ready(function() {
    $('#image-container').load('../images.php');
    $('.materialboxed').materialbox();
});

var files;
$('#imageUpload').change(function(e) {
	files = e.target.files;
});	

// Submits Image upload form
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
			fail('images only', 'upload-err');

			error = 1;
		} else if (file.size > 1048576) {
			fail('This file is too large', 'upload-err');
			//$('#errors').html('File is too large');
			error = 1;
		} else {
			data.append('imageUpload', file, file.name);
		}
	}



	if (!error) {
		xhr = new XMLHttpRequest();

		xhr.open('POST', 'upload.php', true);
		xhr.send(data);

		xhr.onload = function () {
			if (xhr.status === 200) {
				succeed('upload successful', 'upload-success');
				$('#image-container').load('images.php');
				$('#title, #description, #imageUpload').val('');
			} else if (xhr.status === 400) {
				var error = JSON.parse(xhr.responseText);
				$('#errors').html(error.err.msg);
			}
		}
	}
}
// On upload form submit fire ajaxSubmit() function
$('#imageForm').submit(function(e) {
	e.preventDefault();
	ajaxSubmit();
});


// LOGIN FORM SUBMIT
$('#login-form').submit(function(e) {
	e.preventDefault();
	var username = $('#login-username').val();
	var password = $('#login-password').val();
	formData = {"action" : "login", "username" : username, "password" : password};
	
	$.ajax({
		method: 'POST',
		url: 'index.php',
		data: formData,
		success: function(data) {
			var message = JSON.parse(data).msg;
			
			succeed(message, 'login-success');
			
			$('#nav-load').load('views/nav.php');
		},
		statusCode: {
			401: function(err){
				$('#login-errors').show();
				var message = jQuery.parseJSON(err.responseText).msg;
				$('#login-errors').append(message);
				fail(message, 'login-errors');
			}
		}
	});
});
// REGISTER FORM SUBMIT
$('#register-form').submit(function(e) {
	e.preventDefault();
	
	var username = $('#register-username').val();
	var password = $('#register-password').val();
	var verify = $('#passwordVerify').val();
	
	var formData = {'action':'register', 'username':username, "password":password, "verify":verify};
	
	$.ajax({
		method: 'POST',
		url: 'index.php',
		data: formData,
		statusCode: {
			401: function(err) {
				var error = jQuery.parseJSON(err.responseText).msg;
				fail(error, 'register-errors');
			}
		},
		success: function(data) {
			//succeed(data.msg);
			var message = jQuery.parseJSON(data).msg;
			succeed(message, 'register-success')
			$('#nav-load').load('views/nav.php');
		}
	})
});

// Bubble up click events for navigation
$('#nav-load').on('click', '.dropdown-button', function() {
	$(".dropdown-button").dropdown();
	$(".dropdown-button").dropdown();
});

$('#nav-load').on('click', '#logout', function() {
	formData = {"action" : "logout"};
	
	$.ajax({
		method: 'POST',
		url: 'index.php',
		data: formData,
		success: function(data) {
			$('#nav-load').load('views/nav.php');
		}
	});
});
