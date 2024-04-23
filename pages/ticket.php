<?php
$maVe="";
if(isset($_GET['mave'])){
    $maVe=$_GET['mave'];
    require_once('./database/connectDatabase.php');
$conn = new connectDatabase();
$sql = "SELECT   suatchieu.NGAY AS NGAYCHIEU, ve.NGAY AS NGAYDATVE, THOIGIAN, PHUONGTHUCTHANHTOAN, TONGTIEN, MAPHONGCHIEU, THOIGIANBATDAU, TENPHIM, HOTEN, EMAIL, SODIENTHOAI
    FROM ve
    JOIN lichchieuphim ON ve.MALICHCHIEU = lichchieuphim.MALICHCHIEU
    JOIN suatchieu ON lichchieuphim.MASC = suatchieu.MASC
    JOIN phim ON lichchieuphim.MAPM = phim.MAPM
    JOIN taikhoan ON ve.USERNAME = taikhoan.USERNAME
    WHERE ve.MAVE = '$maVe' ";

$result = $conn->executeQuery($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
} else {
    echo "<script>console.log('khong co ve')</script>";
}
}
?>

<title>Chi tiết vé</title>
<div class="main_ve">
        <div class="grid">
            <div class="grid__row">
                <div class="grid__column-4">
                    <div class="app_side-left">
                        <div class="label_tittle">
                            <span class="label_tittle-text">
                                Chi tiết vé
                            </span>
                        </div>

                        <div class="info_user-wrap">
                            <div class="info_user-tittle">
                                <span class="info_user-tittle-text">
                                    Thông tin khách hàng
                                </span>
                            </div>
                            <div class="horizontal-line"></div>
                            <div class="info-user_item">
                                <div class="info-user_item-label">
                                    <span class="info-user_item-label_text">
                                        Họ và tên:
                                    </span>
                                </div>
                                <div class="info-user_item-input">
                                    <span class="info-user_item-input_text">
                                    <?php echo $row["HOTEN"]; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="info-user_item">
                                <div class="info-user_item-label">
                                    <span class="info-user_item-label_text">
                                        Email:
                                    </span>
                                </div>
                                <div class="info-user_item-input">
                                    <span class="info-user_item-input_text">
                                    <?php echo $row["EMAIL"]; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="info-user_item">
                                <div class="info-user_item-label">
                                    <span class="info-user_item-label_text">
                                        Điện thoại:
                                    </span>
                                </div>
                                <div class="info-user_item-input">
                                    <span class="info-user_item-input_text">
                                    <?php echo $row["SODIENTHOAI"]; ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="info_user-wrap">
                            <div class="info_user-tittle">
                                <span class="info_user-tittle-text">
                                    Tổng giá vé
                                </span>
                            </div>
                            <div class="horizontal-line"></div>
                            <div class="info-user_item">
                                <div class="money_item-label">
                                    <span class="info-user_item-label_text">
                                        Tổng tiền:
                                    </span>
                                </div>
                                <div class="money_item-input">
                                    <span class="info-user_item-input_text">
                                        205.000đ
                                    </span>
                                </div>
                            </div>
                            <div class="info-user_item">
                                <div class="money_item-label">
                                    <span class="info-user_item-label_text">
                                        Khuyến mãi:
                                    </span>
                                </div>
                                <div class="money_item-input">
                                    <span class="info-user_item-input_text">
                                        0đ
                                    </span>
                                </div>
                            </div>
                            <div class="info-user_item">
                                <div class="money_item-label">
                                    <span class="info-user_item-label_text">
                                        Sau khuyến mãi:
                                    </span>
                                </div>
                                <div class="money_item-input">
                                    <span class="info-user_item-input_text">
                                        205.000đ
                                    </span>
                                </div>
                            </div>
                            <div class="info-user_item">
                                <div class="money_item-label">
                                    <span class="info-user_item-label_text">
                                        Thanh toán bằng:
                                    </span>
                                </div>
                                <div class="money_item-input">
                                    <span class="info-user_item-input_text">
                                    <?php echo $row["PHUONGTHUCTHANHTOAN"]; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid__column-8">
                    <div class="app_side-right">
                        <div class="ticket_side">
                            <div class="info_user-tittle">
                                <span class="info_user-tittle-text">
                                    Vé
                                </span>
                            </div>
                            <div class="horizontal-line"></div>
                            <div class="detail_item">
                                <div class="detail_item-label">
                                    <span class="detail_item-label_text">
                                        Phim
                                    </span>
                                </div>
                                <div class="detail_item-content">
                                    <span class="detail_item-content_text bold">
                                    <?php echo $row["TENPHIM"]; ?>
                                    </span>
                                </div>
                            </div>

                            <div class="detail_item">
                                <div class="detail_item-label">
                                    <span class="detail_item-label_text">
                                        Mã vé
                                    </span>
                                </div>
                                <div class="detail_item-content">
                                    <span class="detail_item-content_text bold">
                                    <?php echo $maVe; ?>
                                    </span>
                                </div>
                            </div>

                            <div class="detail_item">
                                <div class="detail_item-label">
                                    <span class="detail_item-label_text">
                                        Ngày chiếu
                                    </span>
                                </div>
                                <div class="detail_item-content">
                                    <span class="detail_item-content_text">
                                    <?php echo $row["NGAYCHIEU"]; ?>
                                    </span>
                                </div>
                            </div>

                            <div class="detail_item">
                                <div class="detail_item-label">
                                    <span class="detail_item-label_text">
                                        Giờ chiếu
                                    </span>
                                </div>
                                <div class="detail_item-content">
                                    <span class="detail_item-content_text bold">
                                    <?php echo $row["THOIGIANBATDAU"]; ?>
                                    </span>
                                </div>
                            </div>

                            <div class="detail_item">
                                <div class="detail_item-label">
                                    <span class="detail_item-label_text">
                                        Rạp
                                    </span>
                                </div>
                                <div class="detail_item-content">
                                    <span class="detail_item-content_text">
                                        MeMe
                                    </span>
                                </div>
                            </div>

                            <div class="detail_item">
                                <div class="detail_item-label">
                                    <span class="detail_item-label_text">
                                        Phòng chiếu
                                    </span>
                                </div>
                                <div class="detail_item-content">
                                    <span class="detail_item-content_text">
                                    <?php echo $row["MAPHONGCHIEU"]; ?>
                                    </span>
                                </div>
                            </div>

                            <div class="detail_item">
                                <div class="detail_item-label">
                                    <span class="detail_item-label_text">
                                        Ghế
                                    </span>
                                </div>
                                <div class="detail_item-content">
                                    <span class="detail_item-content_text bold">
                                        A1,A2
                                    </span>
                                </div>
                            </div>

                            <div class="detail_item">
                                <div class="detail_item-label" style="flex:2;">
                                    <span class="detail_item-label_text">
                                        Ngày đặt vé
                                    </span>
                                </div>
                                <div class="detail_item-content">
                                    <span class="detail_item-content_text">
                                    <?php echo $row["NGAYDATVE"]; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="detail_item">
                                <div class="detail_item-label" style="flex:2;">
                                    <span class="detail_item-label_text">
                                        Thời gian đặt vé
                                    </span>
                                </div>
                                <div class="detail_item-content">
                                    <span class="detail_item-content_text">
                                    <?php echo $row["THOIGIAN"]; ?>
                                    </span>
                                </div>
                            </div>
                            

                            
                            
                            
                            <div class="padding_bottom"></div>

                            <div class="detail_item horizontal-line ggg">
                                <div class="detail_item-label Padding10">
                                    <span class="detail_item-label_text">
                                        Tổng
                                    </span>
                                </div>
                                <div class="detail_item-content Padding10">
                                    <span class="detail_item-content_text">
                                    <?php echo $row["TONGTIEN"] ; ?>đ
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="food_side">
                            <div class="info_user-tittle">
                                <span class="info_user-tittle-text">
                                    Thực phẩm
                                </span>
                            </div>
                            <div class="horizontal-line"></div>
                            <div class="detail_food-item">
                                <div class="detail_food-item_name">
                                    <span class="detail_food-item_name-text bold">
                                        Bắp rang bơ
                                    </span>
                                </div>
                                <div class="detail_food-item_price">
                                    <div class="detail_food-item_price-multi">
                                        <span class="detail_food-item_quantity">1</span>
                                         <span class="bold">X</span>
                                        <span class="detail_food-item_cost">40.000đ</span>
                                    </div>
                                    <div class="detail_food-item_price-total">
                                        <span class="detail_food-item_price-total_text bold">
                                            40.000đ
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="detail_food-item">
                                <div class="detail_food-item_name">
                                    <span class="detail_food-item_name-text bold">
                                        CocaCola
                                    </span>
                                </div>
                                <div class="detail_food-item_price">
                                    <div class="detail_food-item_price-multi">
                                        <span class="detail_food-item_quantity">1</span>
                                         <span class="bold">X</span>
                                        <span class="detail_food-item_cost">30.000đ</span>
                                    </div>
                                    <div class="detail_food-item_price-total">
                                        <span class="detail_food-item_price-total_text bold">
                                            30.000đ
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="padding_bottom"></div>
                            <div class="detail_item horizontal-line ggg">
                                <div class="detail_item-label Padding10">
                                    <span class="detail_item-label_text">
                                        Tổng
                                    </span>
                                </div>
                                <div class="detail_item-content Padding10 ">
                                    <span class="detail_item-content_text">
                                        70.000đ
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid__row">
                <div class="grid__full-width btn_back-wrap">
                    <div class="btn_back">
                        Quay lại
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
    document.querySelector(".btn_back").addEventListener("click",()=>{
        window.location.href = "index.php?pages=history_ticket.php";
    });
</script>