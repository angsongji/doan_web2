<?php
    $connect = new connectDatabase();
    if(isset($_GET['MAPM'])) {
        $MAPM = $_GET['MAPM'];
        $tenPhimSql = "SELECT * FROM phim p
                    INNER JOIN lichchieuphim lcp ON p.MAPM = lcp.MAPM
                    INNER JOIN suatchieu sc ON lcp.MASC = sc.MASC
                    WHERE p.MAPM = '$MAPM'";
        $tenPhimQuery = $connect->executeQuery($tenPhimSql);
    } else {
        echo "Không Tìm Thấy Mã Phim";
    }
?>


<div class="container-popup-menu-chon-ghe">
    <div class="header-menu-chon-ghe">
        <h3>Mua vé xem phim</h3>
        <div id="icon-close-menu-chon-ghe">&times;</div>
    </div>

    <div id="menu-chon-ghe">
        <h4>Màn Hình</h2>

        <div id="row-ghe">
            
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

            <!-- Chọn Phòng Chiếu -->
            <div class="row" id="phong-chieu">
                <span>Chọn phòng:</span>

                <div id="chon-phong">

                </div>
            </div>
        </div>
    </div>

    <div id="mua-ve">
        <div id="tieu-de-phim">
            <?php
                $kiemTraTenPhim = array();
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

<!-- JS -->
<script>

    // Xử lý sự kiện hiển thị ghế theo mã phòng chiếu bằng async
    function showGhe(MAPM, MAPHONGCHIEU) {
        return new Promise((resolve, reject) => {
            if (MAPHONGCHIEU === "") {
                document.getElementById("row-ghe").innerHTML = "";
                reject("MAPHONGCHIEU is empty");
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        document.getElementById("row-ghe").innerHTML = this.responseText;
                        resolve("Data loaded successfully");
                    }
                };
                xmlhttp.open("GET", "../pages/xu-ly-chon-phong.php?MAPM=" + MAPM + "&&MAPHONGCHIEU=" + MAPHONGCHIEU, true);
                xmlhttp.send();
            }
        });
    }   

    function clickChonGhe() {
        return new Promise((resolve, reject) => {
            // Xu ly su kien ghe don
            let gheDons = document.querySelectorAll('.ghe-don div');
            let lengthGheDons = gheDons.length;
            let choNgoi = document.getElementById('so-ghe-da-chon');

                gheDons.forEach((ghe) => {
                    ghe.addEventListener('click', (e) => {
                        if (!e.target.classList.contains('daMua')) {
                            e.target.classList.toggle('daChon');
                            if (e.target.classList.contains('daChon')) {
                                choNgoi.textContent += e.target.textContent;
                            } else {
                                choNgoi.textContent = choNgoi.textContent.replace(e.target.textContent, '');
                            }
                        }
                    });
                });

            // Xu ly su kien ghe doi
            let gheDois = document.querySelectorAll('.ghe-doi div');
            let lengthGheDois = gheDois.length;

                gheDois.forEach((ghe) => {
                    ghe.addEventListener('click', (e) => {
                        if (!e.target.classList.contains('daMua')) {
                            e.target.classList.toggle('daChon');
                            if (e.target.classList.contains('daChon')) {
                                choNgoi.textContent += e.target.textContent;
                            } else {
                                choNgoi.textContent = choNgoi.textContent.replace(e.target.textContent, '');
                            }
                        }
                    });
                });
        });
    }

    const xuLySuKienHienThiGhe = async (MAPM, MAPHONGCHIEU) => {
        try {
            const showGhePromise = showGhe(MAPM, MAPHONGCHIEU);
            console.log("showGhe: ", await showGhePromise);
            const clickChonGhePromise = clickChonGhe();
            console.log("clickChonGhe: ", await clickChonGhePromise);
        } catch (error) {
            console.log(error);
        }
    }

        // Xử lý sự kiện mở menu-chon-ghe
        function guiThongTinDenXuLyHienThiPhongChieu(maphim, masuatchieu) {
    return new Promise((resolve, reject) => {
        if (masuatchieu === "") {
            reject("MASUATCHIEU is empty");
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById("chon-phong").innerHTML = this.responseText;
                    resolve("URL updated successfully");
                }
            };
            xmlhttp.open("GET", "../pages/xu-ly-hien-thi-phong-chieu.php?MAPM=" + maphim + "&&MASC=" + masuatchieu, true);
            xmlhttp.send();
            }
        });
    }   

    function hienThiMenuChonGhe() {
        return new Promise((resolve, reject) => {
            containerPopupMenuChonGhe.style.display = "flex";
            const chonPhong = document.querySelectorAll('.phong');
                console.log(chonPhong);
                for(let i = 0; i < chonPhong.length; i++) {
                    let MAPM = chonPhong[i].getAttribute('maphim');
                    let MAPHONGCHIEU = chonPhong[i].getAttribute('maphongchieu');
                    chonPhong[i].addEventListener(
                        'click',
                        () => { 
                            xuLySuKienHienThiGhe(MAPM, MAPHONGCHIEU);
                        },
                        false
                    );
                }
            resolve("Menu displayed successfully");
        });
    }   

    const xuLySuKienHienThiMenuChonGhe = async (maphim, masuatchieu) => {
        try {
            const guiThongTinDenXuLyHienThiPhongChieuPromise = guiThongTinDenXuLyHienThiPhongChieu(maphim, masuatchieu);
            console.log(await guiThongTinDenXuLyHienThiPhongChieuPromise);
            const hienThiMenuChonGhePromise = hienThiMenuChonGhe();
            console.log(await hienThiMenuChonGhePromise);
        } catch (error) {
            console.log(error);
        }
    }

    const hour = document.querySelectorAll(".hour");

    for(let i = 0; i < hour.length; i++) {
        hour[i].addEventListener(
            "click",
            (e) => {
                xuLySuKienHienThiMenuChonGhe(
                    hour[i].getAttribute('maphim'), 
                    hour[i].getAttribute('masuatchieu'));
            },
            false
        )
    }
    // const chonPhong = document.querySelectorAll('.phong');
    // console.log("chonphong: " + chonPhong);

    // for(let i = 0; i < chonPhong.length; i++) {
    //     let MAPM = chonPhong[i].getAttribute('maphim');
    //     let MAPHONGCHIEU = chonPhong[i].getAttribute('maphongchieu');
    //     chonPhong[i].addEventListener(
    //         'click',
    //         () => { 
    //             xuLySuKienHienThiGhe(MAPM, MAPHONGCHIEU);
    //         },
    //         false
    //     );
    // }

</script>
