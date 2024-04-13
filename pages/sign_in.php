<div class="wrapper_signin">
            <div class="title">
                <h2>Đăng ký tài khoản Meme</h2>
            </div>
            <form action="regex_sign_in.php" class="form_signin" name="formLogIn" method="POST">
                <div class="form_signin__item">
                    <div class="form_signin__item-input">
                        <input id="Name" class="input_item" type="text" placeholder="Tên của bạn">
                    </div>
                </div>
                <div class="form_signin__item">
                    <div class="form_signin__item-input">
                        <input id="Email" name="Email" class="input_item" type="text" placeholder="Địa chỉ email của bạn">
                    </div>
                    <span class="error"><?php 
                        if(isset($_GET['errorEmail'])&&$_GET['errorEmail']=='empty'){
                            echo 'Không được để trống thông tin';
                        }if(isset($_GET['errorEmail'])&&$_GET['errorEmail']=='wrong'){
                            echo 'Email sai!';
                        }?> 

                    </span>
                </div>
                <div class="form_signin__item">
                    <div class="form_signin__item-input">
                        <input id="Name_account" class="input_item" type="text" placeholder="Tên tài khoản">
                    </div>
                </div>
                <div class="form_signin__item">
                    <div class="form_signin__item-input">
                        <input class="input_item password" style="padding-right: 25px" type="password" placeholder="Mật khẩu">
                        <span class="toggle-password eye_pass">
                            <i class="fa-solid fa-eye"></i>
                        </span>
                    </div>
                </div>
                
                <div class="form_signin__item">
                    <div class="form_signin__item-input">
                        <input id = "myElement" class="input_item re-password" type="password" style="padding-right: 25px" placeholder="Xác nhận lại mật khẩu của bạn">
                        <span class="toggle-password eye_re-pass">
                            <i class="fa-solid fa-eye"></i>
                        </span>
                    </div>

                </div>
                <div class="btn__update-wrap">
                    <input type="submit" value="Đăng ký" class="btn_log_sign">
                </div>
            </form>
        </div>

        <?php 
    if(isset($_GET['Email'])){
        $email = $_GET['Email'];
        echo "<script>formLogIn.Email.value ='$email';</script>";
    }

    ?>