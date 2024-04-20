<?php 
    if(isset($_SESSION['TenDN'])){
        echo '
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
        <div class="header__list">
                <a href="./pages/log_sign.php?pages=log_in">Đăng nhập
            <i class="fa-solid fa-right-to-bracket"></i></a>
                <a href="./pages/log_sign.php?pages=sign_in">Đăng ký
            <i class="fa-solid fa-user-pen"></i></a>
        </div>
        ';
    }
?>
                        