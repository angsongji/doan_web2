


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Thông Tin Phòng Chiếu</title>
</head>
<body>
    <?php
        require_once('../database/connectDatabase.php');
        $conn = new connectDatabase();

        if(isset($_GET['sid'])) {
            $id = $_GET['sid'];
            $edit_sql = "SELECT * FROM phongchieu WHERE MAPHONGCHIEU='$id'";
            $result = $conn->executeQuery($edit_sql);
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
    ?>
        <div id="editForm">
            <h2>Sửa Thông Tin Phòng Chiếu</h2>
            <form method="POST" action="../pages/giaodienphongchieu.php" id="editDataForm">
                <input type="hidden" name="sid" value="<?php echo $id ?>">
                <label for="MAPHONGCHIEU">Mã Phòng Chiếu</label><br>
                <input type="text" id="MAPHONGCHIEU" name="MAPHONGCHIEU" value="<?php echo $row['MAPHONGCHIEU']; ?>"><br>
                <label for="TENPHONGCHIEU">Tên Phòng Chiếu</label><br>
                <input type="text" id="TENPHONGCHIEU" name="TENPHONGCHIEU" value="<?php echo $row['TENPHONGCHIEU']; ?>"><br>
                <label for="SOGHE">Số Ghế</label><br>
                <input type="text" name="SOGHE" id="SOGHE" value="<?php echo $row['SOGHE']; ?>"><br>
                <label for="trangthai">Trạng Thái</label><br>
                <input type="checkbox" id="TRANGTHAI" name="TRANGTHAI" value="<?php echo ($row['TRANGTHAI'] == 1) ? 'checked' : ''; ?>"><br><br>
                <button type="submit" name="submit" onclick="window.location.href='../admin.php?page=phongchieu'">Cập Nhật</button>
                <button type="button" onclick="window.location.href='../admin.php?page=phongchieu'">Hủy</button>
                
            </form>
        </div>
        <?php
        } else {
            echo "Không tìm thấy dữ liệu hoặc có lỗi trong quá trình truy vấn.";
        }
    }
    else if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $editLoaiGhe_sql = "SELECT * FROM loaighe WHERE MALOAIGHE='$id'";
        $result = $conn->executeQuery($editLoaiGhe_sql);
        if($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
        <div id="editForm2">
            <h2>Sửa Thông Tin Loại Ghế</h2>
            <form method="POST" action="../pages/giaodienphongchieu.php" id="editDataForm">
            <input type="hidden" name="id" value="<?php echo $id ?>">
                <label for="MALOAIGHE">Mã Loại Ghế</label><br>
                <input type="text" name="MALOAIGHE" id="MALOAIGHE" value="<?php echo $row['MALOAIGHE']; ?>"><br>
                <label for="TENLOAIGHE">Tên Loại Ghế</label><br>
                <input type="text" name="TENLOAIGHE" id="TENLOAIGHE" value="<?php echo $row['TENLOAIGHE']; ?>"><br>
                <label for="PRICE">Price</label><br>
                <input type="text" name="PRICE" id="PRICE" value="<?php echo $row['PRICE']; ?>"><br>
                <button type="submit" name="submit" onclick="window.location.href='../admin.php?page=phongchieu'">Cập Nhật</button>
                <button type="button" onclick="window.location.href='../admin.php?page=phongchieu'">Hủy</button>
            </form> 
        </div>
        <?php
        } else {
            echo "Không tìm thấy dữ liệu hoặc có lỗi trong quá trình truy vấn.";
        }
    }
?>
</body>
</html>
