<?php
require_once('../database/connectDatabase.php');
$conn = new connectDatabase();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['edit_ngay']) && isset($_POST['edit_thoiGianBatDau'])) {
        $ngay = $_POST['edit_ngay'];
        $thoiGianBatDau = $_POST['edit_thoiGianBatDau'];
        $maSuatChieu = $_POST['edit_maSuatChieu'];
        if (!empty($ngay) && !empty($thoiGianBatDau)) {
            $query = "UPDATE suatchieu SET NGAY='$ngay', THOIGIANBATDAU='$thoiGianBatDau' WHERE MASC='$maSuatChieu'";
            $result = $conn->executeQuery($query);
            if ($result) {
                echo '<script>
                        window.history.replaceState({}, document.title, window.location.href.split("?")[0]);
                        window.location.href = "../admin.php?page=chucnangLichchieuphim&message=Cập nhật suất chiếu thành công";
                      </script>';
            } else {
                echo "Có lỗi xảy ra khi cập nhật suất chiếu";
            }
        } else {
            echo "Dữ liệu không hợp lệ";
        }
    }
}

?>
