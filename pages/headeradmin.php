<?php 
    if(isset($_GET['page'])){
        $chucnang;
        switch($_GET['page']){
            case "usersadmin":
                $chucnang="Quản lí nguời dùng";
                break;
            case "moviesadmin":
                $chucnang="Quản lí phim";
                break;
            case "lichchieuphimadmin":
                $chucnang="Quản lí lịch chiếu phim";
                break;
            case "dichvuadmin":
                $chucnang="Quản lí dịch vụ";
                break;
            case "lsdatveadmin":
                $chucnang="Lịch sử đặt vé";
                break;
            case "baocaodoanhthu":
                $chucnang="Báo cáo doanh thu";
                break;
            case "phanquyenadmin":
                $chucnang="Phân quyền chức năng";
                break;
        }
        echo '<span>'. $chucnang .'</span>';
    }else echo '<span></span>';
    echo '<span>
        <div class="mode_page">';
    if(isset($_GET['mode'])){
        $url='../admin.php?';
        $mode=$_GET['mode'];
        switch($mode){
            case "day":{
                if(isset($_GET['page'])) $url.='mode=night&page='.$_GET['page'];
                else $url.='mode=night';
                echo '<a href="'.$url.'"><i class="fa-solid fa-cloud-sun"></i></a>';
                break;
            }
            case "night":{
                if(isset($_GET['page'])) $url.='mode=day&page='.$_GET['page'];
                else $url.='mode=day';
                echo '<a href="'.$url.'"><i class="fa-solid fa-cloud-moon"></i></a>';
                break;
            }
        }
    }
    else{
        $url='../admin.php?mode=night';
        if(isset($_GET['page'])) $url=$url.'&page='.$_GET['page'];
        echo '<a href="'.$url.'"><i class="fa-solid fa-cloud-sun"></i></a>';    
    }     
    echo    '</div>
        <i class="fa-solid fa-user-tie"></i>
        <span>Ten admin a</span>
    </span>';

?>