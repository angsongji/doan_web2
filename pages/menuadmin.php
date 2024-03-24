<?php
    if(isset($_GET['mode'])){
        $mode=$_GET['mode'];
        switch($mode){
            case "day":{
                echo '<img src="img/logoweb_admin.png">';
                break;
            }
            case "night":{
                echo '<img src="img/logoweb_admin_dark.png">';
                break;
            }
        }
    }else{
        echo '<img src="img/logoweb_admin.png">';
    }
    echo '
            
        <ul>
            <li name="qlphim"><i class="fa-solid fa-user"></i><span>Quản lí nguời dùng</span></li>
            <li name="qlphim"><i class="fa-solid fa-video"></i><span>Quản lí phim</span></li>
            <li name="pllichchieu"><i class="fa-solid fa-calendar-days"></i><span>Quản lí lịch chiếu phim</span></li>
            <li name="qldichvu"><i class="fa-solid fa-mug-saucer"></i><span>Quản lí dịch vụ</span></li>
            <li name="qldatve"><i class="fa-solid fa-ticket"></i><span>Lịch sử đặt vé</span></li>
            <li name="qldatve"><i class="fa-solid fa-chart-column"></i><span>Báo cáo doanh thu</span></li>
            <li name="qldichvu"><i class="fa-solid fa-file-pen"></i><span>Phân quyền chức năng</span></li>
            <li name="dangxuat"><i class="fa-regular fa-circle-left"></i><span>Đăng xuất</span></li>
        </ul>';
?>