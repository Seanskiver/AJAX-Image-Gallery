<?php session_start(); ?>

<nav class="blue-grey darken-1">
    <div class="nav-wrapper">
    <div class="container">
        <a href="https://image-gallery-seanskiver.c9users.io/" class="brand-logo">Image Gallery<i class="material-icons">crop_original</i></a>

        <ul id="userDropdown" class="dropdown-content" >
            <li><a id='btn-upload' href="##!" class="blue-grey-text darken-4 form-opener" data-open="slide-upload">Upload</a></li>
            <li class="divider"></li>
            <li><a id="logout" class="blue-grey-text darken-4">Logout</a></li>
        </ul>
        
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <?php if (isset($_SESSION['username'])) : ?>
                <li><a class="dropdown-button" data-activates="userDropdown" data-beloworigin="true"><b><?= $_SESSION['username'] ?></b><i class="material-icons right">arrow_drop_down</i></a></li>

            <?php else : ?>
                <li><a id="btn-reg" class="btn green darken-4 form-opener" data-open="slide-register">Sign up</a></li>
                <li><a class="form-opener" data-open="slide-login">Login</a></li>
            <?php endif; ?>
        </ul>
    </div>
    </div>
</nav>

