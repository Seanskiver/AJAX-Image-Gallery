<!--<div class="row">-->
<!--    <div class="col s12 m4 l4 offset-m2 offset-l2">-->
<!--       <h5>Register</h5>        -->
<!--    </div>-->
    
<!--</div>-->
<!--<div class="row">-->
<!--    <div class="col s12 m8 offset-m2 l8 offset-l2">-->
<!--        <form id="regiser-form" method="POST" action=".">-->
<!--            <input type="hidden" name="action" value="register">-->
<!--            <div class="row">-->
<!--                <div class="row">-->
<!--                    <div class="input-field">-->
<!--                        <label for="title">Username</label><br>-->
<!--                        <input type="text" name="username" id="title">-->
<!--                    </div>-->
<!--                </div>-->
                
                <!--FILE UPLOAD-->
<!--                <div class="row">-->
<!--                    <div class="file-field input-field">-->
<!--                        <div class="file-path-wrapper">-->
<!--                            <label for="password">Password</label><br>-->
<!--                            <input type="password" name="password" id="password">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                
<!--                <input type="submit" class="btn amber darken-4" value="Upload Image" id="upload-submit" name="submit">            -->
<!--            </div>-->
<!--        </form>        -->
<!--    </div>-->
<!--</div>-->




<div class="slideOut" id="slide-register">
    <i class="material-icons close">close</i>
    <h5>Register</h5>
    <!--REGISTER FORM-->
    <form id="register-form">
        <div class="row">
            <div class="row">
                <div class="input-field">
                    <label for="username">Username</label><br>
                    <input type="text" name="username" id="register-username">
                </div>
            </div>

            <div class="row">
                <div class="file-field input-field">
                    <label for="password">Password</label><br>
                    <input type="password" name="password" id="register-password">
                </div>
            </div>
            
            <div class="row">
                <div class="file-field input-field">
                    <label for="passwordVerify">Verify Password</label><br>
                    <input type="password" name="verify" id="passwordVerify">
                </div>
                <span id="pass-error"></span>
            </div>
            
            <input type="submit" class="btn amber darken-4" value="register" id="upload-submit" name="submit">            
        </div>
    </form>
    <!--ERRORS-->
    <span class="err-container">
        <i class="material-icons">error</i>
        <span id="register-errors" class="err"></span>
    </span>
    <!--SUCCESS-->
    <span class="success-container">
        <i class="material-icons">check</i>
        <span id="register-success" class="success"></span>
    </span>    
</div>
