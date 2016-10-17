var open = 0;


function openForm(id) {
    $('#'+id).animate({
        margin: "0"
    }, 300).promise().then(function() {
        open = 1;
    }); 
}

function closeForm() {
    $('input:not(#searchBar):not(:submit)').val('');
    $('.slideOut').animate({
        'margin-left': '-400px'
    }, 300).promise().then(function() {
        open = 0;
    });     
    
    $('.err-container').css('display','none');
    $('.success-container').css('display','none');
}

$('body').on('click', '.form-opener', function() {
    closeForm();
    openForm($(this).attr('data-open'));
});



// $('#btn-upload').click(openForm('upload-form'));
$('.close').click(closeForm);

$(document).keyup(function(e) {
    if (e.keyCode == 27 && open == 1) {
        closeForm();
    } 
});

$('body').on('click', 'div', function() {
    if ($(this).attr('id') == 'image-container'){
        closeForm();
    }
});

