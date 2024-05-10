<?php 
    require_once("../database/connectDatabase.php");
    $conn = new connectDatabase();

    $data = array();
    
    if(isset($_GET['choose']) && isset($_GET['style'])){
       if($_GET['choose'] == "doanhthu") {
            if($_GET['style'] == "tongtheongay") {
                if(isset($_GET['from_date']) && isset($_GET['to_date'])) {
                    $from_date = $_GET['from_date'];
                    $to_date = $_GET['to_date'];
                    $sql = "SELECT NGAY, SUM(TongDoanhThu) AS TongDoanhThuNgay
                    FROM thongke 
                    WHERE NGAY BETWEEN '$from_date' AND '$to_date' 
                    GROUP BY NGAY";
                }else{
                    $sql = "SELECT NGAY, SUM(TongDoanhThu) AS TongDoanhThuNgay
                    FROM thongke
                    GROUP BY NGAY";
                }
                $result = $conn->executeQuery($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $data[] = array("label" => $row['NGAY'], "y" => $row['TongDoanhThuNgay']);
                    }
                }
            } else if($_GET['style'] == "tongtheotheloai"){
                if(isset($_GET['from_date']) && isset($_GET['to_date'])) {
                    $from_date = $_GET['from_date'];
                    $to_date = $_GET['to_date'];
                    $sql = "SELECT TL.MATHELOAI, TL.TENTHELOAI, SUM(CTTK.TONGDOANHTHU) AS TongDoanhThuTheoTheLoai
                    FROM theloai TL
                    JOIN chitietphim_theloai CTP ON TL.MATHELOAI = CTP.MATHELOAI
                    JOIN phim P ON CTP.MAPM = P.MAPM
                    JOIN chitietthongke CTTK ON P.MAPM = CTTK.MAPM
                    WHERE Ngay BETWEEN '$from_date' AND '$to_date' 
                    GROUP BY TL.MATHELOAI, TL.TENTHELOAI";
                }else{
                    $sql = "SELECT TL.MATHELOAI, TL.TENTHELOAI, SUM(CTTK.TONGDOANHTHU) AS TongDoanhThuTheoTheLoai
                    FROM theloai TL
                    JOIN chitietphim_theloai CTP ON TL.MATHELOAI = CTP.MATHELOAI
                    JOIN phim P ON CTP.MAPM = P.MAPM
                    JOIN chitietthongke CTTK ON P.MAPM = CTTK.MAPM
                    GROUP BY TL.MATHELOAI, TL.TENTHELOAI";
                }
                $result = $conn->executeQuery($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $data[] = array("label" => $row['TENTHELOAI'], "y" => $row['TongDoanhThuTheoTheLoai']);
                    }
                }
            } else if($_GET['style'] == "tongtheophim"){
                if(isset($_GET['from_date']) && isset($_GET['to_date'])) {
                    $from_date = $_GET['from_date'];
                    $to_date = $_GET['to_date'];
                    $sql = "SELECT P.MAPM, P.TENPHIM, SUM(CTTK.TONGDOANHTHU) AS TongDoanhThuTheoPhim
                    FROM phim P
                    JOIN chitietthongke CTTK ON P.MAPM = CTTK.MAPM
                    WHERE Ngay BETWEEN '$from_date' AND '$to_date' 
                    GROUP BY P.MAPM, P.TENPHIM";
                }else{
                    $sql = "SELECT P.MAPM, P.TENPHIM, SUM(CTTK.TONGDOANHTHU) AS TongDoanhThuTheoPhim
                    FROM phim P
                    JOIN chitietthongke CTTK ON P.MAPM = CTTK.MAPM
                    GROUP BY P.MAPM, P.TENPHIM";
                }
                $result = $conn->executeQuery($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $data[] = array("label" => $row['TENPHIM'], "y" => $row['TongDoanhThuTheoPhim']);
                    }
                }
            }
       }else if($_GET['choose'] == "theloai") {
            $matheloai = $_GET['style'];
            $thutu = $_GET['thutu'];
            if(isset($_GET['from_date']) && isset($_GET['to_date'])){
                $sql = "SELECT P.TENPHIM, SUM(CTTK.TONGDOANHTHU) AS TongDoanhThu
                FROM phim P
                JOIN chitietphim_theloai CTP ON P.MAPM = CTP.MAPM
                JOIN theloai TL ON CTP.MATHELOAI = TL.MATHELOAI AND TL.MATHELOAI = '$matheloai'
                JOIN chitietthongke CTTK ON P.MAPM = CTTK.MAPM
                WHERE Ngay BETWEEN '$from_date' AND '$to_date' 
                GROUP BY P.TENPHIM
                ORDER BY SUM(CTTK.TONGDOANHTHU) DESC
                LIMIT $thutu";
            }else {
                $sql = "SELECT P.TENPHIM, SUM(CTTK.TONGDOANHTHU) AS TongDoanhThu
                FROM phim P
                JOIN chitietphim_theloai CTP ON P.MAPM = CTP.MAPM
                JOIN theloai TL ON CTP.MATHELOAI = TL.MATHELOAI AND TL.MATHELOAI = '$matheloai'
                JOIN chitietthongke CTTK ON P.MAPM = CTTK.MAPM
                GROUP BY P.TENPHIM
                ORDER BY SUM(CTTK.TONGDOANHTHU) DESC
                LIMIT $thutu";
            }
            $result = $conn->executeQuery($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = array("label" => $row['TENPHIM'], "y" => $row['TongDoanhThu']);
                }
            }
       }
    }

    $conn->disconnect();
    echo json_encode($data, JSON_NUMERIC_CHECK);
?>
