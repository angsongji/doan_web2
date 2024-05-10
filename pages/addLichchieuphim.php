<?php


if(!isset($_GET['selectFilm'])){
    $ngay = $_GET['ngay'];
    $list=getListPhimKhongcoLichchieuvaoNgay($ngay);
echo '
<form action="./pages/addLichchieuphim.php" id="form_addLichchieuphim" method="GET">
    <div id="btn_exit"><i class="fa-solid fa-x"></i></div>
    <h1>Thêm lịch chiếu phim</h1>
    <input type="hidden" name="ngay" value="'. $ngay.'">
    <input type="text" value="'. $ngay.'" disabled>
    <label for="selectFilm">
    Chọn phim
    <select name="selectFilm" id="selectFilm">';
    foreach($list as $row){
        echo '<option value="'.$row['MAPM'].'">'.$row['TENPHIM'].'</option>';
    }
    
    echo '</select>
    </label>
    <input type="submit" value="Xác nhận" id="btn_submit">
</form>';
}else{
    require_once('./lichchieuphimadmin.php');
    echo 'Vao them lich chieu phim';
    $ngay = $_GET['ngay'];
    $MAPM = $_GET['selectFilm'];
    $MASC = createMASC(); // Tạo mã suất chiếu mới
    $MALICHCHIEU=createMALICHCHIEU();
    addSuatchieuInSQL($MASC,$ngay,'');
    addLichchieuphimInSQL($MASC,$MAPM,$MALICHCHIEU,'','');

}



function createMALICHCHIEU(){
    $max =0;
    $listLichchieuphim = getListLichchieuphim();
    foreach($listLichchieuphim as $row){
        $MALICHCHIEUlast = $row['MALICHCHIEU'];
        $so = preg_replace("/[^0-9]/", "", $MALICHCHIEUlast);
        $stt = (int)$so;
        if($stt > $max) $max = $stt;
    }
    return "LC".($max+1);
}

function createMASC(){
    $max =0;
    $listLichchieuphim = getListSuatchieu();
    foreach($listLichchieuphim as $row){
        $MASClast = $row['MASC'];
        $so = preg_replace("/[^0-9]/", "", $MASClast);
        $stt = (int)$so;
        if($stt > $max) $max = $stt;
    }
    return "SC".($max+1);
}

function addSuatchieuInSQL($MASC,$ngay,$THOIGIANBATDAU){
    echo 'Vao them suat chieu';
    require_once('../database/connectDatabase.php');
    $connection = new connectDatabase();
    // Thực hiện truy vấn (ví dụ)
    
    $query = "INSERT INTO suatchieu(MASC, NGAY, THOIGIANBATDAU) VALUES ('$MASC', '$ngay', '$THOIGIANBATDAU');"; // Truy vấn SQL của bạn
    $result = $connection->executeQuery($query);
    
}
    
function addLichchieuphimInSQL($MASC,$MAPM,$MALICHCHIEU,$MAPHONGCHIEU,$THOIGIANKETTHUC){
    echo 'Vao them lich chieu phim';
    require_once('../database/connectDatabase.php');
    $connection = new connectDatabase();
    // Thực hiện truy vấn (ví dụ)
   
    $query = "INSERT INTO lichchieuphim(MAPM,MASC, MAPHONGCHIEU,MALICHCHIEU,THOIGIANKETTHUC) VALUES ('$MAPM','$MASC','$MAPHONGCHIEU','$MALICHCHIEU', '$THOIGIANKETTHUC');"; // Truy vấn SQL của bạn
    $result = $connection->executeQuery($query);
}

function getListPhimKhongcoLichchieuvaoNgay($ngay){
    
    require_once('../database/connectDatabase.php');
    //lay ra cac maphim va tenphim trong bảng phim
    $list = array();  
    $connection = new connectDatabase();
    // Thực hiện truy vấn (ví dụ)
    $query = "SElECT MAPM,TENPHIM
    FROM phim
    WHERE MAPM NOT IN (
        SELECT MAPM
        FROM suatchieu,lichchieuphim
        WHERE NGAY='".$ngay."' AND suatchieu.MASC = lichchieuphim.MASC
    )"; // Truy vấn SQL của bạn
    $result = $connection->executeQuery($query);

    // Xử lý kết quả nếu cần
    if ($result) {
        // Thực hiện các thao tác với kết quả
        while ($row = $result->fetch_assoc()) {
            if ($row === null) {
                return null;
            }
            $list[]=$row;
        }
    } else {
        echo 'thất bại lay full phim khong co lich chieu vao ngay '.$ngay;
        return null;
        // Xử lý khi truy vấn thất bại
    }
return $list;
}

?>