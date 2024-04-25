<?php
require_once('./database/connectDatabase.php');
$conn = new connectDatabase();
$sqlPDC = "SELECT TENPHIM, NAMEANH, MAPM, DANHGIA, DOTUOI 
    FROM phim
    WHERE TRANGTHAI = 1 ";
$resultPDC = $conn->executeQuery($sqlPDC);

$sqlPSC = "SELECT TENPHIM, NAMEANH, MAPM, DANHGIA, DOTUOI 
    FROM phim
    WHERE TRANGTHAI = 0 ";
$resultPSC = $conn->executeQuery($sqlPSC);
?>

<title>Trang chủ</title>
<div class="main_home">
        <div class="phimdangchieu">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__full-width">
                        <span class="btn_next-film" id="btn_next_phimdangchieu">
                            <i class="fa-solid fa-chevron-right"></i>
                        </span>
                        <span class="btn_prev-film" id="btn_prev_phimdangchieu">
                            <i class="fa-solid fa-chevron-left"></i>
                        </span>
                        <div class="grid__column wrap-bottom">

                            <div class="home-tittle">
                                <span class="sparkle">
                                    Phim Đang Chiếu
                                </span>
                            </div>
                            <div class="home-product">
                                <div class="grid__row_no_wrap" id="slide_phimdangchieu">

                                    <!-- <div class="grid__column-2-4">
                                        <a class="product-item" href="#">
                                            <div class="product-item__img"
                                                style="background-image: url(./img/ngoidenkyquai.jpg);"></div>
                                            <div class="wrap__name">
                                                <h4 class="product-item__movie-name">Ngôi đền quỷ quái</h4>
                                                <h6 class="product-item__category-name">Kinh dị</h6>
                                            </div>
                                            <div class="product-item__action">
                                                <span class="product-item__star">
                                                    <i class="goldStar fa-solid fa-star"></i>
                                                </span>
                                                <span class="product-item__mark">8.9</span>
                                            </div>
                                            <div class="product-item__age-limit">
                                                <div class="product-item__age-limit-label">
                                                    13+
                                                </div>
                                            </div>
                                            <div class="product-item__play">
                                                <span class="product-item__play-icon">
                                                    <i class="fa-solid fa-play"></i>
                                                </span>
                                            </div>
                                        </a>
                                    </div> -->

                                    <?php
                if ($resultPDC->num_rows > 0) {
                    while($row = $resultPDC->fetch_assoc()) {
                        echo "<div class='grid__column-2-4'>";
                        echo"<a class='product-item' href='./index.php?pages=chi-tiet-phim.php&maPhim=".$row["MAPM"]."'>";
                        echo"<div class='product-item__img' style='background-image: url(./img/".$row["NAMEANH"].");'></div>";
                        echo"<div class='wrap__name'>";
                        echo"<h4 class='product-item__movie-name'>".$row["TENPHIM"]."</h4>";

                        $maPhim = $row["MAPM"];
                        $sqlTheLoaiPDC = "SELECT TENTHELOAI
                        FROM phim
                        
                        JOIN chitietphim_theloai ON phim.MAPM = chitietphim_theloai.MAPM
                        JOIN theloai ON chitietphim_theloai.MATHELOAI = theloai.MATHELOAI 
                        WHERE phim.MAPM = '$maPhim' ";
                        $resultTheLoaiPDC = $conn->executeQuery($sqlTheLoaiPDC);
                        if ($resultTheLoaiPDC->num_rows > 0) {
                            // Output dữ liệu từ cột
                            $tenTheLoai = "";
                            while($rowTheLoai = $resultTheLoaiPDC->fetch_assoc()) {
                                $tenTheLoai .= $rowTheLoai["TENTHELOAI"] . ", ";
                            }
                            // Loại bỏ dấu phẩy cuối cùng
                            $tenTheLoai = rtrim($tenTheLoai, ", ");
                            echo"<h6 class='product-item__category-name'>".$tenTheLoai."</h6>";
                        }

                        
                        echo"</div>";
                        echo"<div class='product-item__action'>";
                        echo"<span class='product-item__star'><i class='goldStar fa-solid fa-star'></i></span>";
                        echo"<span class='product-item__mark'>".$row["DANHGIA"]."</span>";
                        echo"</div>";
                        echo"<div class='product-item__age-limit'>";
                        echo"<div class='product-item__age-limit-label'>";
                        echo $row["DOTUOI"]."+";
                        echo"</div>";
                        echo"</div>";
                        echo"<div class='product-item__play'>";
                        echo"<span class='product-item__play-icon'><i class='fa-solid fa-play'></i></span>";
                        echo"</div>";
                        echo"</a>";
                        echo"</div>";
                        
                    }
                } else {
                    echo "<script>console.log('khong co phim')</script>";
                }
            ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="phimsapchieu">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__full-width">
                        <span class="btn_next-film individual" id="btn_next_phimsapchieu">
                            <i class="fa-solid fa-chevron-right"></i>
                        </span>
                        <span class="btn_prev-film individual" id="btn_prev_phimsapchieu">
                            <i class="fa-solid fa-chevron-left"></i>
                        </span>
                        <div class="grid__column wrap-bottom">
                            <div class="home-tittle">
                                <span class="text-phimsapchieu">
                                    Phim sắp chiếu
                                </span>
                            </div>
                            <div class="home-product">
                                <div class="grid__row_no_wrap" id="slide_phimsapchieu">

                                    <!-- <div class="grid__column-2-4">
                                        <a class="product-item" href="#">
                                            <div class="product-item__img"
                                                style="background-image: url(./img/ngoidenkyquai.jpg);"></div>
                                            <div class="wrap__name">
                                                <h4 class="product-item__movie-name individual">Ngôi đền quỷ quái</h4>
                                                <h6 class="product-item__category-name individual">Kinh dị</h6>
                                            </div>

                                            <div class="product-item__age-limit">
                                                <div class="product-item__age-limit-label">
                                                    13+
                                                </div>
                                            </div>
                                            <div class="product-item__play">
                                                <span class="product-item__play-icon">
                                                    <i class="fa-solid fa-play"></i>
                                                </span>
                                            </div>
                                        </a>
                                    </div> -->

                                    <?php
                if ($resultPSC->num_rows > 0) {
                    while($row = $resultPSC->fetch_assoc()) {
                        echo "<div class='grid__column-2-4'>";
                        echo"<a class='product-item' href='./index.php?pages=chi-tiet-phim.php&maPhim=".$row["MAPM"]."'>";
                        echo"<div class='product-item__img' style='background-image: url(./img/".$row["NAMEANH"].");'></div>";
                        echo"<div class='wrap__name'>";
                        echo"<h4 class='product-item__movie-name individual'>".$row["TENPHIM"]."</h4>";

                        $maPhim = $row["MAPM"];
                        $sqlTheLoaiPSC = "SELECT TENTHELOAI
                        FROM phim
                        
                        JOIN chitietphim_theloai ON phim.MAPM = chitietphim_theloai.MAPM
                        JOIN theloai ON chitietphim_theloai.MATHELOAI = theloai.MATHELOAI 
                        WHERE phim.MAPM = '$maPhim' ";
                        $resultTheLoaiPSC = $conn->executeQuery($sqlTheLoaiPSC);
                        if ($resultTheLoaiPSC->num_rows > 0) {
                            $tenTheLoai = "";
                            while($rowTheLoai = $resultTheLoaiPSC->fetch_assoc()) {
                                $tenTheLoai .= $rowTheLoai["TENTHELOAI"] . ", ";
                            }
                            $tenTheLoai = rtrim($tenTheLoai, ", ");
                            echo"<h6 class='product-item__category-name individual'>".$tenTheLoai."</h6>";
                        }

                        
                        echo"</div>";
                        echo"<div class='product-item__age-limit'>";
                        echo"<div class='product-item__age-limit-label'>";
                        echo $row["DOTUOI"]."+";
                        echo"</div>";
                        echo"</div>";
                        echo"<div class='product-item__play'>";
                        echo"<span class='product-item__play-icon'><i class='fa-solid fa-play'></i></span>";
                        echo"</div>";
                        echo"</a>";
                        echo"</div>";
                        
                    }
                } else {
                    echo "<script>console.log('khong co phim')</script>";
                }
            ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="menuphim">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__full-width">
                        <div class="grid__column wrap-bottom">
                            <div class="home-filter">
                                <span class="text-menu">
                                    Tìm phim chiếu rạp trên MeMe
                                </span>
                                <div class="home-filer__navbar">
                                    <select class="cbb_category home-filer__navbar-item" name="cbb_category">
                                        <option value="Thể loại">Thể loại</option>
                                        <option value="Tình cảm học đường">Tình cảm học đường</option>
                                    </select>
                                    <select class="cbb_country home-filer__navbar-item" name="cbb_country">
                                        <option value="Quốc gia">Quốc gia</option>

                                    </select>
                                    <select class="cbb_years home-filer__navbar-item" name="cbb_years">
                                        <option value="Năm">Năm</option>

                                    </select>
                                    <div class="search-container">
                                        <input type="text" class="home-filer__navbar-item searchHome" id="search" name="search" placeholder="Type to search...">
                                        <span class="search-icon">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="home-product">
                                <div class="grid__row">

                                    <div class="grid__column-2-4">
                                        <a class="product-item" href="#">
                                            <div class="product-item__img"
                                                style="background-image: url(./img/ngoidenkyquai.jpg);"></div>
                                            <div class="wrap__name">
                                                <h4 class="product-item__movie-name individual">Ngôi đền quỷ quái</h4>
                                                <h6 class="product-item__category-name individual">Kinh dị</h6>
                                            </div>

                                            <div class="product-item__age-limit">
                                                <div class="product-item__age-limit-label">
                                                    13+
                                                </div>
                                            </div>
                                            <div class="product-item__play">
                                                <span class="product-item__play-icon">
                                                    <i class="fa-solid fa-play"></i>
                                                </span>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="grid__column-2-4">
                                        <a class="product-item" href="#">
                                            <div class="product-item__img"
                                                style="background-image: url(./img/ngoidenkyquai.jpg);"></div>
                                            <div class="wrap__name">
                                                <h4 class="product-item__movie-name individual">Ngôi đền quỷ quái</h4>
                                                <h6 class="product-item__category-name individual">Kinh dị</h6>
                                            </div>

                                            <div class="product-item__age-limit">
                                                <div class="product-item__age-limit-label">
                                                    13+
                                                </div>
                                            </div>
                                            <div class="product-item__play">
                                                <span class="product-item__play-icon">
                                                    <i class="fa-solid fa-play"></i>
                                                </span>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="grid__column-2-4">
                                        <a class="product-item" href="#">
                                            <div class="product-item__img"
                                                style="background-image: url(./img/ngoidenkyquai.jpg);"></div>
                                            <div class="wrap__name">
                                                <h4 class="product-item__movie-name individual">Ngôi đền quỷ quái</h4>
                                                <h6 class="product-item__category-name individual">Kinh dị</h6>
                                            </div>

                                            <div class="product-item__age-limit">
                                                <div class="product-item__age-limit-label">
                                                    13+
                                                </div>
                                            </div>
                                            <div class="product-item__play">
                                                <span class="product-item__play-icon">
                                                    <i class="fa-solid fa-play"></i>
                                                </span>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="grid__column-2-4">
                                        <a class="product-item" href="#">
                                            <div class="product-item__img"
                                                style="background-image: url(./img/ngoidenkyquai.jpg);"></div>
                                            <div class="wrap__name">
                                                <h4 class="product-item__movie-name individual">Ngôi đền quỷ quái</h4>
                                                <h6 class="product-item__category-name individual">Kinh dị</h6>
                                            </div>

                                            <div class="product-item__age-limit">
                                                <div class="product-item__age-limit-label">
                                                    13+
                                                </div>
                                            </div>
                                            <div class="product-item__play">
                                                <span class="product-item__play-icon">
                                                    <i class="fa-solid fa-play"></i>
                                                </span>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="grid__column-2-4">
                                        <a class="product-item" href="#">
                                            <div class="product-item__img"
                                                style="background-image: url(./img/ngoidenkyquai.jpg);"></div>
                                            <div class="wrap__name">
                                                <h4 class="product-item__movie-name individual">Ngôi đền quỷ quái</h4>
                                                <h6 class="product-item__category-name individual">Kinh dị</h6>
                                            </div>

                                            <div class="product-item__age-limit">
                                                <div class="product-item__age-limit-label">
                                                    13+
                                                </div>
                                            </div>
                                            <div class="product-item__play">
                                                <span class="product-item__play-icon">
                                                    <i class="fa-solid fa-play"></i>
                                                </span>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="grid__column-2-4">
                                        <a class="product-item" href="#">
                                            <div class="product-item__img"
                                                style="background-image: url(./img/ngoidenkyquai.jpg);"></div>
                                            <div class="wrap__name">
                                                <h4 class="product-item__movie-name individual">Ngôi đền quỷ quái</h4>
                                                <h6 class="product-item__category-name individual">Kinh dị</h6>
                                            </div>

                                            <div class="product-item__age-limit">
                                                <div class="product-item__age-limit-label">
                                                    13+
                                                </div>
                                            </div>
                                            <div class="product-item__play">
                                                <span class="product-item__play-icon">
                                                    <i class="fa-solid fa-play"></i>
                                                </span>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="grid__column-2-4">
                                        <a class="product-item" href="#">
                                            <div class="product-item__img"
                                                style="background-image: url(./img/ngoidenkyquai.jpg);"></div>
                                            <div class="wrap__name">
                                                <h4 class="product-item__movie-name individual">Ngôi đền quỷ quái</h4>
                                                <h6 class="product-item__category-name individual">Kinh dị</h6>
                                            </div>

                                            <div class="product-item__age-limit">
                                                <div class="product-item__age-limit-label">
                                                    13+
                                                </div>
                                            </div>
                                            <div class="product-item__play">
                                                <span class="product-item__play-icon">
                                                    <i class="fa-solid fa-play"></i>
                                                </span>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="grid__column-2-4">
                                        <a class="product-item" href="#">
                                            <div class="product-item__img"
                                                style="background-image: url(./img/ngoidenkyquai.jpg);"></div>
                                            <div class="wrap__name">
                                                <h4 class="product-item__movie-name individual">Ngôi đền quỷ quái</h4>
                                                <h6 class="product-item__category-name individual">Kinh dị</h6>
                                            </div>

                                            <div class="product-item__age-limit">
                                                <div class="product-item__age-limit-label">
                                                    13+
                                                </div>
                                            </div>
                                            <div class="product-item__play">
                                                <span class="product-item__play-icon">
                                                    <i class="fa-solid fa-play"></i>
                                                </span>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="grid__column-2-4">
                                        <a class="product-item" href="#">
                                            <div class="product-item__img"
                                                style="background-image: url(./img/ngoidenkyquai.jpg);"></div>
                                            <div class="wrap__name">
                                                <h4 class="product-item__movie-name individual">Ngôi đền quỷ quái</h4>
                                                <h6 class="product-item__category-name individual">Kinh dị</h6>
                                            </div>

                                            <div class="product-item__age-limit">
                                                <div class="product-item__age-limit-label">
                                                    13+
                                                </div>
                                            </div>
                                            <div class="product-item__play">
                                                <span class="product-item__play-icon">
                                                    <i class="fa-solid fa-play"></i>
                                                </span>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

