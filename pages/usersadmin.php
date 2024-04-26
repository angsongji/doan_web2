<?php
//ket noi database
echo '<div id="users_wrap">
<div class="user userheader">
    <span class="user_date">THỜI GIAN TẠO TK</span>
    <span class="user_username">USERNAME</span>
    <span class="user_email">EMAIL</span>
    <span class="user_name">HỌ TÊN</span>
    <span class="user_maquyen">MÃ QUYỀN</span>
    <span class="user_status">TRẠNG THÁI</span>
</div>
<div id="usercontent">';
$connection = new connectDatabase();

$query = "SELECT * FROM taikhoan"; // Truy vấn SQL của bạn
$result = $connection->executeQuery($query);
if ($result) {
// Thực hiện các thao tác với kết quả
while ($row = $result->fetch_assoc()) {
echo'<div class="user">
        <span class="user_date">'.$row['NGAYTAOTK'].' '.$row['THOIGIANTAOTK'].'</span>
        <span class="user_username">'.$row['USERNAME'].'</span>
        <span class="user_email">'.$row['EMAIL'].'</span>
        <span class="user_name">'.$row['HOTEN'].'</span>
        <span class="user_maquyen">'.$row['MAQUYEN'].'</span>
        <span class="user_status">
            <label for="userStatus">'.(($row['TRANGTHAI'] == 1)?'Hoạt động':'Bị khóa').'</label>
        </span>
        <i class="fa-solid fa-pen-to-square fa-fw"></i>
    </div>';
}
}
$connection->disconnect();
// <span class="user_status">
//             <label for="userStatus">'.(($row['TRANGTHAI'] == 1)?'Hoạt động':'Bị khóa').'</label>
//             <input type="checkbox" name="userStatus">
//         </span>
echo'</div>
</div>'; 
echo        '<div id="users_wrap_change">
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
        
?>