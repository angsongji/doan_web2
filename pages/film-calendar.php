<?php
    require_once("../database/connectDatabase.php");
    $connect = new connectDatabase();
    if(isset($_GET['MAPM'])) {
        $MAPM = $_GET['MAPM'];
        $filmCalendarSql1 = "SELECT * FROM lichchieuphim lcp
                        INNER JOIN suatchieu sc ON lcp.MASC = sc.MASC
                        WHERE lcp.MAPM = '$MAPM'";
        $filmCalendarQuery1 = $connect->executeQuery($filmCalendarSql1);

        $filmCalendarSql2 = "SELECT * FROM lichchieuphim lcp
                        INNER JOIN suatchieu sc ON lcp.MASC = sc.MASC
                        WHERE lcp.MAPM = '$MAPM'";
        $filmCalendarQuery2 = $connect->executeQuery($filmCalendarSql2);

    } else {
        echo "Không Tìm Thấy Mã Phim";
    }
?>

<div class="filmCalendar">
    <h4>Lịch Chiếu</h4>

    <div class="calendar">
        <div class="list-days">
            <?php
            // Xử lý sự kiện không hiện lịch chiếu cùng ngày nhiều lần
                $kiemTraNgays = array();

                while( $rowNC = mysqli_fetch_assoc($filmCalendarQuery1) ) {

                    $kiemTraTonTai = false;

                    foreach($kiemTraNgays as $kiemTraNgay) {
                        if($kiemTraNgay == $rowNC['NGAY']) {
                            $kiemTraTonTai = true;
                        }
                    }

                    if(!$kiemTraTonTai) {
                        $kiemTraNgays[] = $rowNC['NGAY'];
            ?>
                        <div class="day" 
                            masuatchieu = "<?php echo $rowNC['MASC']; ?>"
                            ngaychieu = "<?php echo $rowNC['NGAY']; ?>"   
                        >
                                <label style="font-size:14px;">Ngày Chiếu</label>
                                <p><?php echo $rowNC['NGAY']; ?> </p>
                        </div>

            <?php
                    }
                }
            ?>
        </div>

        <div class="list-hours">
            <?php
                $kiemTraHours = array();

                while( $rowTG = mysqli_fetch_assoc($filmCalendarQuery2)) {
                    $kiemTraTonTai = false;

                    foreach($kiemTraHours as $kiemTraHour) {
                        if($kiemTraHour == $rowTG['THOIGIANBATDAU']) {
                            $kiemTraTonTai = true;
                        }
                    }

                    if(!$kiemTraTonTai) {
                        $kiemTraHours[] = $rowTG['THOIGIANBATDAU'];;
            ?>
                        <div class="hour" 
                            style="display: none;" 
                            maphim = "<?php echo $rowTG['MAPM']; ?>";
                            masuatchieu = "<?php echo $rowTG['MASC']; ?>"
                            ngaychieu = "<?php echo $rowTG['NGAY']; ?>"
                        >
                            <p><?php echo $rowTG['THOIGIANBATDAU']; ?></p>
                        </div>
            <?php
                    }
                }
                $connect->disconnect();
            ?>
        </div>
    </div>

    <!-- Pre and Next -->
    <div class="pre">
        <div id="btn-left">&lsaquo;</div>
    </div>

    <div class="next">
    <div id="btn-right"> &rsaquo;</div>
    </div>
</div>

<!-- Xử lý sự kiện hiển thị thời gian khi click vào Ngày Chiếu -->
<script>

const day = document.querySelectorAll('.day');
const hours = document.querySelectorAll('.hour');

for(let i = 0; i < day.length; i++) {
    day[i].addEventListener(
        'click',
        (e) => {
            for(let j = 0; j < hours.length; j++) {
                if(day[i].getAttribute('ngaychieu') == hours[j].getAttribute('ngaychieu')) {
                    hours[j].style.display = 'flex';
                } else {
                    hours[j].style.display = 'none';
                }
            }
        }, 
        false
    );
}

</script>