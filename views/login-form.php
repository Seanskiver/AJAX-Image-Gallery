
    <div class="slideOut" id="slide-login">
        <i class="material-icons close" id="">close</i>
        <h5>Login</h5>
        
        <form id="login-form">
            <div class="row">
                <div class="row">
                    <div class="input-field">
                        <label for="username">Username</label><br>
                        <input type="text" name="username" id="login-username">
                    </div>
                </div>
                
                <div class="row">
                    <div class="file-field input-field">
                        <label for="password">Password</label><br>
                        <input type="password" name="password" id="login-password">
                    </div>
                </div>
                
                <input type="submit" class="btn amber darken-4" value="login" id="upload-submit" name="submit">            
            </div>
        </form> 
        <!--ERROR-->
        <span class="err-container">
            <i class="material-icons">error</i>
            <span id="login-errors" class="err"></span>
        </span>
        <!--SUCCESS-->
        <span class="success-container">
            <i class="material-icons">check</i>
            <span id="login-success" class="success"></span>
        </span>
         
    </div>
