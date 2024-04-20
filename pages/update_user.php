<form action="index.php?pages=contentUser.php" name="formInformationUser" method="POST">
        <div class="right-side__tittle">
            <h1>Cập nhật thông tin</h1>
        </div>
        <div class="right-side__wrapper">
            <div class="right-info__item">
                <label class="right-info__item-name">Tên tài khoản</label>
                <input type="text" class="right-info__item-input readonly" name="UserName" readonly>
            </div>
            <div class="right-info__item">
                <label for="Tên của bạn" class="right-info__item-name">Tên của bạn</label>
                <input type="text" class="right-info__item-input" id="Tên của bạn" name="HoTen">
            </div>
            <div class="right-info__item">
                <label for="Địa chỉ email" class="right-info__item-name">Địa chỉ email</label>
                <input type="text" class="right-info__item-input" id="Địa chỉ email" name="Email">
            </div>
        </div>
        <div class="btn__update-wrap">
            <input type="submit" value="Cập nhật" class="btn__update" name="btn_update">
        </div>
</form>

<?php 
$tenDN ="";
if(isset($_SESSION['TenDN'])){
    $tenDN = $_SESSION['TenDN'];
    
}
        require_once('./database/connectDatabase.php');
        $conn = new connectDatabase();

        if(isset($_POST['btn_update'])){
            $inputHoTen = $_POST['HoTen'];
            $inputEmail = $_POST['Email'];
            $sqlUpdate = "UPDATE taikhoan SET EMAIL = '$inputEmail', HOTEN = '$inputHoTen' WHERE USERNAME ='$tenDN'";
            $resultUpdate = $conn->executeQuery($sqlUpdate);
        }

        $sqlDN = "SELECT HOTEN, EMAIL FROM taikhoan WHERE USERNAME = '$tenDN' ";
        $result = $conn->executeQuery($sqlDN);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hoTenSQL = $row["HOTEN"];
            $emailSQL = $row["EMAIL"];
            echo "<script>formInformationUser.UserName.value ='$tenDN';</script>";
            echo "<script>formInformationUser.HoTen.value ='$hoTenSQL';</script>";
            echo "<script>formInformationUser.Email.value ='$emailSQL';</script>";
        } else {
            echo "Không có dữ liệu trong bảng.";
        }

        
        
        $conn->disconnect(); 
?>