$('#searchBar').keyup(function () {
    var srchStr = $(this).val();

    
    $.post('search.php', {searchString: srchStr, action : "search"}, function(data) {
        $('#image-container').html(data);
    });
});