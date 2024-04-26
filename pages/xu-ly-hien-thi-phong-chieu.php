<!--  Xử lý sự kiện hiển thị ghế theo mã phòng chiếu -->
<?php
    require_once('../database/connectDatabase.php');
    if(isset($_GET['MASC'])) {
        $connect = new connectDatabase();
        $MAPM = $_GET['MAPM'];
        $MASC = $_GET['MASC'];
        $phongSql = "SELECT * FROM lichchieuphim 
        WHERE MAPM = '$MAPM'AND MASC = '$MASC'";
        $phongQuery = $connect->executeQuery($phongSql);

        while($rowPhong = mysqli_fetch_assoc($phongQuery)) {
            $maphongchieu = $rowPhong['MAPHONGCHIEU'];
            $maphim = $rowPhong['MAPM'];
            echo '<div class="phong"'.
                        "maphongchieu='$maphongchieu'
                        maphim='$maphim'>";
                        echo $rowPhong['MAPHONGCHIEU'];
            echo '</div>';
        }
        $connect->disconnect();
    }
?>
