<?php 
    include 'models/file.php';
    
    $file = new File();
    $searchString = filter_input(INPUT_POST, 'searchString', FILTER_SANITIZE_STRING);
    
    $images = $file->search_image($searchString);
?>
<div class="blue-grey lighten-5">
<?php foreach ($images as $img) : ?>
    <img class="thumbnail" src="../img/<?= $img['path'] ?>">
<?php endforeach; ?>    
</div>