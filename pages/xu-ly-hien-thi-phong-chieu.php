<!--  Xử lý sự kiện hiển thị ghế theo mã phòng chiếu -->
<?php
    require_once('../database/connectDatabase.php');
    if(isset($_GET['MAPM']) && isset($_GET['MASC'])) {
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


    if(isset($_GET['TENPHIM']) && isset($_GET['MASC'])) {
        $connect = new connectDatabase();
        $TENPHIM = $_GET['TENPHIM'];
        $MASC = $_GET['MASC'];
        $tieuDeSql = "SELECT * FROM suatchieu
                    WHERE MASC = '$MASC'";
        $tieuDeQuery = $connect->executeQuery($tieuDeSql);

        while($tieuDeRow = mysqli_fetch_assoc($tieuDeQuery)) {
            echo  "<h4>$TENPHIM</h4>";
            echo  '<p>';
            echo  "<time>" . $tieuDeRow['THOIGIANBATDAU'] . ", </time>";
            echo  '<date>'. $tieuDeRow['NGAY'] .'</date>';
            echo  '</p>';
        }
        $connect->disconnect();
    }
?>
