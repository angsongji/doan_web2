<?php
    $connect = new connectDatabase("localhost", "root", "", "cinema");
    $MAPM = $_GET['MAPM'];
    $thanhToanPhimSql = "SELECT * FROM phim WHERE MAPM = '$MAPM'";
    $thanhToanPhimQuery = $connect->executeQuery($thanhToanPhimSql);
?>

<div class="container-pop-up-menu-thanh-toan">
    <div class="header-menu-thanh-toan">
        <h3>Thông Tin Vé Đã Mua</h3>
        <div id="icon-close-menu-thanh-toan">&times;</div>
    </div>

    <div id="menu-thanh-toan">
        <div class="menu-thanh-toan_container" id="ten-phim-thanh-toan">
            <?php   while($thanhToanPhimRow = mysqli_fetch_assoc($thanhToanPhimQuery)) { ?>
                        <h2><?php echo $thanhToanPhimRow['TENPHIM']; ?></h2>
            <?php 
                } 
            ?>
        </div>

        <div class="menu-thanh-toan_container" id="time-and-date-thanh-toan">
            <div id="thoi-gian-chieu-thanh-toan">
                <span>THỜI GIAN</span>
                <div id="thoi-gian-chieu-thanh-toan_tg"></div>
            </div>

            <div id="ngay-chieu-thanh-toan">
                <span>NGÀY CHIẾU</span>
                <div id="ngay-chieu-thanh-toan_nc"></div>
            </div>
        </div>

        <div class="menu-thanh-toan_container" id="rap-thanh-toan">
            <span>RẠP</span>
            <h4 style="font-size: 18px; margin-top:10px;">MEME CINEMA</h4>
        </div>

        <div class="menu-thanh-toan_container" id="phong-chieu-thanh-toan">
            <span>PHÒNG CHIẾU</span>
            <div id="phong-chieu-thanh-toan_pc"></div>
        </div>

        <div class="menu-thanh-toan_container" id="ghe-va-so-tien-thanh-toan">
            <div id="ghe-thanh-toan">
                <span>GHẾ</span>
                <div id="ghe-thanh-toan_ghe"></div>
            </div>

            <div id="so-tien-thanh-toan">
                <span>SỐ TIỀN</span>
                <div id="so-tien-thanh-toan_sotien"></div>
            </div>
        </div>

        <div class="menu-thanh-toan_container" id="bap-nuoc-thanh-toan">
            <span>BẮP-NƯỚC</span>
            <div id="bap-nuoc-thanh-toan_thucpham">
                <div>jkahdsjkhjkashjdhjkashdjhashdkj</div>
                <div>akhskjhahsddjhjashjkhdjkashdhashkd</div>
                <div>ashdjkhajhsdjhashdjkashdjhajkhdjkhajkhd</div>
            </div>
        </div>

        <div class="menu-thanh-toan_container" id="uu-dai-thanh-toan">
            <div>ƯU ĐÃI</div>
        </div>
    </div>

    <div id="thanh-toan">
        <h4>Thanh Toán</h4>
    </div>
</div>

<!-- Xử lý sự kiện chọn dịch vụ -->
<script>

</script>