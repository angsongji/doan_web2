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
        </div>
        <div id="users_wrap_change">
            <div id="old_user" >
                <h4 class="change_usser_title">Thông tin hiện tại</h4>
                <div class="showInfor">
                    <div class="mota_Infor">
                        <div>MATK</div>
                        <div>Ho ten</div>
                        <div>Email</div>
                        <div>Tinh trang tai khoan</div>
                    </div>
                    <div class="mota_Infor" id="value_Infor_Old">
                        <div>KHAVJS0029</div>
                        <div>Oanh Leee hehehe</div>
                        <div>hoichima32111@gmail.com</div>
                        <div>Dang hoat dong</div>
                    </div>
                </div>
            </div>
            <div id="new_user" >
                <h4 class="change_usser_title">Thông tin mới</h4>
                <form style="width:100%;">
                <div  class="showInfor">
                    <div class="mota_Infor">
                        <div>MATK</div>
                        <div>Ho ten</div>
                        <div>Email</div>
                    </div>
                    <div class="mota_Infor" id="value_Infor">
                        <div>KHAVJS0029</div>
                        <input type="text" placeholder="Nhập giá trị mới">
                        <input type="text" placeholder="Nhập giá trị mới"></div>
                </div>
                <div id="btn_wrap_change_user">
                    <button type="reset">Xóa tất cả</button>
                    <button type="submit">Xác nhận</button>
                </div>
                </form>
            </div>
        
            <span id="btn_exit"><i class="fa-solid fa-x"></i></span>
            </div>
        ';
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