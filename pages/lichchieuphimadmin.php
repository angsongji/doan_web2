<?php 
function leapyear($year){
    if($year%4==0){
        if($year%100!=0) return true;
        else if($year%400==0) return true;
    }
    return false;
}
function calendar($month,$year){
    switch($month){
        case 1:
        case 3: 
        case 5:   
        case 7:
        case 8:
        case 10:
        case 12:
            return 31;
            break;
        case 2:
            if(leapyear($year)) return 29;
            else return 28;
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            return 30;
            break;
    }
}

function nameDayVietnamese($num){
    switch($num){
        case 2:
            return "Thứ 2";
            break;
        case 3:
            return "Thứ 3";
            break;   
        case 4:
            return "Thứ 4";
            break; 
        case 5:
            return "Thứ 5";
            break;
        case 6:
            return "Thứ 6";
            break;   
        case 7:
            return "Thứ 7";
            break; 
        case 8:
            return "Chủ nhật";
            break;
    }
}
function numberDay($day){
    switch($day){
        case "Mon":
            return 2;
            break;
        case "Tue":
            return 3;
            break;
        case "Wed":
            return 4;
            break;
        case "Thu":
            return 5;
            break;
        case "Fri":
            return 6;
            break;
        case "Sat":
            return 7;
            break;
        case "Sun":
            return 8;
            break;
        
    }
}
date_default_timezone_set('Asia/Ho_Chi_Minh');
$numberDay= numberDay(date('D'));
$day= (int)date('d');
$month= (int)date('m');
$year= (int)date('Y');
echo '<div id="lichchieuphim_wrap">
<div id="lichchieuphim_header">
    <span class="lichchieuphim_header_btn btn_left" style="display:none;"><i class="fa-solid fa-chevron-left" name="btn_left" onclick="changeDay(this)"></i></span>
    <span class="lichchieuphim_header_btn btn_right"><i class="fa-solid fa-chevron-right" name="btn_right" onclick="changeDay(this)"></i></span>
    <nav id="lichchieuphim_daytime"> 
    <ul>';
    // (isset($_GET['day'])<=calendar($month,$year))?isset($_GET['day']):$day
    for($i=0;$i<19;$i++){
        if($day<=calendar($month,$year)){
            echo'<li class="btn_changeDayLichchieuphim" ';
            if(isset($_GET['day'])){
                $arr_dayCurrent = explode("/", $_GET['day']);
                if($arr_dayCurrent[2]>calendar($month-1,$year))  $_GET['day'] = $year.'/'.$month.'/1';
                if($year.'/'.$month.'/'.$day ==  $_GET['day'])
                    echo' id="lichchieuphim_selected"';

            }
            else if($i==0)
                echo' id="lichchieuphim_selected"';


            
              
            echo' name="'.$year.'/'.$month.'/'.$day.'"><span class="lichchieuphim_day">';
            echo $day++;
            if($month!= (int)date('m')) echo '/'.$month;
            echo '</span><span class="lichchieuphim_mota">';
            if($i==0) echo 'Hôm nay';
            else      echo nameDayVietnamese($numberDay);
            if(++$numberDay==9) $numberDay=2;
            echo '</span></li>';
        }
        else {
            if($year==12) $year++;
            $month++;
            $day=1;
            
        }
        
        
        
                
    }
echo'</ul>
    </nav>
</div>';
// echo '<div id="add_phim_lichchieuphim" name="'.$day.'">Thêm phim<i class="fa-solid fa-plus"></i></div>';
$listPhimtheongay;
$dayChange;
if(isset($_GET['day'])){

    
    $dayChange = $_GET['day'];
}
    
else 
    $dayChange = date('Y/m/d');
$listPhimtheongay = getListChitietPhimtheoNgay($dayChange);

echo '<div id="lichchieuphim_content">';
    if($listPhimtheongay == null)
        echo '<div id="lichchieuphim_null"><span>Chưa có lịch chiếu vào ngày này</span></div>';
    else{
        foreach($listPhimtheongay as $phim){
    echo '<div class="lichchieuphim_phim">';
       
           
            echo '<img src="./img/'.$phim['NAMEANH'].'">';
            echo '<div class="lichchieuphim_right">';
                    echo '  <div class="lichchieuphim_mota_phim">
                                <span class="age_movie"';
                                switch ($phim['DOTUOI']) {
                                    case 0:
                                        echo ' style="background-color: blue;">';
                                        break;
                                    case 13:
                                        echo ' style="background-color: #ddbc3f;">';
                                        break;
                                    case 16:
                                        echo ' style="background-color: #e88021;">';
                                        break;
                                    case 18:
                                        echo ' style="background-color: red;">';
                                        break;
                                }
                                echo $phim['DOTUOI'].'+</span>';
                                echo '<span class="name_movie">'.$phim['TENPHIM'].'</span>
                                <span class="thoiluong_movie">'.$phim['THOILUONG'].'</span>
                            </div>';
                            
                    $phimvasuatchieu = listPhimvaSuatchieucuaphimtheoMAPM($phim['MAPM'],$dayChange);
                    echo '  <div class="lichchieuphim_lichchieu_wrap">';
                        foreach($phimvasuatchieu as $row){
                            echo '  <div class="lichchieuphim_lichchieu" name="'.$row['MALICHCHIEU'].'">
                                        <span class="time_start">'.$row['THOIGIANBATDAU'].'</span>
                                        <span>~<span>
                                        <span class="time_end">'.$row['THOIGIANKETTHUC'].'</span>
                                        <span class="phongchieuSuatchieu"> '.$row['MAPHONGCHIEU'].'</span>
                                    </div>';
                        }    
                    echo '</div>';
            echo ' </div>';
            echo ' <span class="edit_suatchieu" name="'.$phim['MAPM'].'"><i class="fa-solid fa-pen-to-square fa-fw"></i></span>';
            
            echo '</div>';
        }
    
    }
echo '</div>';

//     <div class="lichchieuphim_phim">
//         <img src="img/33735630744753025-jWYfucBwXG3ePh97bM5ReT1q65X.jpg">
//         <div class="lichchieuphim_right">
//             <div class="lichchieuphim_mota_phim">
//                 <span class="age_movie">13+</span>
//                 <span class="name_movie"> Ten</span>
//                 <span class="type_movie">The loai</span>
                
//             </div>
//             <div class="lichchieuphim_lichchieu_wrap">
//                 <div class="lichchieuphim_lichchieu">
//                     <span class="time_start">9:00</span>
//                     <span>~<span>
//                     <span class="time_end">14:30</span>
//                 </div>
//                 <div class="lichchieuphim_lichchieu">
//                     <span class="time_start">9:00</span>
//                     <span>~<span>
//                     <span class="time_end">14:30</span>
//                 </div>
//                 <div class="lichchieuphim_lichchieu add_suatchieu">
//                     <i class="fa-solid fa-plus"></i>
//                 </div>
//             </div>
//         </div>
//         <span class="edit_suatchieu"><i class="fa-solid fa-pen-to-square fa-fw"></i></span>
//     </div>
//     // <!--<div id="lichchieuphim_null"><span>Chưa có lịch chiếu vào ngày này</span></div>-->
    
// </div>
//     <div class="lichchieuphim_phim" id="change_lichchieuphim_phim">
//         <img src="img/33735630744753025-jWYfucBwXG3ePh97bM5ReT1q65X.jpg">
//         <div class="lichchieuphim_right">
//             <h3 class="name_movie" style="margin:0;">Ten</h3>
//             <div class="lichchieuphim_lichchieu_wrap">
//                 <div class="lichchieuphim_lichchieu">
//                     <span class="time_start">9:00</span>
//                     <span>~<span>
//                     <span class="time_end">14:30</span>
//                 </div>
//                 <div class="lichchieuphim_lichchieu">
//                     <span class="time_start">9:00</span>
//                     <span>~<span>
//                     <span class="time_end">14:30</span>
//                 </div>
//             </div>
//             <div id="hide_choose_new_suatchieu">Chọn suất chiếu để chỉnh sửa</div>
//             <div id="div_choose_new_suatchieu">
//                 <span>Bắt đầu</span>
//                 <span>Kết thúc</span>
//                  <div class="lichchieuphim_lichchieu" style="border:0">
//                     <span class="time_start">
//                         <select>
//                             <option>Chọn giờ</option>
//                         </select>
//                     </span>
//                     <span>~<span>
//                     <span class="time_end">
//                         <select>
//                             <option>Chọn phút</option>
//                         </select>
//                     </span>
//                 </div>
//                 <div class="lichchieuphim_lichchieu" style="border:0;cursor:auto;">
//                     <span class="time_start">9:00</span>
//                     <span>~<span>
//                     <span class="time_end">14:30</span>
//                 </div>
//                 <div style="display:flex;align-items:center;">
//                     <button style="cursor:pointer;width:fit-content;font-size:14px;padding:10px;border-radius:5px;background-color:var(--primary_color);border:0;Color:white;">Xác nhận</button>
//                     <i class="fa-solid fa-trash" style="font-size:25px;Color: var(--primary_color);margin-left:25px;cursor:pointer;"></i>
//                 </div>
//             </div>
           
//         </div>
//         <span class="edit_suatchieu" id="exit_edit_suatchieu" style="cursor:pointer;"><i class="fa-solid fa-x"></i></span>

//     </div>
// </div>


// ';
function getListChitietPhimtheoNgay($ngay){
    $list = array();
    if (isset($_GET['pagecon']) || isset($_GET['day']))
        require_once('../database/connectDatabase.php');
    else
        require_once('./database/connectDatabase.php');
        $connection = new connectDatabase();

        // Thực hiện truy vấn (ví dụ)
        $query = "SELECT 	phim.MAPM,TENPHIM,DOTUOI,THOILUONG,NAMEANH FROM lichchieuphim,suatchieu,phim WHERE NGAY= '".$ngay."' AND  suatchieu.MASC = lichchieuphim.MASC AND lichchieuphim.MAPM = phim.MAPM GROUP BY phim.MAPM,TENPHIM,DOTUOI,THOILUONG,NAMEANH;"; // Truy vấn SQL của bạn
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
            echo 'thất bại roi kiaaa';
            return null;
            // Xử lý khi truy vấn thất bại
        }
    return $list;

}
function listPhimvaSuatchieucuaphimtheoMAPM($maphim,$ngay){

    $table = array();
    if (isset($_GET['pagecon']) || isset($_GET['day']))
        require_once('../database/connectDatabase.php');
    else
        require_once('./database/connectDatabase.php');
        $connection = new connectDatabase();

        // Thực hiện truy vấn (ví dụ)
        $query = "select * FROM suatchieu,lichchieuphim WHERE suatchieu.MASC = lichchieuphim.MASC AND MAPM='".$maphim."' AND NGAY='".$ngay."'"; // Truy vấn SQL của bạn
        $result = $connection->executeQuery($query);
    
        // Xử lý kết quả nếu cần
        if ($result) {
            // Thực hiện các thao tác với kết quả
            while ($row = $result->fetch_assoc()) {
                $table[] = $row;
            }
        } else {
            echo 'thất bại';
            return null;
            // Xử lý khi truy vấn thất bại
        }
    return  $table;
}

function getListSuatchieuCuaPhim($MAPM,$listLichchieu){
    $list= array();
    foreach($listLichchieu as $row){
        if($row['MAPM'] == $MAPM){
            $list[]=$row;
        }
    }
    return $list;
}
?>