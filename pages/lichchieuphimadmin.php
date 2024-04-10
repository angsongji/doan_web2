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
$numberDay= numberDay(date('D'));
$day= (int)date('d');
$month= (int)date('m');
$year= (int)date('y');
echo '<div id="lichchieuphim_wrap">
<div id="lichchieuphim_header">
    <span class="lichchieuphim_header_btn btn_left" style="display:none;"><i class="fa-solid fa-chevron-left" name="btn_left" onclick="changeDay(this)"></i></span>
    <span class="lichchieuphim_header_btn btn_right"><i class="fa-solid fa-chevron-right" name="btn_right" onclick="changeDay(this)"></i></span>
    <nav id="lichchieuphim_daytime"> 
    <ul>';
    for($i=0;$i<19;$i++){
        if($day<=calendar($month,$year)){
            echo'<li';
            if($i==0)
                echo' id="lichchieuphim_selected"';

            echo'><span class="lichchieuphim_day">';
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
</div>
<div id="lichchieuphim_content">
    <div class="lichchieuphim_phim">
        <img src="img/33735630744753025-jWYfucBwXG3ePh97bM5ReT1q65X.jpg">
        <div class="lichchieuphim_right">
            <div class="lichchieuphim_mota_phim">
                <span class="age_movie">13+</span>
                <span class="name_movie"> Ten</span>
                <span class="type_movie">The loai</span>
                
            </div>
            <div class="lichchieuphim_lichchieu_wrap">
                <div class="lichchieuphim_lichchieu">
                    <span class="time_start">9:00</span>
                    <span>~<span>
                    <span class="time_end">14:30</span>
                </div>
                <div class="lichchieuphim_lichchieu">
                    <span class="time_start">9:00</span>
                    <span>~<span>
                    <span class="time_end">14:30</span>
                </div>
                <div class="lichchieuphim_lichchieu add_suatchieu">
                    <i class="fa-solid fa-plus"></i>
                </div>
            </div>
        </div>
        <span class="edit_suatchieu" style="cursor:pointer;"><i class="fa-solid fa-pen-to-square fa-fw"></i></span>
    </div>
    <div class="lichchieuphim_phim">
        <img src="img/33735630744753025-jWYfucBwXG3ePh97bM5ReT1q65X.jpg">
        <div class="lichchieuphim_right">
            <div class="lichchieuphim_mota_phim">
                <span class="age_movie">13+</span>
                <span class="name_movie"> Ten</span>
                <span class="type_movie">The loai</span>
                
            </div>
            <div class="lichchieuphim_lichchieu_wrap">
                <div class="lichchieuphim_lichchieu">
                    <span class="time_start">9:00</span>
                    <span>~<span>
                    <span class="time_end">14:30</span>
                </div>
                <div class="lichchieuphim_lichchieu">
                    <span class="time_start">9:00</span>
                    <span>~<span>
                    <span class="time_end">14:30</span>
                </div>
                <div class="lichchieuphim_lichchieu add_suatchieu">
                    <i class="fa-solid fa-plus"></i>
                </div>
            </div>
        </div>
        <span class="edit_suatchieu"><i class="fa-solid fa-pen-to-square fa-fw"></i></span>
    </div>
    <!--<div id="lichchieuphim_null"><span>Chưa có lịch chiếu vào ngày này</span></div>-->
    <div class="lichchieuphim_phim add_newmovie" >
        <i class="fa-solid fa-plus"></i>
    </div>
</div>
    <div class="lichchieuphim_phim" id="change_lichchieuphim_phim">
        <img src="img/33735630744753025-jWYfucBwXG3ePh97bM5ReT1q65X.jpg">
        <div class="lichchieuphim_right">
            <h3 class="name_movie" style="margin:0;">Ten</h3>
            <div class="lichchieuphim_lichchieu_wrap">
                <div class="lichchieuphim_lichchieu">
                    <span class="time_start">9:00</span>
                    <span>~<span>
                    <span class="time_end">14:30</span>
                </div>
                <div class="lichchieuphim_lichchieu">
                    <span class="time_start">9:00</span>
                    <span>~<span>
                    <span class="time_end">14:30</span>
                </div>
            </div>
            <div id="hide_choose_new_suatchieu">Chọn suất chiếu để chỉnh sửa</div>
            <div id="div_choose_new_suatchieu">
                <span>Bắt đầu</span>
                <span>Kết thúc</span>
                 <div class="lichchieuphim_lichchieu" style="border:0">
                    <span class="time_start">
                        <select>
                            <option>Chọn giờ</option>
                        </select>
                    </span>
                    <span>~<span>
                    <span class="time_end">
                        <select>
                            <option>Chọn phút</option>
                        </select>
                    </span>
                </div>
                <div class="lichchieuphim_lichchieu" style="border:0;cursor:auto;">
                    <span class="time_start">9:00</span>
                    <span>~<span>
                    <span class="time_end">14:30</span>
                </div>
                <div style="display:flex;align-items:center;">
                    <button style="cursor:pointer;width:fit-content;font-size:14px;padding:10px;border-radius:5px;background-color:var(--primary_color);border:0;Color:white;">Xác nhận</button>
                    <i class="fa-solid fa-trash" style="font-size:25px;Color: var(--primary_color);margin-left:25px;cursor:pointer;"></i>
                </div>
            </div>
           
        </div>
        <span class="edit_suatchieu" id="exit_edit_suatchieu" style="cursor:pointer;"><i class="fa-solid fa-x"></i></span>

    </div>
</div>


';

?>