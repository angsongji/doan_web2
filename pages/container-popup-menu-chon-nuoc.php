<?php
    $connect = new connectDatabase("localhost", "root", "", "cinema");
    $dichVuSql = "SELECT * FROM dichvu";
    $dichVuQuery = $connect->executeQuery($dichVuSql);

    $dichVuSql1 = "SELECT * FROM dichvu";
    $dichVuQuery1 = $connect->executeQuery($dichVuSql1);
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
                <strong><div class="ten-dich-vu"><?php echo $dichVuRow['TENDICHVU']; ?></div></strong>

                <div class="mo-ta-dich-vu"><?php echo $dichVuRow['MOTA']; ?></div>

                <div class="gia-dich-vu"  
                    name="<?php echo $dichVuRow['MADICHVU']; ?>">
                    <?php echo $dichVuRow['PRICE']; ?>
                </div>

                <div class="so-luong-dich-vu">
                    <button class="btn-tru" name="<?php echo $dichVuRow['MADICHVU']; ?>">-</button>
                    <label class="so-luong-label" name="<?php echo $dichVuRow['MADICHVU']; ?>">0</label>
                    <button class="btn-cong" name="<?php echo $dichVuRow['MADICHVU']; ?>">+</button>
                </div>
            </div>
        </div>
        <?php
            } 
        ?>
    </div>

    <div id="tong-tien-bap-nuoc">
        <div>
            <span>Tổng cộng</span>
            <span id="tong-cong">0</span>
        </div>

        <h4>Tiếp tục</h4>
    </div>
</div>

<!-- Xử lý sự kiện chọn dịch vụ -->
<script>
const btnTrus = document.querySelectorAll('.btn-tru');
const btnCongs = document.querySelectorAll('.btn-cong');
let soLuongs = document.querySelectorAll('.so-luong-label');
const giaDichVus = document.querySelectorAll('.gia-dich-vu');
const tongCongs = document.querySelector('#tong-cong');

const tangSoLuong = (event) => {
    for( let i = 0; i < soLuongs.length; i++) {
        if(event.getAttribute('name') == soLuongs[i].getAttribute('name')) {

            let soLuongStr = soLuongs[i].textContent.trim();
            let soLuong = isNaN(soLuongStr) ? 0 : parseInt(soLuongStr); 
            ++soLuong; 
            
            let giaDichVuStr = giaDichVus[i].textContent.trim();
            let giaDichVu = isNaN(giaDichVuStr) ? 0 : parseInt(giaDichVuStr);
            
            let tongCongStr = tongCongs.textContent.trim();
            let tongCong = isNaN(tongCongStr) ? 0 : parseInt(tongCongStr);
            tongCong += giaDichVu; 
            
            soLuongs[i].textContent = soLuong.toString();
            tongCongs.textContent = tongCong.toString();
        }
    }
}

let flag = true;
const giamSoLuong = (event) => {
    for( let i = 0; i < soLuongs.length; i++) {
        if(event.getAttribute('name') == soLuongs[i].getAttribute('name')) {
            let soLuongStr = soLuongs[i].textContent.trim(); // Lấy giá trị và loại bỏ khoảng trắng thừa
            let soLuong = isNaN(soLuongStr) ? 0 : parseInt(soLuongStr); // Chuyển đổi thành số, nếu không thành công sẽ trả về 0
            if(soLuong > 0) {
                --soLuong;
                flag = true;
            }
            soLuongs[i].textContent = soLuong.toString();

            let giaDichVuStr = giaDichVus[i].textContent.trim();
            let giaDichVu = isNaN(giaDichVuStr) ? 0 : parseInt(giaDichVuStr);
            
            let tongCongStr = tongCongs.textContent.trim();
            let tongCong = isNaN(tongCongStr) ? 0 : parseInt(tongCongStr);

            if(soLuong > 0) {
                tongCong -= giaDichVu;
            }
            if(soLuong == 0 && flag == true) {
                tongCong -= giaDichVu; 
                flag = false;
            }

            soLuongs[i].textContent = soLuong.toString();
            tongCongs.textContent = tongCong.toString();
        }
    }
}

for(let i = 0; i < btnCongs.length ; i++) {
    btnCongs[i].addEventListener(
        'click',
        () => tangSoLuong(btnCongs[i]),
        false
    );

    btnTrus[i].addEventListener(
        'click',
        () => giamSoLuong(btnTrus[i]),
        false
    );
}
</script>