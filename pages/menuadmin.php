<?php
$MAQUYEN="";
$chucnang = array();
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

// array_push($chucnang, "Quản lí nguời dùng");
// array_push($chucnang, "Quản lí phim");
// array_push($chucnang, "Quản lí lịch chiếu phim");
// array_push($chucnang, "Quản lí dịch vụ");
// array_push($chucnang, "Lịch sử đặt vé");
// array_push($chucnang, "Báo cáo doanh thu");
// array_push($chucnang, "Phân quyền chức năng");
array_push($chucnang, "Vé");
array_push($chucnang, "Thống kê");
array_push($chucnang, "Đăng xuất");


$liItem = '';
foreach ($chucnang as $tenchucnang) {
    $href;
    $nameChucnang;
    $icon;

    switch ($tenchucnang) {
        case "Tài khoản":
            $nameChucnang = "qlnguoidung";
            $icon = "fa-solid fa-user";
            $href = "admin.php?page=usersadmin";
            break;
        case "Phim":
            $nameChucnang = "qlphim";
            $icon = "fa-solid fa-video";
            $href = "admin.php?page=chucnangPhim";
            break;
        case "Lịch chiếu phim":
            $nameChucnang = "pllichchieu";
            $icon = "fa-solid fa-calendar-days";
            $href = "admin.php?page=chucnangLichchieuphim";
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
        case "Phòng chiếu":
            $nameChucnang= "phongchieuad";
            $icon = "fa-solid fa-couch";
            $href = "admin.php?page=phongchieu";
            break;
        case "Đăng xuất":
            $nameChucnang = "dangxuat";
            $icon = "fa-regular fa-circle-left";
            // chay dong nay
            // if(isset($_SESSION['TenDN'])){
            //     unset($_SESSION['TenDN']);
            // }
            // header('location:./index.php');
            $href = "admin.php?page=index";
            break;
    }
    if ($tenchucnang != "Đăng xuất" && isset($_GET['mode'])){
        $href = $href . '&mode=' . $_GET['mode'];
    }   
    $liItem = $liItem . "<a  href='" . $href . "'><li name='" . $nameChucnang . "'><i class='" . $icon . "'></i><span>" . $tenchucnang . "</span></li></a>";
}
echo ' 
        <ul>
        ' . $liItem . '
        </ul>
    ';

    // if (isset($_POST['dangxuat'])) {
    //     // include "./pages/logout.php";
    //     echo "dddd";
    // }
/* echo '
            
        <ul>
            <li name="qlphim"><i class="fa-solid fa-user"></i><span>Quản lí nguời dùng</span></li>
            <li name="qlphim"><i class="fa-solid fa-video"></i><span>Quản lí phim</span></li>
            <li name="pllichchieu"><i class="fa-solid fa-calendar-days"></i><span>Quản lí lịch chiếu phim</span></li>
            <li name="qldichvu"><i class="fa-solid fa-mug-saucer"></i><span>Quản lí dịch vụ</span></li>
            <li name="qldatve"><i class="fa-solid fa-ticket"></i><span>Lịch sử đặt vé</span></li>
            <li name="qldatve"><i class="fa-solid fa-chart-column"></i><span>Báo cáo doanh thu</span></li>
            <li name="qldichvu"><i class="fa-solid fa-file-pen"></i><span>Phân quyền chức năng</span></li>
            <li name="dangxuat"><i class="fa-regular fa-circle-left"></i><span>Đăng xuất</span></li>
        </ul>';*/
