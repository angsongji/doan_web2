<?php
    include("../database/connectDatabase.php");
    $connect = new connectDatabase("localhost", "root", "", "cinema");
    $dichVuSql = "SELECT * FROM dichvu";
    $dichVuQuery = $connect->executeQuery($dichVuSql);
?>

<div class="container-pop-up-menu-chon-nuoc">
    <div class="header-menu-chon-nuoc">
        <h3>Combo - Bắp Nước</h3>
        <div id="icon-close-menu-chon-nuoc">&times;</div>
    </div>

    <div id="menu-bap-nuoc">
        <?php while($dichVuRow = mysqli_fetch_assoc($dichVuQuery)) { ?>
        <div class="mon">
            <img src="../img/<?php echo $dichVuRow['NAMEANH']; ?>" alt="">

            <div class="thong-tin-dich-vu">
                <div class="ten-dich-vu"><?php echo $dichVuRow['TENDICHVU']; ?></div>
                <div class="mo-ta-dich-vu"><?php echo $dichVuRow['MOTA']; ?></div>
                <div class="gia-dich-vu"><?php echo $dichVuRow['PRICE']; ?></div>
                <div class="so-luong-dich-vu">
                    <button name="<?php echo $dichVuRow['MADICHVU'].'-btn-tru'; ?>">-</button>
                    <input type="text" name="<?php echo $dichVuRow['MADICHVU'].'-input'; ?>" value="0">
                    <button name="<?php echo $dichVuRow['MADICHVU'].'-btn-cong'; ?>">+</button>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

    <div id="tong-tien-bap-nuoc">
        <div>
            <span>Tổng cộng</span>
            <span>120000đ</span>
        </div>

        <h4>Tiếp tục</h4>
    </div>
</div>