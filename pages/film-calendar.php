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
                while( $rowNC = mysqli_fetch_assoc($filmCalendarQuery1) ) {
            ?>
                <div class="day" name="<?php echo $rowNC['MASC']; ?>">
                    <label style="font-size:14px;">Ngày Chiếu</label>
                    <p><?php echo $rowNC['NGAY']; ?> </p>
                </div>
            <?php
                }
            ?>
        </div>

        <div class="list-hours">
            <?php
                while( $rowTG = mysqli_fetch_assoc($filmCalendarQuery2) ) {
            ?>
                <div class="hour" 
                    style="display: none;" 
                    name="<?php echo $rowTG['MASC']; ?>">
                    <p><?php echo $rowTG['THOIGIANBATDAU']; ?></p>
                </div>
            <?php
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
            console.log(day[i].getAttribute('name'));
            for(let j = 0; j < hours.length; j++) {
                if(day[i].getAttribute('name') == hours[j].getAttribute('name')) {
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