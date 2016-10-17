<div id="full-width-wrapper">
    <div class="container">
        <div class="row" id="search-container">
            <div class="col s4 m2 l2" id="searchCaption">Search Images: </div>
            <div class="col s7 m8 l8">
                <input type="text" id="searchBar">        
            </div>
            <div class="col s1 m2 l2" id='login-warning'>
                <?php if (!isset($_SESSION['user_id'])) :  ?>
                    <i class="material-icons tooltipped" data-position="right" data-delay="10" data-tooltip="Login to upload images">error_outline</i>
                <?php endif; ?> 
            </div>
        </div>
    </div>        
</div>
