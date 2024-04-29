<?php
$tenDN="";
if(isset($_SESSION['TenDN'])){
    $tenDN = $_SESSION['TenDN'];
    require_once('./database/connectDatabase.php');
$conn = new connectDatabase();
$sql = "SELECT NAMEANH FROM taikhoan WHERE USERNAME = '$tenDN' ";
$result = $conn->executeQuery($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $tenAnh = $row['NAMEANH'];
} else {
    echo "<script>console.log('Chua dang nhap')</script>";
}

}


    if(isset($_SESSION['TenDN'])){
        echo '
        <a href="#" class="avatar_DN">
            <img src="./img/'.$tenAnh.'"alt="Mô tả hình ảnh">
        </a>
        <div class="header__list">
        <a href="index.php?pages=contentUser.php">Thông tin <i
                class="fa-solid fa-circle-info"></i></a>
                <a href="index.php?pages=history_ticket.php">Lịch sử vé
                    <i class="fa-solid fa-ticket"></i></a>
        <a href="./pages/logout.php">Đăng xuất <i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
        ';
    }else{
        echo '
        <a href="#">
            <i class="fa-regular fa-user"></i>
        </a>
        <div class="header__list">
                <a href="./pages/log_sign.php?pages=log_in">Đăng nhập
            <i class="fa-solid fa-right-to-bracket"></i></a>
                <a href="./pages/log_sign.php?pages=sign_in">Đăng ký
            <i class="fa-solid fa-user-pen"></i></a>
        </div>
        ';
    }
?>
                        