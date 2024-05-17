<?php

$chucnang = array();
if(isset($_SESSION['TenDN'])){$USERNAME=$_SESSION['TenDN'];}
else{$USERNAME="chưa có";}
if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
    switch ($mode) {
        case "day": {
                echo '<img src="img/logoweb_admin.png">';
                break;
            }
        case "night": {
                echo '<img src="img/logoweb_admin_dark.png">';
                break;
            }
    }
} else {
    echo '<img src="img/logoweb_admin.png">';
}

if (isset($_GET['MAQYEN']))
    $MAQUYEN = $_GET['MAQYEN'];
else
    $MAQUYEN = 'QQL';

//Include file chứa class connectDatabase
require_once('./database/connectDatabase.php');
// Thực hiện kết nối đến cơ sở dữ liệu

$connection = new connectDatabase();

// Thực hiện truy vấn (ví dụ)
$query = "SELECT DISTINCT TENCHUCNANG FROM chitietquyen_chucnang,chucnang where maquyen='" . $MAQUYEN . "'AND chitietquyen_chucnang.MACHUCNANG = chucnang.MACHUCNANG;"; // Truy vấn SQL của bạn
$result = $connection->executeQuery($query);

// Xử lý kết quả nếu cần
if ($result) {
    // Thực hiện các thao tác với kết quả
    while ($row = $result->fetch_assoc()) {
        
        array_push($chucnang,$row['TENCHUCNANG']);
    }
} else {
    echo'thất bại';
    // Xử lý khi truy vấn thất bại
}

// Ngắt kết nối đến cơ sở dữ liệu khi đã xong
$connection->disconnect();


array_push($chucnang, "Quản lý lịch chiếu phim");
array_push($chucnang, "Quản lý phòng chiếu");
array_push($chucnang, "Quản lý phim");
array_push($chucnang, "Vé");
array_push($chucnang, "Thống kê");
array_push($chucnang, "Đăng xuất");


$liItem = '';
foreach ($chucnang as $tenchucnang) {
    $href;
    $nameChucnang;
    $icon;
    $flag=true;
    switch ($tenchucnang) {
        case "Tài khoản":
            $nameChucnang = "qlnguoidung";
            $icon = "fa-solid fa-user";
            $href = "admin.php?page=usersadmin";
            break;
        case "Quản lý phim":
            $nameChucnang = "qlphim";
            $icon = "fa-solid fa-video";
            $href = "admin.php?page=chucnangPhim&arrCN=".$chucnang ;
            break;
        case "Quản lý lịch chiếu phim":
            $nameChucnang = "pllichchieu";
            $icon = "fa-solid fa-calendar-days";
            $href = "admin.php?page=chucnangLichchieuphim&arrCN=".$chucnang;
            break;
        case "Dịch vụ":
            $nameChucnang = "qldichvu";
            $icon = "fa-solid fa-mug-saucer";
            $href = "admin.php?page=dichvuadmin";
            break;
        case "Vé":
            $nameChucnang = "qldatve";
            $icon = "fa-solid fa-ticket";
            $href = "admin.php?page=lsdatveadmin";
            break;
        case "Thống kê":
            $nameChucnang = "bcdoanhthu";
            $icon = "fa-solid fa-chart-column";
            $href = "admin.php?page=baocaodoanhthu";
            break;
        case "Phân quyền":
            $nameChucnang = "phanquyencn";
            $icon = "fa-solid fa-file-pen";
            $href = "admin.php?page=phanquyenadmin";
            break;
        case "Ưu đãi":
            $nameChucnang= "uudaiadmin";
            $icon = "fa-solid fa-tag";
            $href = "admin.php?page=uudaiadmin";
            break;
        case "Quản lý phòng chiếu":
            $nameChucnang= "phongchieuad";
            $icon = "fa-solid fa-couch";
            $href = "admin.php?page=phongchieu&arrCN=".$chucnang;
            break;
        case "Đăng xuất":
            $nameChucnang = "dangxuat";
            $icon = "fa-regular fa-circle-left";
            $href = "admin.php?page=index";//quay ve trang index chỗ này
            break;
        default:
            $flag=false;
            break;
    }
    if($flag){
        if ($tenchucnang != "Đăng xuất" && isset($_GET['mode']))
            $href = $href . '&mode=' . $_GET['mode'];
        $liItem = $liItem . "<a  href='" . $href . "'><li name='" . $nameChucnang . "'><i class='" . $icon . "'></i><span>" . $tenchucnang . "</span></li></a>";
    }
   
}
echo ' 
        <ul>
        ' . $liItem . '
        </ul>
    ';
