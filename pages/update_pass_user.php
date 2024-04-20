<form action="index.php?pages=contentUser.php&id=pass" name="formPasswordUser" method="POST">
        <div class="right-side__tittle">
            <h1>Cập nhật thông tin</h1>
        </div>
        <div class="right-side__wrapper">
            <div class="right-info__item">
                <label for="Mật khẩu hiện tại" class="right-info__item-name">Mật khẩu hiện tại</label>
                <input type="password" class="right-info__item-input" id="Mật khẩu hiện tại" name="current_pass">
                <span class="errorPass"><?php
                if(isset($_GET['errorCurrentPass'])&&$_GET['errorCurrentPass']=='empty'){
                    echo 'Không được để trống thông tin';
                }else if(isset($_GET['errorCurrentPass'])&&$_GET['errorCurrentPass']=='wrong'){
                    echo 'Password sai!!!';
                }
                ?></span>
            </div>
            
            <div class="right-info__item">
                <label for="Mật khẩu mới" class="right-info__item-name">Mật khẩu mới</label>
                <input type="password" class="right-info__item-input" id="Mật khẩu mới" name="new_pass">
                <span class="errorPass"><?php
                if(isset($_GET['errorNewPass'])&&$_GET['errorNewPass']=='empty'){
                    echo 'Không được để trống thông tin';
                }else if(isset($_GET['errorNewPass'])&&$_GET['errorNewPass']=='wrong'){
                    echo 'Password phai toi thieu 8 ky tu!!!';
                }
                    ?></span>
            </div>
            <div class="right-info__item">
                <label for="Nhập lại mật khẩu" class="right-info__item-name">Nhập lại mật khẩu</label>
                <input type="password" class="right-info__item-input" id="Nhập lại mật khẩu" name="re_pass">
                <span class="errorPass"><?php
                if(isset($_GET['errorRePass'])&&$_GET['errorRePass']=='emptyNewPass'){
                    echo 'Password moi chua nhap';
                }else if(isset($_GET['errorRePass'])&&$_GET['errorRePass']=='empty'){
                    echo 'Password chua nhap';
                }else if(isset($_GET['errorRePass'])&&$_GET['errorRePass']=='wrong'){
                    echo 'Password nhap lai sai!!';
                }
                    ?></span>
            </div>
        </div>
        <div class="btn__update-wrap">
            <input type="submit" value="Cập nhật" class="btn__update" name="btn_update_pass">
        </div>     
</form>

<?php 
$tenDN="";
    if(isset($_SESSION['TenDN'])){
        $tenDN = $_SESSION['TenDN'];
    }

    require_once('./database/connectDatabase.php');
    $conn = new connectDatabase();

    $sqlPass = "SELECT PASSWORD FROM taikhoan WHERE USERNAME = '$tenDN' ";
    $resultPass = $conn->executeQuery($sqlPass);
        if ($resultTenAnh->num_rows > 0) {
            // Lặp qua từng hàng dữ liệu và hiển thị
            $row = $resultPass->fetch_assoc();
            $Passwd = $row["PASSWORD"];
        } else {
            echo "Không có dữ liệu trong bảng.";
        }

    if(isset($_POST['btn_update_pass'])){
        $chuoiEmpty = "";
        $count = 0;

        if(empty($_POST['current_pass'])){
                $chuoiEmpty = "errorCurrentPass=empty";
                $count++;
        }else if($Passwd!==$_POST['current_pass']){
                $chuoiEmpty = "errorCurrentPass=wrong";
                $count++;
        }

        if(empty($_POST['new_pass'])){
            if($chuoiEmpty==""){
                $chuoiEmpty = "errorNewPass=empty";  
            }else{
                $chuoiEmpty .="&errorNewPass=empty";  
            }
            $count++;
        }else if(!preg_match('/^.{8,}$/', $_POST['new_pass'])){
            if($chuoiEmpty==""){
                    $chuoiEmpty = "errorNewPass=wrong";  
            }else{
                    $chuoiEmpty .="&errorNewPass=wrong";  
            }
            $count++;
        }

        if(empty($_POST['new_pass'])){
            if($chuoiEmpty==""){
                $chuoiEmpty = "errorRePass=emptyNewPass";  
            }else{
                $chuoiEmpty .="&errorRePass=emptyNewPass";  
            }
            $count++;
        }else if(empty($_POST['re_pass'])){
            if($chuoiEmpty==""){
                $chuoiEmpty = "errorRePass=empty";  
            }else{
                $chuoiEmpty .="&errorRePass=empty";  
            }
            $count++;
        }else if($_POST['re_pass']!==$_POST['new_pass']){
            if($chuoiEmpty==""){
                    $chuoiEmpty = "errorRePass=wrong";  
            }else{
                    $chuoiEmpty .="&errorRePass=wrong";  
            }
            $count++;
        }

        if($count>0){
            echo "<script>window.location.href = 'index.php?pages=contentUser.php&id=pass&" .$chuoiEmpty. "';</script>";
        }else{
            $passUp = $_POST['new_pass'];
            $sqlUpdatePass = "UPDATE taikhoan SET PASSWORD = '$passUp' WHERE USERNAME ='$tenDN'";
            $conn->executeQuery($sqlUpdatePass);
            echo "<script>window.location.href = 'index.php?pages=contentUser.php';</script>";
 //           echo "<script>alert('thanh cong')</script>";
        }
        $conn->disconnect();
    }
?>