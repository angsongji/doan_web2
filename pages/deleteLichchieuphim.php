<?php
$listMLCP=$_POST['listLCP'];
$listMAPCdachon = json_decode($listMLCP, true);
foreach($listMAPCdachon as $row){
    if(checkSuatchieuduocchon($row)){
        echo 'Xóa thất bại! Do đã có vé mua ở suất chiếu của phim này';
        break;
    }
 
}
echo 'Xóa thành công';
function checkSuatchieuduocchon($MALICHCHIEU){
    require_once('../database/connectDatabase.php');
    $connection = new connectDatabase();

    // Thực hiện truy vấn (ví dụ)
    $query = "SELECT 	* FROM ve"; // Truy vấn SQL của bạn
    $result = $connection->executeQuery($query);

    // Xử lý kết quả nếu cần
    if ($result) {
        // Thực hiện các thao tác với kết quả
        while ($row = $result->fetch_assoc()) {
            if ($row['MALICHCHIEU'] === $MALICHCHIEU) 
                return true;
        }
        return false;
    } else {
        echo 'thất bại roi kiaaa';
        return null;
        // Xử lý khi truy vấn thất bại
    }
    
}
?>