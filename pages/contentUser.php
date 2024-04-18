<? session_start(); ?>

<div class="wrapper">
    <div class="left-side">
        <div class="left-side__wrapper">
            <div class="display-status">
                <span><i class="fa-solid fa-user"></i></span>
                <span>Thông tin tài khoản</span>
            </div>
            <div class="background-avatar">
                <div class="avatar">
                <div class="avatar_item" style="background-image: url('./img/<?php
                    if(isset($_GET['tenAnh'])){
                        echo $_GET['tenAnh'];
                    }else{
                        echo "userImg.jpg";
                    }?>');" onclick="document.getElementById('fileInput').click()"></div>
                    <form action="index.php?pages=contentUser.php" name="formUp" method="post" enctype="multipart/form-data">
                        <input type="file" id="fileInput" name="fileInput" style="display: none;" onchange="document.getElementById('btn').click()">
                        <input type="submit" id="btn" name="btn" style="display: none;">
                    </form>
                </div>
            </div>
            <div class="user-name">
                <h1>
                    <?php if(isset($_SESSION['TenDN'])){
                        echo $_SESSION['TenDN'];
                    }?>
                </h1>
            </div>
            <div class="option__wrapper">
                <div class="option-item information_user">
                    <span><i class="fa-solid fa-user"></i></span>
                    <span>Thông tin tài khoản</span>
                </div>

                <div class="option-item change_password">
                    <span><i class="fa-solid fa-lock"></i></span>
                    <span>Đổi mật khẩu</span>
                </div>
            </div>
        </div>
    </div>
    <div class="right-side">
    <?php 
    // basename($_SERVER['PHP_SELF']) === 'informationUser.php'
    if(isset($_GET['id'])&&$_GET['id']==='pass'){
        include "update_pass_user.php";
    }else{
        include "update_user.php";
    }
    ?>
    </div>
</div>
<script>
    document.querySelector(".information_user").addEventListener("click",()=>{
        window.location.href = "index.php?pages=contentUser.php";
    });
    document.querySelector(".change_password").addEventListener("click",()=>{
        window.location.href = "index.php?pages=contentUser.php&id=pass";
    });

</script>

<?php 


if(isset($_POST["btn"])){
    if(isset($_FILES['fileInput'])){
        $anh = "./img/" . basename($_FILES["fileInput"]["name"]);
        $tenAnh = $_FILES["fileInput"]["name"];
        if($_FILES['fileInput']["size"]==0){
            echo "Anh chua chon";
        }else if(file_exists($anh)){
            echo "<script>window.location.href = 'index.php?pages=contentUser.php&tenAnh=" . $tenAnh . "'</script>";
        }else{
            move_uploaded_file($_FILES['fileInput']['tmp_name'], './img/' . $_FILES["fileInput"]["name"]);
            echo "<script>window.location.href = 'index.php?pages=contentUser.php&tenAnh=" . $tenAnh . "'</script>";
        }
    }else{
        echo "<script>alert('up load bi loai')</script>";
    }
}


?>