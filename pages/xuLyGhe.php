<?php
// Kết nối CSDL
require_once('../database/connectDatabase.php');
$conn = new connectDatabase();

if(isset($_POST['maPhongChieu'])) {
    $maPhongChieu = $_POST['maPhongChieu'];

    $query = "SELECT * FROM ghe WHERE MAPHONGCHIEU = '$maPhongChieu' ORDER BY HANGGHE, STT";
    $result = $conn->executeQuery($query);

    if(mysqli_num_rows($result) > 0) {
        $html = '<h2>Màn Hình</h2>';
        $html .= '<div class="seat-map" style="display: flex; flex-wrap: wrap;">';

        $currentRow = '';

        while ($row = mysqli_fetch_assoc($result)) {
            $hangGhe = $row['HANGGHE'];
            $trangThai = $row['TRANGTHAI'];
            $stt = $row['STT'];
            $backgroundColor = ($trangThai == '1') ? 'green' : 'red'; 
            
            if ($currentRow !== $hangGhe) {
                if ($currentRow !== '') {
                    $html .= '</div>'; 
                }
                $html .= '<div class="seat-row" style="display: flex; flex-wrap: nowrap;">'; 
                $currentRow = $hangGhe;
            }

            $html .= '<div class="seat" style="background-color: ' . $backgroundColor . '; width: 2em; height: 2em; margin: 0.5em; display: flex; justify-content: center; align-items: center;">' . $hangGhe . $stt . '</div>';
        }
        $html .= '</div>';
        
        echo $html;
    } else {
        echo "<p>Không có dữ liệu ghế cho phòng chiếu này.</p>";
    }
} else {
    echo "<p>Không có mã phòng chiếu được gửi.</p>";
}
?>
