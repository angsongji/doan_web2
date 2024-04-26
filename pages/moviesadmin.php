<?php
$phim = getListMovie();
echo '<div id="movies" >';
foreach ($phim as $row) {
    echo '<span class="movie" name="' . $row['MAPM'] . '">';
    echo '<img src="./img/' . $row['NAMEANH'] . '">';
    echo '<h4>' . $row['TENPHIM'] . '</h4>';
    $theloai = getListTheloai($row['MAPM']);
    echo '<h5>';
    foreach ($theloai as $t) {
        echo $t['TENTHELOAI']. " ";
    }
    echo '</h5>';
    echo '<span class="age_movie"';
    switch ($row['DOTUOI']) {
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
    echo $row['DOTUOI'] . '+</span>';
    echo '<div class="click_change_infor_movie">Click để chỉnh sửa</div>';
    echo '</span>';
}
echo '</div>';

if (isset($_GET['MAPM'])) {
    echo '<div id="movie_change_infor">';

    echo '<div id="show_infor_movie_old" class="show_change_movie">';
    foreach ($phim as $row) {
        if ($row['MAPM'] == ($_GET['MAPM'])) {
            $theloai = getListTheloai($row['MAPM']);
            echo '<img src="./img/' . $row['NAMEANH'] . '">';
            echo ' <span class="show_infor_movie">';
            echo '<span class="infor_age_movie"';
            switch ($row['DOTUOI']) {
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
            echo $row['DOTUOI'] . '+</span>';
            echo '<h3 style="text-transform:uppercase;">' . $row['TENPHIM'] . '</h3> ';
            echo '<div class="quocgia_movie">' . $row['QUOCGIA'] . '</div>';
            echo '<div class="thoiluong_movie">' . $row['THOILUONG'] . '</div>';
            echo '<div class="noidung_movie">' . $row['MOTA'] . '</div>';
            echo ' <div class="table_day_theloai">';
            echo '<div>Ngày chiếu</div>
                         <div>Thể loại</div>';
            echo '<div class="ngaychieu_movie">' . $row['NGAYCHIEU'] . '</div>';
            echo '<div class="theloai_movie">';
            
            foreach ($theloai as $t) {
                echo $t['TENTHELOAI'] . " ";
            }
            echo '</div>';
            echo '</div>';
            echo ' <a href="' . $row['PATHTRAILER'] . '" class="show_trailer_movie" target="_blank">Click de xem Trailer</a>';
            echo '<div class="click_show_change_movie">
                            <i class="fa-solid fa-trash"></i>
                            <span id="click_show_infor_movie_new" name="show">Chinh sua phim <i class="fa-solid fa-arrow-right"></i><span>
                          </div>';
            echo '</span>';
            echo '</div>';
            echo '<span id="btn_exit"><i class="fa-solid fa-x"></i></span>';
            echo '<form style="padding:0;">';
            echo '<div id="show_infor_movie_new" class="show_change_movie">';
            echo ' <span class="show_infor_movie">';

            echo '<div id="change_picture_movie">
                                <span>Thay đổi ảnh</span>
                                <input type="file" style="margin:8px 0;" name="NAMEANH">
                              </div>';
            echo '<div id="change_dotuoi_movie" class="change_infor_movie">
                                     <span>Độ tuổi</span>
                                     <input type="number" style="margin:8px 0;" placeholder="' . $row['DOTUOI'] . '" name="DOTUOI">
                                </div>';
            echo '<div id="change_name_movie" class="change_infor_movie">
                                     <span>Tên phim</span>
                                     <input type="text" style="margin:8px 0;" placeholder="' . $row['TENPHIM'] . '">
                              </div>';
            echo '
            <div id="change_quocgia_movie" class="change_infor_movie">
            <span>Quốc gia</span>
            <input type="text" style="margin:8px 0;" placeholder="'.$row['QUOCGIA'].'">
            </div>';
            echo '            <div id="change_thoiluong_movie" class="change_infor_movie">
            <span>Thời lượng</span>
            <input type="number" style="margin:8px 0;" placeholder="'.$row['THOILUONG'].'">
            </div>';
            echo '            <div id="change_noidung_movie" class="change_infor_movie">
            <span>Nội dung</span>
            <input type="text" style="margin:8px 0;" placeholder="'.$row['MOTA'].'">
            </div>';
            echo '            <div id="change_ngaychieu_movie" class="change_infor_movie">
            <span>Ngày chiếu</span>
            <input type="date" style="margin:8px 0;" value="'.$row['NGAYCHIEU'].'">
            </div>';
            echo '<div id="change_theloai_movie" class="change_infor_movie">
                         <span>The loai</span>
                         <span id="list_theloai">
                         <div id="click_show_theloai"   name="show" >Click để chọn thể loại</div>
                         <span id="show_list_theloai">';
                         $fulltheloai =getListFullTheloai();
                         foreach ($fulltheloai as $t) {
                            echo '<label for="'.$t['MATHELOAI'].'">
                                                     <input type="checkbox" name="'.$t['MATHELOAI'].'">
                                                     <span>'.$t['TENTHELOAI'].'</span>
                                                 </label>';

                        }
                        echo '</span>
                         </span>
                         </div>';
                        echo '            <div id="change_trailer_movie" class="change_infor_movie">
                        <span>Trailer</span>
                        <input type="text" style="margin:8px 0;" placeholder="'.$row['PATHTRAILER'].'">
                        </div>';
                        echo '
                        <div id="btn_wrap_change_user">
                            <button type="reset">Xóa tất cả</button>
                            <button type="submit">Xác nhận</button>
                        </div>';
            echo '</span>';
            echo '</div>';
            echo '</form>';
            echo '</div>';
            break;
        }
    }
}

//     
//     <form>
//     <div id="show_infor_movie_new" class="show_change_movie">
//         <span class="show_infor_movie">





//             <div id="change_theloai_movie" class="change_infor_movie">
//             <span>The loai</span>
//             <span id="click_show_theloai" name="show" >
//                 <div>Click de chon the loai</div>
//                 <span id="show_list_theloai">
//                     <label for="tamly">
//                         <input type="checkbox" name="tamly">
//                         <span>Tam ly</span>
//                     </label>
//                     <label for="tamly">
//                         <input type="checkbox" name="tamly">
//                         <span>Tam ly</span>
//                     </label>
//                     <label for="tamly">
//                         <input type="checkbox" name="tamly">
//                         <span>Tam ly</span>
//                     </label>
//                     <label for="tamly">
//                         <input type="checkbox" name="tamly">
//                         <span>Tam ly</span>
//                     </label>
//                     <label for="tamly">
//                         <input type="checkbox" name="tamly">
//                         <span>Tam ly</span>
//                     </label>
//                 </span>
//             <span>
//             </div>

//         </span>
//     </div>
//     </form>
// 
// ';
function getListMovie()
{
    $phim = array();
    if (isset($_GET['pagecon']) || isset($_GET['MAPM']))
        require_once('../database/connectDatabase.php');
    else
        require_once('./database/connectDatabase.php');
    // Thực hiện kết nối đến cơ sở dữ liệu

    $connection = new connectDatabase();

    // Thực hiện truy vấn (ví dụ)
    $query = "SELECT * FROM phim "; // Truy vấn SQL của bạn
    $result = $connection->executeQuery($query);

    // Xử lý kết quả nếu cần
    if ($result) {
        // Thực hiện các thao tác với kết quả
        while ($row = $result->fetch_assoc()) {
            $phim[] = $row;
        }
    } else {
        echo 'thất bại';
        return null;
        // Xử lý khi truy vấn thất bại
    }
    return $phim;
}
function getListFullTheloai(){
    $theloaiofphim = array();
    require_once('../database/connectDatabase.php');
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
function getListTheloai($MAPM)
{
    $theloaiofphim = array();
    if (isset($_GET['pagecon']) || isset($_GET['MAPM']))
        require_once('../database/connectDatabase.php');
    else
        require_once('./database/connectDatabase.php');
    // Thực hiện kết nối đến cơ sở dữ liệu

    $connection = new connectDatabase();

    // Thực hiện truy vấn (ví dụ)
    $query = "SELECT  theloai.MATHELOAI,TENTHELOAI FROM theloai,chitietphim_theloai WHERE theloai.MATHELOAI = chitietphim_theloai.MATHELOAI AND MAPM='" . $MAPM . "'"; // Truy vấn SQL của bạn
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
