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
    $chucnang=array();
//     $servername = "localhost";
//     $username = "root";
//     $password = "Oanh2004!";
//     $dbname = "rapchieuphim";
// // Tạo kết nối
//     $conn =new mysqli($servername, $username, $password, $dbname);
//     $sql = "SELECT * FROM chucnang ";
//     $result = $conn->query($sql);
//     $conn->close();
//     
//     while($row = $result->fetch_assoc()) {
//         array_push($chucnang,$row['TENCHUCNANG']);
//     }
    
   array_push($chucnang,"Quản lí nguời dùng");
    array_push($chucnang,"Quản lí phim");
    array_push($chucnang,"Quản lí lịch chiếu phim");
    array_push($chucnang,"Quản lí dịch vụ");
    array_push($chucnang,"Lịch sử đặt vé");
    array_push($chucnang,"Báo cáo doanh thu");
    array_push($chucnang,"Phân quyền chức năng");
    array_push($chucnang,"Đăng xuất");
   

    $liItem='';
    foreach($chucnang as $tenchucnang ){
        $href;
        $nameChucnang;
        $icon;
        
        switch($tenchucnang){
            case "Quản lí nguời dùng":
                $nameChucnang="qlnguoidung";
                $icon="fa-solid fa-user";
                $href="admin.php?page=usersadmin";
                break;
            case "Quản lí phim":
                $nameChucnang="qlphim";
                $icon="fa-solid fa-video";
                $href="admin.php?page=moviesadmin";
                break;
            case "Quản lí lịch chiếu phim":
                $nameChucnang="pllichchieu";
                $icon="fa-solid fa-calendar-days";
                $href="admin.php?page=lichchieuphimadmin";
                break;
            case "Quản lí dịch vụ":
                $nameChucnang="qldichvu";
                $icon="fa-solid fa-mug-saucer";
                $href="admin.php?page=dichvuadmin";
                break;
            case "Quản lí hóa đơn":
                $nameChucnang="qldatve";
                $icon="fa-solid fa-ticket";
                $href="admin.php?page=lsdatveadmin";
                break;
            case "Báo cáo doanh thu":
                $nameChucnang="bcdoanhthu";
                $icon="fa-solid fa-chart-column";
                $href="admin.php?page=baocaodoanhthu";
                break;
            case "Phân quyền chức năng":
                $nameChucnang="phanquyencn";
                $icon="fa-solid fa-file-pen";
                $href="admin.php?page=phanquyenadmin";
                break;
            case "Đăng xuất":
                $nameChucnang="dangxuat";
                $icon="fa-regular fa-circle-left";
                $href="index.php";
                break;    
        }
        if($tenchucnang != "Đăng xuất" && isset($_GET['mode']))
            $href=$href.'&mode='.$_GET['mode'];
        $liItem=$liItem . "<a  href='" . $href . "'><li name='". $nameChucnang . "'><i class='" . $icon . "'></i><span>" . $tenchucnang . "</span></li></a>";
       
    }
    echo ' 
        <ul>
        '. $liItem .'
        </ul>
    ';
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
?>