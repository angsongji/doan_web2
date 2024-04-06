<?php
include "database/connectDatabase.php";
echo '<div id="users_wrap">
                        <div class="user userheader">
                            <span class="user_id">STT</span>
                            <span class="user_email">EMAIL</span>
                            <span class="user_name">HỌ TÊN</span>
                            <span class="user_status">TÌNH TRẠNG</span>
                        </div>';
                        
                        $servername = "localhost";
                        $username = "root";
                        $password = "Oanh2004!";
                        $dbname = "dangkykhachhang";
                        //$timkiem=$_POST['search'];
                        // Tạo kết nối
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        
                        // Kiểm tra kết nối
                        if ($conn->connect_error) {
                            die("Kết nối thất bại: " . $conn->connect_error);
                        }
                        
                        // Truy vấn dữ liệu từ bảng
                        $sql = "SELECT * FROM khachhang";
                        $result = $conn->query($sql);        
//$conn = new connectDatabase("localhost","root","Oanh2004!","dangkykhachhang");
//$Querry="SELECT * FROM khachhang";
//$result=$conn->$conn->query($Querry);
//$conn->disconnect();
if ($result->num_rows > 0) {
    echo '<div id="usercontent">';
    while($row = $result->fetch_assoc()) {
        echo '<div class="user">';
        echo '<span class="user_id">'. $row["MAKH"].'</span>';
        echo '<span class="user_email">'. $row["EMAIL"].'</span>';
        echo '<span class="user_name">'. $row["HOTEN"].'</span>';
        echo '<span class="user_status">
                <label for="userStatus">Khóa</label>
                <input type="checkbox" name="userStatus">
              </span>';
        echo '<i class="fa-solid fa-pen-to-square fa-fw"></i>
    </div>';
    }
    echo  '</div>';
}
echo '</div>';
                            