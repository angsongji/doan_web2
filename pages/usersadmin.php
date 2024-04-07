<?php
echo '<div id="users_wrap">
                        <div class="user userheader">
                            <span class="user_id">STT</span>
                            <span class="user_email">EMAIL</span>
                            <span class="user_name">HỌ TÊN</span>
                            <span class="user_status">TÌNH TRẠNG</span>
                        </div>
                        <div id="usercontent">
                            <div class="user">
                                <span class="user_id">1</span>
                                <span class="user_email">nguyenvana2134@gmail.com</span>
                                <span class="user_name">Tui tên A</span>
                                <span class="user_status">
                                    <label for="userStatus">Khóa</label>
                                    <input type="checkbox" name="userStatus">
                                </span>
                                <i class="fa-solid fa-pen-to-square fa-fw"></i>
                            </div>
                            <div class="user">
                                <span class="user_id">1</span>
                                <span class="user_email">nguyenvana2134@gmail.com</span>
                                <span class="user_name">Tui tên A</span>
                                <span class="user_status">
                                    <label for="userStatus">Khóa</label>
                                    <input type="checkbox" name="userStatus">
                                </span>
                                <i class="fa-solid fa-pen-to-square fa-fw"></i>
                            </div>
                        </div>
        </div>';
        //ket noi database
        /*echo '<div id="users_wrap">
                        <div class="user userheader">
                            <span class="user_id">STT</span>
                            <span class="user_email">EMAIL</span>
                            <span class="user_name">HỌ TÊN</span>
                            <span class="user_status">TÌNH TRẠNG</span>
                        </div>
                        <div id="usercontent">';
//include('database/connectDatabase.php');
$servername = "localhost"; // Tên máy chủ cơ sở dữ liệu
$username = "root"; // Tên người dùng cơ sở dữ liệu
$password = "Oanh2004!"; // Mật khẩu của người dùng cơ sở dữ liệu
$database = "qlba"; // Tên cơ sở dữ liệu
$connection = new connectDatabase($servername, $username, $password, $database);

$query = "SELECT * FROM nhanvien"; // Truy vấn SQL của bạn
$result = $connection->executeQuery($query);
if ($result) {
    // Thực hiện các thao tác với kết quả
    while ($row = $result->fetch_assoc()) {
        echo'<div class="user">
                                <span class="user_id">'.$row['MANV'].'</span>
                                <span class="user_email">'.$row['CHUCVU'].'</span>
                                <span class="user_name">'.$row['TENNV'].'</span>
                                <span class="user_status">
                                    <label for="userStatus">Khóa</label>
                                    <input type="checkbox" name="userStatus">
                                </span>
                                <i class="fa-solid fa-pen-to-square fa-fw"></i>
                            </div>';
    }
}
$connection->disconnect();
                        echo'</div>
        </div>'; */
?>