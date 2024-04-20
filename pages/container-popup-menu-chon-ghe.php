<?php
    $connect = new connectDatabase();
    if(isset($_GET['MAPM'])) {
        $MAPM = $_GET['MAPM'];
        $tenPhimSql = "SELECT * FROM phim p
                    INNER JOIN lichchieuphim lcp ON p.MAPM = lcp.MAPM
                    INNER JOIN suatchieu sc ON lcp.MASC = sc.MASC
                    WHERE p.MAPM = '$MAPM'";
        $tenPhimQuery = $connect->executeQuery($tenPhimSql);

        $MAPHONGCHIEU = $_GET['MAPHONGCHIEU'];
        $gheSql = "SELECT * FROM ghe
                    WHERE MAPHONGCHIEU = '$MAPHONGCHIEU'";
        $gheQuery = $connect->executeQuery($gheSql);

    } else {
        echo "Không Tìm Thấy Mã Phim";
    }
?>

<?php
    $rowDonA = array();
    $rowDonB = array();
    $rowDonC = array();
    $rowDonD = array();
    $rowDonE = array();
    $rowDonF = array();
    $rowDonG = array(); $rowDoiG = array();
    $rowDonH = array(); $rowDoiH = array();

    while($gheRow = mysqli_fetch_assoc($gheQuery)) {
        if($gheRow['HANGGHE'] == 'A' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'A' && $gheRow['MALOAIGHE'] == 'BIZ') 
            $rowDonA[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];

        if($gheRow['HANGGHE'] == 'B' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'B' && $gheRow['MALOAIGHE'] == 'BIZ') 
            $rowDonB[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];

        if($gheRow['HANGGHE'] == 'C' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'C' && $gheRow['MALOAIGHE'] == 'BIZ') 
            $rowDonC[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];

        if($gheRow['HANGGHE'] == 'D' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'D' && $gheRow['MALOAIGHE'] == 'BIZ') 
            $rowDonD[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];

        if($gheRow['HANGGHE'] == 'E' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'E' && $gheRow['MALOAIGHE'] == 'BIZ') 
            $rowDonE[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];

        if($gheRow['HANGGHE'] == 'F' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'F' && $gheRow['MALOAIGHE'] == 'BIZ') 
            $rowDonF[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];

        if($gheRow['HANGGHE'] == 'G' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'G' && $gheRow['MALOAIGHE'] == 'BIZ' || 
        $gheRow['HANGGHE'] == 'G' && $gheRow['MALOAIGHE'] == 'DOI') {
            if($gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'G' && $gheRow['MALOAIGHE'] == 'BIZ')
                $rowDonG[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];
            if($gheRow['MALOAIGHE'] == 'DOI')
                $rowDoiG[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];
        }
        
        if($gheRow['HANGGHE'] == 'H' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'H' && $gheRow['MALOAIGHE'] == 'BIZ' || 
        $gheRow['HANGGHE'] == 'H' && $gheRow['MALOAIGHE'] == 'DOI') {
            if($gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'G' && $gheRow['MALOAIGHE'] == 'BIZ')
                $rowDonG[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];
            if($gheRow['MALOAIGHE'] == 'DOI')
                $rowDoiG[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];
        }
    }

    $connect->disconnect();
?>

<div class="container-popup-menu-chon-ghe">
    <div class="header-menu-chon-ghe">
        <h3>Mua vé xem phim</h3>
        <div id="icon-close-menu-chon-ghe">&times;</div>
    </div>

    <div id="menu-chon-ghe">
        <h4>Màn Hình</h2>

        <div id="row-ghe">
            <!-- Row A -->
            <div class="ghe-don">
                <?php 
                    $i = 1;
                    foreach($rowDonA as $key => $value) { 
                ?>
                    <div id="<?php echo $key;?>" class="<?php echo $value == 'BIZ'? 'ghe-vip': '' ; ?>">
                        <?php echo 'A'.$i; ?>
                        <?php ++$i; // Tăng giá trị của $i lên 1 sau mỗi lần lặp ?>
                    </div>
                <?php } ?>
            </div>

            <!-- Row B -->
            <div class="ghe-don">
                <?php 
                    $i = 1;
                    foreach($rowDonB as $key => $value) { 
                ?>
                    <div id="<?php echo $key;?>" class="<?php echo $value == 'BIZ'? 'ghe-vip': '' ; ?>">
                        <?php echo 'B'.$i; ?>
                        <?php ++$i; // Tăng giá trị của $i lên 1 sau mỗi lần lặp ?>
                    </div>
                <?php } ?>
            </div>

            <!-- Row C -->
            <div class="ghe-don">
                <?php 
                    $i = 1;
                    foreach($rowDonC as $key => $value) { 
                ?>
                    <div id="<?php echo $key;?>" class="<?php echo $value == 'BIZ'? 'ghe-vip': '' ; ?>">
                        <?php echo 'C'.$i; ?>
                        <?php ++$i; // Tăng giá trị của $i lên 1 sau mỗi lần lặp ?>
                    </div>
                <?php } ?>
            </div>

            <!-- Row D -->
            <div class="ghe-don">
                <?php 
                    $i = 1;
                    foreach($rowDonD as $key => $value) { 
                ?>
                    <div id="<?php echo $key;?>" class="<?php echo $value == 'BIZ'? 'ghe-vip': '' ; ?>">
                        <?php echo 'D'.$i; ?>
                        <?php ++$i; // Tăng giá trị của $i lên 1 sau mỗi lần lặp ?>
                    </div>
                <?php } ?>
            </div>

            <!-- Row E -->
            <div class="ghe-don">
                <?php 
                    $i = 1;
                    foreach($rowDonE as $key => $value) { 
                ?>
                    <div id="<?php echo $key;?>" class="<?php echo $value == 'BIZ'? 'ghe-vip': '' ; ?>">
                        <?php echo 'E'.$i; ?>
                        <?php ++$i; // Tăng giá trị của $i lên 1 sau mỗi lần lặp ?>
                    </div>
                <?php } ?>
            </div>

            <!-- Row F -->
            <div class="ghe-don">
                <?php 
                    $i = 1;
                    foreach($rowDonF as $key => $value) { 
                ?>
                    <div id="<?php echo $key;?>" class="<?php echo $value == 'BIZ'? 'ghe-vip': '' ; ?>">
                        <?php echo 'F'.$i; ?>
                        <?php ++$i; // Tăng giá trị của $i lên 1 sau mỗi lần lặp ?>
                    </div>
                <?php } ?>
            </div>

            <!-- Row G -->
            <?php if(!empty($rowDonG)) { ?>
                <div class="ghe-don">
                <?php 
                    $i = 1;
                    foreach($rowDonG as $key => $value) { 
                ?>
                    <div id="<?php echo $key;?>" class="<?php echo $value == 'BIZ'? 'ghe-vip': '' ; ?>">
                        <?php echo 'G'.$i; ?>
                        <?php ++$i; // Tăng giá trị của $i lên 1 sau mỗi lần lặp ?>
                    </div>
                <?php } ?>
                </div>
            <?php } ?>

            <?php if(!empty($rowDoiG)) { ?>
                <div class="ghe-doi">
                <?php 
                    $i = 1;
                    foreach($rowDoiG as $key => $value) { 
                ?>
                    <div id="<?php echo $key;?>" class="<?php echo $value == 'BIZ'? 'ghe-vip': '' ; ?>">
                        <?php echo 'G'.$i; ?>
                        <?php ++$i; // Tăng giá trị của $i lên 1 sau mỗi lần lặp ?>
                    </div>
                <?php } ?>
                </div>
            <?php } ?>

            <!-- Row H -->
            <?php if(!empty($rowDonH)) { ?>
                <div class="ghe-don">
                <?php 
                    $i = 1;
                    foreach($rowDonH as $key => $value) { 
                ?>
                    <div id="<?php echo $key;?>" class="<?php echo $value == 'BIZ'? 'ghe-vip': '' ; ?>">
                        <?php echo 'H'.$i; ?>
                        <?php ++$i; // Tăng giá trị của $i lên 1 sau mỗi lần lặp ?>
                    </div>
                <?php } ?>
                </div>
            <?php } ?>

            <?php if(!empty($rowDoiH)) { ?>
                <div class="ghe-doi">
                <?php 
                    $i = 1;
                    foreach($rowDoiH as $key => $value) { 
                ?>
                    <div id="<?php echo $key;?>" class="<?php echo $value == 'BIZ'? 'ghe-vip': '' ; ?>">
                        <?php echo 'H'.$i; ?>
                        <?php ++$i; // Tăng giá trị của $i lên 1 sau mỗi lần lặp ?>
                    </div>
                <?php } ?>
                </div>
            <?php } ?>

            <!-- <div class ="ghe-doi">
                <div>A1</div>
                <div>A2</div>
                <div>A1</div>
                <div>A2</div>
                <div>A1</div>
            </div> -->
        </div>

        <div id="icon-loai-ghe">
            <div class="row">
                <div class="loai-ghe" style="background-color: gray;"></div><p>Đã đặt</p>
                <div class="loai-ghe"  style="background-color: #b0e5c4;"></div><p>Ghế bạn chọn</p>
                <div class="loai-ghe"  style="background-color: #d5636384;"></div><p>Ghế thường</p>
            </div>
            
            <div class="row">
                <div class="loai-ghe"  style="background-color: red;"></div><p>Ghế VIP</p>
                <div class="loai-ghe"  style="background-color: rgb(250, 37, 161);"></div><p>Ghế đôi</p>   
            </div>
        </div>
    </div>

    <div id="mua-ve">
        <div id="tieu-de-phim">
            <?php
                while( $rowTenPhim = mysqli_fetch_assoc($tenPhimQuery) ) {
                    if($rowTenPhim['MAPM'] == $_GET['MAPM']) {
            ?>
                <h4><?php echo $rowTenPhim['TENPHIM'] ?></h4>
                <p>
                    <time><?php echo $rowTenPhim['THOIGIANBATDAU'] ?> , </time>
                    <date><?php echo $rowTenPhim['NGAY'] ?></date>
                </p>
            <?php
                    }
                }
            ?>
        </div>

        <div id="cho-ngoi">
            <span style="font-size: 14px;">Chỗ ngồi: </span>
            
            <div id="so-ghe-da-chon">
                
            </div>
        </div>

        <div id="tong-tien">
            <div>
                <p style="font-size: 14px;">Tạm tính: </p>
                <div style="margin-top: 5px;">100000đ</div>
            </div>

            <div id="btn-mua-ve">
                <p>Mua vé</p>
            </div>
        </div>
    </div>
</div>

<script>
    // Xu ly su kien ghe don
    const gheDons = document.querySelectorAll('.ghe-don div');
    const lengthGheDons = gheDons.length;
    const choNgoi = document.getElementById('so-ghe-da-chon');

    for(let i = 0; i < lengthGheDons; i++) {
        gheDons[i].addEventListener(
            'click',
            (e) => {
                if(!e.target.classList.contains('daMua')) {
                    e.target.classList.toggle('daChon');
                        if(e.target.classList.contains('daChon'))
                            choNgoi.textContent += e.target.textContent;
                        else 
                            choNgoi.textContent = choNgoi.textContent.replace(e.target.textContent, '');;
                }
            },
            false
        )
    }

    // Xu ly su kien ghe doi
    const gheDois = document.querySelectorAll('.ghe-doi div');
    const lengthGheDois = gheDois.length;

    for(let i = 0; i < lengthGheDois; i++) {
        gheDois[i].addEventListener(
            'click',
            (e) => {
                if(!e.target.classList.contains('daMua')) {
                    e.target.classList.toggle('daChon');
                        if(e.target.classList.contains('daChon'))
                            choNgoi.textContent += e.target.textContent;
                        else 
                            choNgoi.textContent = choNgoi.textContent.replace(e.target.textContent, '');;
                }
            },
            false
        )
    }

</script>