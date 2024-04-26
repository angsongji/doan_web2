<!--  Xử lý sự kiện hiển thị ghế theo mã phòng chiếu -->
<?php
    require_once('../database/connectDatabase.php');
    if(isset($_GET['MAPHONGCHIEU'])) {
        $connect = new connectDatabase();

        $MAPHONGCHIEU = $_GET['MAPHONGCHIEU'];
        $gheSql = "SELECT * FROM ghe
                    WHERE MAPHONGCHIEU = '$MAPHONGCHIEU'";
        $gheQuery = $connect->executeQuery($gheSql);

        $rowDonA = array();
        $rowDonB = array();
        $rowDonC = array();
        $rowDonD = array();
        $rowDonE = array();
        $rowDonF = array();
        $rowDonG = array(); $rowDoiG = array();
        $rowDonH = array(); $rowDoiH = array();
        $kiemTraTonTaiPhongChieu = true;

        while($gheRow = mysqli_fetch_assoc($gheQuery)) {
            if($gheRow['HANGGHE'] == 'A' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'A' && $gheRow['MALOAIGHE'] == 'BIZ') 
                $rowDonA[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];

            if($gheRow['HANGGHE'] == 'B' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'B' && $gheRow['MALOAIGHE'] == 'BIZ') 
                $rowDonB[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];

            if($gheRow['HANGGHE'] == 'C' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'C' && $gheRow['MALOAIGHE'] == 'BIZ') 
                $rowDonC[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];

            if($gheRow['HANGGHE'] == 'D' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'D' && $gheRow['MALOAIGHE'] == 'BIZ') 
                $rowDonD[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];

            if($gheRow['HANGGHE'] == 'E' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'E' && $gheRow['MALOAIGHE'] == 'BIZ') 
                $rowDonE[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];

            if($gheRow['HANGGHE'] == 'F' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'F' && $gheRow['MALOAIGHE'] == 'BIZ') 
                $rowDonF[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];

            if($gheRow['HANGGHE'] == 'G' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'G' && $gheRow['MALOAIGHE'] == 'BIZ' || 
            $gheRow['HANGGHE'] == 'G' && $gheRow['MALOAIGHE'] == 'DOI') {
                if($gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'G' && $gheRow['MALOAIGHE'] == 'BIZ')
                    $rowDonG[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];
                if($gheRow['MALOAIGHE'] == 'DOI')
                    $rowDoiG[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];
            }
            
            if($gheRow['HANGGHE'] == 'H' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'H' && $gheRow['MALOAIGHE'] == 'BIZ' || 
            $gheRow['HANGGHE'] == 'H' && $gheRow['MALOAIGHE'] == 'DOI') {
                if($gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'G' && $gheRow['MALOAIGHE'] == 'BIZ')
                    $rowDonG[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];
                if($gheRow['MALOAIGHE'] == 'DOI')
                    $rowDoiG[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];
            }
        }

            // <!-- Row A -->
            echo    '<div class="ghe-don">';
                        $i = 1;
                        foreach($rowDonA as $key => $value) { 
                            $value = $value == 'BIZ'? 'ghe-vip': '';
                            echo "<div id='$key' class='$value'>".
                                "A$i";
                                ++$i;
                            echo "</div>";
                        }
            echo    '</div>';

            // <!-- Row B -->
            echo    '<div class="ghe-don">';
                    $i = 1;
                    foreach($rowDonB as $key => $value) { 
                        $value = $value == 'BIZ'? 'ghe-vip': '';
                        echo "<div id='$key' class='$value'>".
                            "B$i";
                            ++$i;
                        echo "</div>";
                    }
            echo    '</div>';

            // <!-- Row C -->
            echo    '<div class="ghe-don">';
                    $i = 1;
                    foreach($rowDonC as $key => $value) { 
                        $value = $value == 'BIZ'? 'ghe-vip': '';
                        echo "<div id='$key' class='$value'>".
                            "C$i";
                            ++$i;
                        echo "</div>";
                    }
            echo    '</div>';

            // <!-- Row D -->
            echo    '<div class="ghe-don">';
                    $i = 1;
                    foreach($rowDonD as $key => $value) { 
                        $value = $value == 'BIZ'? 'ghe-vip': '';
                        echo "<div id='$key' class='$value'>".
                            "D$i";
                            ++$i;
                        echo "</div>";
                    }
            echo    '</div>';

            // <!-- Row E -->
            echo    '<div class="ghe-don">';
                    $i = 1;
                    foreach($rowDonE as $key => $value) { 
                        $value = $value == 'BIZ'? 'ghe-vip': '';
                        echo "<div id='$key' class='$value'>".
                            "E$i";
                            ++$i;
                        echo "</div>";
                    }
            echo    '</div>';

            // <!-- Row F -->
            echo    '<div class="ghe-don">';
                    $i = 1;
                    foreach($rowDonF as $key => $value) { 
                        $value = $value == 'BIZ'? 'ghe-vip': '';
                        echo "<div id='$key' class='$value'>".
                            "F$i";
                            ++$i;
                        echo "</div>";
                    }
            echo    '</div>';

            // <!-- Row G -->
            if(!empty($rowDonG)) { 
                echo    '<div class="ghe-don">';
                    $i = 1;
                    foreach($rowDonG as $key => $value) { 
                        $value = $value == 'BIZ'? 'ghe-vip': '';
                        echo "<div id='$key' class='$value'>".
                            "G$i";
                            ++$i;
                        echo "</div>";
                    }
                echo    '</div>';
            }

            if(!empty($rowDoiG)) {
                echo '<div class="ghe-doi">';
                $i = 1;
                foreach($rowDoiG as $key => $value) { 
                    $value = $value == 'BIZ'? 'ghe-vip': '' ;
                    echo "<div id='$key' class='$value'>".
                        "G$i";
                        ++$i; // Tăng giá trị của $i lên 1 sau mỗi lần lặp
                    echo "</div>";
                }
                echo '</div>';
            }

            // <!-- Row H -->
            if(!empty($rowDonH)) { 
                echo    '<div class="ghe-don">';
                    $i = 1;
                    foreach($rowDonH as $key => $value) { 
                        $value = $value == 'BIZ'? 'ghe-vip': '';
                        echo "<div id='$key' class='$value'>".
                            "H$i";
                            ++$i;
                        echo "</div>";
                    }
                echo    '</div>';
            }

            if(!empty($rowDoiH)) {
                echo '<div class="ghe-doi">';
                $i = 1;
                foreach($rowDoiH as $key => $value) { 
                    $value = $value == 'BIZ'? 'ghe-vip': '' ;
                    echo "<div id='$key' class='$value'>".
                        "H$i";
                        ++$i; // Tăng giá trị của $i lên 1 sau mỗi lần lặp
                    echo "</div>";
                }
                echo '</div>';
            }

        $connect->disconnect();
    }
?>
