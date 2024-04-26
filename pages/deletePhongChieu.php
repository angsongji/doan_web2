<?php
require_once('../database/connectDatabase.php');
$conn = new connectDatabase();

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM phongchieu WHERE MAPHONGCHIEU = '$id'";
        $result = $conn->executeQuery($query);
        if($result) {
            echo '<script>
                    window.history.replaceState({}, document.title, window.location.href.split("?")[0]);
                    window.location.href = "../admin.php?page=phongchieu&message=Xóa phòng chiếu thành công";
                </script>';

        } else {
            echo 'Khong truy van duoc';
        }
    }
    if(isset($_GET['sid'])) {
        $id = $_GET['sid'];
        $query = "DELETE FROM loaighe WHERE MALOAIGHE = '$id'";
        $result = $conn->executeQuery($query);
        if($result) {
            echo '<script>
                    window.history.replaceState({}, document.title, window.location.href.split("?")[0]);
                    window.location.href = "../admin.php?page=phongchieu&message=Xóa loại ghế thành công";
                </script>';
        } else {
            echo 'Khong truy van duoc';
        }
    }
    
?>