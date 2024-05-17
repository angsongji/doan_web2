<?php


if(isset($_GET['page'])){
    echo '<form id="searchadmin" name="'.$_GET['page'].'" action="./pages/searchadmin.php" method="POST" onsubmit="searchAdmin();">';
    switch($_GET['page']){
        case "lichchieuphimadmin":
            createSearchDateTime();
            break;
        case "moviesadmin":
            createSearchInputField();
            createSearchCategory();
            createSearchDateTime();
            break;
    }
    echo ' <button class="btn_search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
 <button class="btn_reset" type="reset">RESET</button>';
echo '</form>';
}else{

    if(isset($_POST['valueName']))  $name=$_POST['valueName'];
    if(isset($_POST['start_date'])) $startDate=$_POST['start_date'];
    if(isset($_POST['end_date']))   $endDate=$_POST['end_date'];
    if(isset($_POST['valueTheloai'])) $theloai=$_POST['valueTheloai'];
    $page = $_POST['chucnang'];
    switch($page){
        case "lichchieuphimadmin";
        // header('Location: ../pages/'.$page.'.php');
            header('Location: ../pages/'.$page.'.php?start_date='.urlencode($startDate).'&end_date='.urlencode($end_date));
            exit;
            break;
        case "moviesadmin":
            // header('Location: ../pages/'.$page.'.php');
            header('Location: ../pages/'.$page.'.php?start_date='.urlencode($startDate).'&end_date='.urlencode($end_date).'&valueName='.$name.'&valueTheloai='.$theloai);
            exit;
            break;
    }
    
}

    


function createSearchInputField()
{
    echo '<input type="text" placeholder="Tìm phim theo tên" id="searchName" name="valueName">';
}
function createSearchDateTime()
{
    $startDay="";
    $endDay="";
    echo '
        <span id="searchDateRange">
            <input type="date" name="start_date" value="'.$startDay.'">
            <span>đến</span>
            <input type="date" name="end_date" value="'. $endDay.'">
        </span>
        ';
}

function createSearchCategory(){
    $listTheloai = getListFullTL();
    echo  '<select id="searchCategory" name="valueTheloai">';
    echo '<option selected value="">Tất cả</option>';
    foreach($listTheloai as $theloai){
        echo ' <option value="'.$theloai['MATHELOAI'].'">'.$theloai['TENTHELOAI'].'</option>';
    }
    echo '</select>';   
}
function getListFullTL(){
    $theloaiofphim = array();
    require_once('./database/connectDatabase.php');
    $connection = new connectDatabase();

    // Thực hiện truy vấn (ví dụ)
    $query = "SELECT  MATHELOAI,TENTHELOAI FROM theloai"; // Truy vấn SQL của bạn
    $result = $connection->executeQuery($query);

    // Xử lý kết quả nếu cần
    if ($result) {
        // Thực hiện các thao tác với kết quả
        while ($row = $result->fetch_assoc()) {
            $theloaiofphim[] = $row;
        }
    } else {
        echo 'thất bại';
        return null;
        // Xử lý khi truy vấn thất bại
    }
    return $theloaiofphim;
}
?>