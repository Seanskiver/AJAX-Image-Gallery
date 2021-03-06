
    <div class="slideOut" id="slide-upload">
        <i class="material-icons close">close</i>
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
        
        
        <span class="err-container">
            <i class="material-icons">error</i>
            <span id="upload-err" class="err"></span>
        </span>
        
        <span class="success-container">
            <i class="material-icons">check</i>
            <span id="upload-success" class="success"></span>
        </span>
    </div>
