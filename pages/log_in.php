<?php
    session_start();
    if(isset($_POST["btn_logIn"])){
        $tenDN = $_POST['TenDNorEmail'];
        $password = $_POST['Password'];

        $sqlDN = "SELECT USERNAME, PASSWORD, EMAIL FROM taikhoan";

        require_once('../database/connectDatabase.php');
        $conn = new connectDatabase();

        $result = $conn->executeQuery($sqlDN);
        $flag = 0;
        if ($result->num_rows > 0) {
            // Lặp qua từng hàng dữ liệu và hiển thị
            while($row = $result->fetch_assoc()) {
                $userNameSQL = $row["USERNAME"];
                $passSQL = $row["PASSWORD"];
                $emailSQL = $row["EMAIL"];
                if(($tenDN==$userNameSQL||$tenDN==$emailSQL)&&$password==$passSQL){
                    $flag++;
                    $_SESSION['TenDN'] = $userNameSQL;
                    break;
                }
            }
        } else {
            echo "Không có dữ liệu trong bảng.";
        }

        if($flag>0){  
            header('location:../index.php'); // header là hàm chuyển trang
        }else{
            header('location:log_sign.php?pages=log_in&tenDN='.$tenDN);
        }
    }
?>

<div class="wrapper_login">
            <div class="title">
                <h2>Đăng nhập vào Meme</h2>
            </div>
            <form action="log_sign.php?pages=log_in" class="form_login" name="form_login" method="POST">                    
                <div class="form_login__item">
                    <div class="form_login__item-icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="form_login__item-input">
                        <input class="input_item1" type="text" placeholder="Tên người dùng hoặc email" name="TenDNorEmail">
                    </div>
                </div>
                    <span class="error"  style="margin-left: 81px;">
                    <?php
                        if(isset($_GET['tenDN'])){
                            echo "Tên đăng nhập hoặc email có thể không đúng";
                        }
                    ?>
                    </span>
                
                <div class="form_login__item">
                    <div class="form_login__item-icon">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <div class="form_login__item-input">
                        <input id="myElement" class="input_item1 password" type="password" placeholder="Mật khẩu" name="Password">
                        <span class="toggle-password eye_pass">
                            <i class="fa-solid fa-eye"></i>
                        </span>
                    </div>
                    
                </div>
                <span class="error"  style="margin-left: 81px;">
                <?php
                        if(isset($_GET['tenDN'])){
                            echo "Mật khẩu có thể không đúng";
                        }
                    ?>
                    </span>
                <div class="btn__update-wrap">
                    <input type="submit" value="Đăng nhập" class="btn_log_sign" name="btn_logIn">
                </div>
            </form>
            <div class="wrap__link">
                <div class="forgot">
                    <a href="./log_sign.php?pages=forget_password">Quên mật khẩu?</a>
                </div>
                <div class="create__account">
                    <a href="./log_sign.php?pages=sign_in">Tạo tài khoản</a>
                </div>
            </div>
        </div>


    <?php
        if(isset($_GET['tenDN'])){
        $tendn = $_GET['tenDN'];
        echo "<script>form_login.TenDNorEmail.value ='$tendn';</script>";
            }
    ?>