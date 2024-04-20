<link rel="stylesheet" href="./css/phongchieu.css">
<?php
require_once('../database/connectDatabase.php');

$conn = new connectDatabase();
    
   
    if(isset($_POST['MAPHONGCHIEU'])) {
        $maphongchieu = $_POST['MAPHONGCHIEU'];
        $tenphongchieu = $_POST['TENPHONGCHIEU'];
        $soghe = $_POST['SOGHE'];
        $trangthai = isset($_POST['TRANGTHAI']);
        $sid = $_POST['sid'];
        $suaPhongChieu_sql = "UPDATE phongchieu SET MAPHONGCHIEU='$maphongchieu', TENPHONGCHIEU='$tenphongchieu', SOGHE='$soghe', TRANGTHAI='$trangthai' WHERE MAPHONGCHIEU='$sid'";
        $result = $conn->executeQuery($suaPhongChieu_sql);
        if($result){
            echo '<script>window.location.href = "../admin.php?page=phongchieu";</script>';
        }
        else{
            echo'fail';
        }
    }
    if(isset($_POST['MALOAIGHE'])) {
        $maloaighe = $_POST['MALOAIGHE'];
        $tenloaighe = $_POST['TENLOAIGHE'];
        $price = $_POST['PRICE'];
        $id = $_POST['id'];
        $suaLoaiGhe_sql = "UPDATE loaighe SET MALOAIGHE='$maloaighe', TENLOAIGHE='$tenloaighe', PRICE='$price' WHERE MALOAIGHE='$id'";
        $result = $conn->executeQuery($suaLoaiGhe_sql);
        if($result){
            echo '<script>window.location.href = "../admin.php?page=phongchieu";</script>';
        }
        else{
            echo'fail';
        }
    }
if(isset($_GET['dataType'])){
    $dataType = $_GET['dataType'];
    if($dataType === 'phongchieu') {
        $query = "SELECT MAPHONGCHIEU, TENPHONGCHIEU, SOGHE, TRANGTHAI FROM phongchieu";
        $propertyLabels = ['Mã phòng chiếu', 'Tên phòng chiếu', 'Số Ghế', 'Trạng Thái'];
    } elseif ($dataType ==='loaighe') {
        $query = "SELECT MALOAIGHE, TENLOAIGHE, PRICE FROM loaighe";
        $propertyLabels = ['Mã Loại Ghế', 'Tên Loại Ghế', 'Giá'];
    }
    

    $result = $conn->executeQuery($query);

    if($result) {
        if($result->num_rows > 0){
            echo '<div class="data-container">';
            echo '<div class="property-row">';
            foreach ($propertyLabels as $label) {
                echo '<div class="property">' . $label . '</div>';
            }
            echo '</div>';

            while ($row = $result->fetch_assoc()) {
                echo '<div class="data-row">';
                foreach ($row as $key => $value) {
                    echo '<div class="data">' . $value . '</div>';
                }
                if($dataType === 'phongchieu'){
                    echo '<form method="post" action="phongchieu.php">';
                    echo '<input type="hidden" name="dataType" value="' . $dataType . '">';
                    echo '<input type="hidden" name="rowId" value="' .$row['MAPHONGCHIEU'] . '">';
                    echo '<button><a href="./pages/updatephongchieu.php?sid=' . $row['MAPHONGCHIEU'] . '" class="row">Sửa</a></button>';
                    echo '</form>';
                    echo '</div>';
                } else if($dataType === 'loaighe') {
                    echo '<form method="post" action="phongchieu.php">';
                    echo '<input type="hidden" name="dataType" value="' . $dataType . '">';
                    echo '<input type="hidden" name="rowId" value="' .$row['MALOAIGHE'] . '">';
                    echo '<button><a href="./pages/updatephongchieu.php?id=' . $row['MALOAIGHE'] . '" class="row">Sửa</a></button>';
                    echo '</form>';
                    echo '</div>';
                }
            }
        } else {
            echo "Không có dữ liệu trong bảng $dataType";
        }
    } else {
        echo "Có lỗi xảy ra khi truy vấn cơ sở dữ liệu.";
    }
    $conn->disconnect();

}
?>
