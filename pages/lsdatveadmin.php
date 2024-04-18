<?php 
    echo '<div id="history_ticket_wrap">
    <div class="history_ticket header_history_ticket">
        
            <span>Mã vé</span>
            <span>Mã lịch chiếu</span>
            <span>USERNAME</span>
            <span>Thời gian</span>
            <span>Thành tiền</span>
            <span></span>
        
    </div>
    <div class="content_history_ticket">';
    $lsdatve=getListLichsudatve();
    foreach($lsdatve as $row){
        echo '<div class="history_ticket">';
        echo '<span>'.$row['MAVE'].'</span>';
        echo '<span>'.$row['MALICHCHIEU'].'</span>';
        echo '<span>'.$row['USERNAME'].'</span>';
        echo '<span>
                <span>'.$row['NGAY'].'</span>,
                <span>'.$row['THOIGIAN'].'</span>
            </span>';
        echo '<span>
                <span>'.$row['TONGTIEN'].'</span>
                <i class="fa-solid fa-dong-sign"></i>
            </span>';
        echo '<span style="cursor:pointer;width:10px;"><i class="fa-solid fa-ellipsis-vertical" ></i></span>';
        echo ' </div>';
    }         
    echo '</div>
</div>';

function getListLichsudatve(){
    $lsdatve=array();
    require_once('./database/connectDatabase.php');
// Thực hiện kết nối đến cơ sở dữ liệu

$connection = new connectDatabase();

// Thực hiện truy vấn (ví dụ)
$query = "SELECT * FROM ve "; // Truy vấn SQL của bạn
$result = $connection->executeQuery($query);

// Xử lý kết quả nếu cần
if ($result) {
    // Thực hiện các thao tác với kết quả
    while ($row = $result->fetch_assoc()) {
       $lsdatve[]=$row;
    }
} else {
    echo'thất bại';
    return null;
    // Xử lý khi truy vấn thất bại
}
return $lsdatve;
}
?>