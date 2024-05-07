<?php 
    require_once("../database/connectDatabase.php");
    $conn = new connectDatabase();

    $data1 = array();
    $data2 = array();
    

    if(isset($_GET['type'])) {
        if ($_GET['type'] == 'thongketong') {
            if(isset($_GET['from_date']) && isset($_GET['to_date'])) {
                $from_date = $_GET['from_date'];
                $to_date = $_GET['to_date'];
            
                // Chuyển định dạng ngày thành yyyy-mm-dd
                $from_date = date('Y-m-d', strtotime($from_date));
                $to_date = date('Y-m-d', strtotime($to_date));
            
                $sql = "SELECT NGAY, TONGVE, TONGDOANHTHU FROM thongke WHERE NGAY BETWEEN '$from_date' AND '$to_date'"; 
            } else {
                $sql = "SELECT NGAY, TONGVE, TONGDOANHTHU FROM thongke";
            }
            
            $result1 =  $conn->executeQuery($sql);
            if ($result1->num_rows > 0) {
                while ($row = $result1->fetch_assoc()) {
                    $data1[] = array("label"=> $row["NGAY"], "y"=> $row["TONGVE"]);
                    $data2[] = array("label"=> $row["NGAY"], "y"=> $row["TONGDOANHTHU"]);
                }
            }
        }
        elseif ($_GET['type'] == 'thongketheophim') {
            if(isset($_GET['from_date']) && isset($_GET['to_date'])) {
                $from_date = $_GET['from_date'];
                $to_date = $_GET['to_date'];
                $from_date = date('Y-m-d', strtotime($from_date));
                $to_date = date('Y-m-d', strtotime($to_date));
    
                $sql = "SELECT p.TENPHIM, k.TONGVE, k.TONGDOANHTHU FROM phim p JOIN chitietthongke k ON k.MAPM = p.MAPM  WHERE k.NGAY BETWEEN '$from_date' AND '$to_date'";
            } else {
                $sql = "SELECT p.TENPHIM, k.TONGVE, k.TONGDOANHTHU FROM phim p JOIN chitietthongke k ON k.MAPM = p.MAPM";
            }
            
            $result2 =  $conn->executeQuery($sql);
            if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_assoc()) {
                    $data1[] = array("label"=> $row["TENPHIM"], "y"=> $row["TONGVE"]);
                    $data2[] = array("label"=> $row["TENPHIM"], "y"=> $row["TONGDOANHTHU"]);
                }
            }
        }elseif($_GET['type'] == 'theloai'){
            $sql = "SELECT theloai.TENTHELOAI, 
                           SUM(chitietthongke.TONGDOANHTHU) AS TONGDOANHTHU, 
                           SUM(chitietthongke.TONGVE) AS TONGVE 
                    FROM theloai 
                    JOIN chitietphim_theloai ON theloai.MATHELOAI = chitietphim_theloai.MATHELOAI 
                    JOIN chitietthongke ON chitietphim_theloai.MAPM = chitietthongke.MAPM 
                    GROUP BY theloai.MATHELOAI, theloai.TENTHELOAI";
        
            $result3 = $conn->executeQuery($sql);
            if($result3->num_rows > 0){
                while ($row = $result3->fetch_assoc()) {
                    $data1[] = array("label"=> $row["TENTHELOAI"], "y"=> $row["TONGVE"]);
                    $data2[] = array("label"=> $row["TENTHELOAI"], "y"=> $row["TONGDOANHTHU"]);
                }
            }
        }elseif($_GET['type'] == 'vebanchay'){
            $sql = "SELECT p.TENPHIM, 
            SUM(t.TONGVE) AS TONGVE 
     FROM phim p 
     JOIN chitietthongke t ON p.MAPM = t.MAPM 
     GROUP BY p.MAPM, p.TENPHIM 
     ORDER BY SUM(t.TONGVE) DESC 
     LIMIT 5";
        
            $result4 = $conn->executeQuery($sql);
            if($result4->num_rows > 0){
                while ($row = $result4->fetch_assoc()) {
                    $data1[] = array("label"=> $row["TENPHIM"], "y"=> $row["TONGVE"]);
                    $data2[] = array();
                }
            }
        }
    }

    $conn->disconnect();
    echo json_encode(array($data1, $data2), JSON_NUMERIC_CHECK);
?>