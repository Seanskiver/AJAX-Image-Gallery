<div class="row">
    <div id="slideOut">
        <i class="material-icons" id="close">close</i>
        <h5>Upload image</h5>
        <form id="imageForm" enctype="multipart/form-data">
            <div class="row">
                <div class="row">
                    <div class="input-field">
                        <label for="title">Title</label><br>
                        <input type="text" name="title" id="title">
                    </div>
                </div>
                
                <div class="row" id="top-container">
                    <div class="input-field">
                        
                        <textarea class="materialize-textarea" name="description" id="description"></textarea>
                        <label for="description">Description</label>
                        <!--<input type="text" name="description" id="description">-->
                    </div>
                </div>
                
                <!--FILE UPLOAD-->
                <div class="row">
                    <div class="file-field input-field">
                        <div class="btn amber darken-4">
                            <span>File</span>
                            <input type="file" name="imageUpload" id="imageUpload">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder=".jpg, .jpeg, .png, .gif">
                        </div>
                    </div>
                </div>
                
                <input type="submit" class="btn amber darken-4" value="Upload Image" id="upload-submit" name="submit">            
            </div>
    
        </form>
        <span id="errors"></span>
        <span id="success"><i class="material-icons">check</i></span>    
    </div>
</div>