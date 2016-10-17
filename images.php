<?php 
    include 'models/file.php';
    $file = new File();
    $images = $file->get_images();
?>

<div class="blue-grey lighten-5">
    <?php foreach ($images as $img) : ?>
        <img class="thumbnail" src="img/<?= $img['path'] ?>">
    <?php endforeach ?>
</div>

