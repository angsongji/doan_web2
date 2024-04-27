<!--  Xử lý sự kiện hiển thị ghế theo mã phòng chiếu -->
<?php
    require_once('../database/connectDatabase.php');
    if(isset($_GET['MAPHONGCHIEU'])) {
        $connect = new connectDatabase();

        $MAPHONGCHIEU = $_GET['MAPHONGCHIEU'];
        $gheSql = "SELECT * FROM ghe g
                    INNER JOIN loaighe lg ON lg.MALOAIGHE = g.MALOAIGHE
                    WHERE MAPHONGCHIEU = '$MAPHONGCHIEU'";
        $gheQuery = $connect->executeQuery($gheSql);

        $rowDonA = array(); $rowGiaA = array();
        $rowDonB = array(); $rowGiaB = array();
        $rowDonC = array(); $rowGiaC = array();
        $rowDonD = array(); $rowGiaD = array();
        $rowDonE = array(); $rowGiaE = array();
        $rowDonF = array(); $rowGiaF = array();
        $rowDonG = array(); $rowDoiG = array(); $rowGiaG = array();
        $rowDonH = array(); $rowDoiH = array(); $rowGiaH = array();
        $kiemTraTonTaiPhongChieu = true;

        while($gheRow = mysqli_fetch_assoc($gheQuery)) {
            if($gheRow['HANGGHE'] == 'A' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'A' && $gheRow['MALOAIGHE'] == 'BIZ') {
                $rowDonA[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];
                $rowGiaA[$gheRow['MAGHE']] = $gheRow['PRICE'];
            }

            if($gheRow['HANGGHE'] == 'B' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'B' && $gheRow['MALOAIGHE'] == 'BIZ') 
            {
                $rowDonB[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];
                $rowGiaB[$gheRow['MAGHE']] = $gheRow['PRICE'];
            }

            if($gheRow['HANGGHE'] == 'C' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'C' && $gheRow['MALOAIGHE'] == 'BIZ') 
            {
                $rowDonC[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];
                $rowGiaC[$gheRow['MAGHE']] = $gheRow['PRICE'];
            }

            if($gheRow['HANGGHE'] == 'D' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'D' && $gheRow['MALOAIGHE'] == 'BIZ') 
            {
                $rowDonD[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];
                $rowGiaD[$gheRow['MAGHE']] = $gheRow['PRICE'];
            }

            if($gheRow['HANGGHE'] == 'E' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'E' && $gheRow['MALOAIGHE'] == 'BIZ') 
            {
                $rowDonE[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];
                $rowGiaE[$gheRow['MAGHE']] = $gheRow['PRICE'];
            }

            if($gheRow['HANGGHE'] == 'F' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'F' && $gheRow['MALOAIGHE'] == 'BIZ') 
            {
                $rowDonF[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];
                $rowGiaF[$gheRow['MAGHE']] = $gheRow['PRICE'];
            }

            if($gheRow['HANGGHE'] == 'G' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'G' && $gheRow['MALOAIGHE'] == 'BIZ' || 
            $gheRow['HANGGHE'] == 'G' && $gheRow['MALOAIGHE'] == 'DOI') {
                if($gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'G' && $gheRow['MALOAIGHE'] == 'BIZ')
                {
                    $rowDonG[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];
                    $rowGiaG[$gheRow['MAGHE']] = $gheRow['PRICE'];
                }
                if($gheRow['MALOAIGHE'] == 'DOI')
                {
                    $rowDoiG[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];
                    $rowGiaG[$gheRow['MAGHE']] = $gheRow['PRICE'];
                }
            
            if($gheRow['HANGGHE'] == 'H' && $gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'H' && $gheRow['MALOAIGHE'] == 'BIZ' || 
            $gheRow['HANGGHE'] == 'H' && $gheRow['MALOAIGHE'] == 'DOI') {
                if($gheRow['MALOAIGHE'] == 'STD' || $gheRow['HANGGHE'] == 'H' && $gheRow['MALOAIGHE'] == 'BIZ')
                {
                    $rowDonH[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];
                    $rowGiaH[$gheRow['MAGHE']] = $gheRow['PRICE'];
                }
                if($gheRow['MALOAIGHE'] == 'DOI')
                {
                    $rowDoiH[$gheRow['MAGHE']] = $gheRow['MALOAIGHE'];
                    $rowGiaH[$gheRow['MAGHE']] = $gheRow['PRICE'];
                }
            }
        }
    }
            // <!-- Row A -->
            echo    '<div class="ghe-don">';
                        $i = 1;
                        foreach($rowDonA as $key => $value) { 
                            foreach($rowGiaA as $id => $price)
                                if($id == $key) {
                                    $value = $value == 'BIZ'? 'ghe-vip': '';
                                    echo "<div id='$key' class='$value' price='$price'>".
                                        "A$i";
                                        ++$i;
                                    echo "</div>";
                                }
                        }
            echo    '</div>';

            // <!-- Row B -->
            echo    '<div class="ghe-don">';
                        $i = 1;
                        foreach($rowDonB as $key => $value) { 
                            foreach($rowGiaB as $id => $price)
                                if($id == $key) {
                                    $value = $value == 'BIZ'? 'ghe-vip': '';
                                    echo "<div id='$key' class='$value' price='$price'>".
                                        "B$i";
                                        ++$i;
                                    echo "</div>";
                                }
                        }
            echo    '</div>';

            // <!-- Row C -->
            echo    '<div class="ghe-don">';
                    $i = 1;
                    foreach($rowDonC as $key => $value) { 
                        foreach($rowGiaC as $id => $price)
                            if($id == $key) {
                                $value = $value == 'BIZ'? 'ghe-vip': '';
                                echo "<div id='$key' class='$value' price='$price'>".
                                    "C$i";
                                    ++$i;
                                echo "</div>";
                            }
                    }
            echo    '</div>';

            // <!-- Row D -->
            echo    '<div class="ghe-don">';
                    $i = 1;
                    foreach($rowDonD as $key => $value) { 
                        foreach($rowGiaD as $id => $price)
                            if($id == $key) {
                                $value = $value == 'BIZ'? 'ghe-vip': '';
                                echo "<div id='$key' class='$value' price='$price'>".
                                    "D$i";
                                    ++$i;
                                echo "</div>";
                            }
                    }
            echo    '</div>';

            // <!-- Row E -->
            echo    '<div class="ghe-don">';
                    $i = 1;
                    foreach($rowDonE as $key => $value) { 
                        foreach($rowGiaE as $id => $price)
                            if($id == $key) {
                                $value = $value == 'BIZ'? 'ghe-vip': '';
                                echo "<div id='$key' class='$value' price='$price'>".
                                    "E$i";
                                    ++$i;
                                echo "</div>";
                            }
                    }
            echo    '</div>';

            // <!-- Row F -->
            echo    '<div class="ghe-don">';
                    $i = 1;
                    foreach($rowDonF as $key => $value) { 
                        foreach($rowGiaF as $id => $price)
                            if($id == $key) {
                                $value = $value == 'BIZ'? 'ghe-vip': '';
                                echo "<div id='$key' class='$value' price='$price'>".
                                    "F$i";
                                    ++$i;
                                echo "</div>";
                            }
                    }
            echo    '</div>';

            // <!-- Row G -->
            if(!empty($rowDonG)) { 
            echo    '<div class="ghe-don">';
                    $i = 1;
                    foreach($rowDonG as $key => $value) { 
                        foreach($rowGiaG as $id => $price)
                            if($id == $key) {
                                $value = $value == 'BIZ'? 'ghe-vip': '';
                                echo "<div id='$key' class='$value' price='$price'>".
                                    "G$i";
                                    ++$i;
                                echo "</div>";
                            }
                    }
            echo    '</div>';
            }

            if(!empty($rowDoiG)) {
            echo '<div class="ghe-doi">';
                    $i = 1;
                    foreach($rowDoiG as $key => $value) { 
                        foreach($rowGiaG as $id => $price)
                            if($id == $key) {
                                $value = $value == 'BIZ'? 'ghe-vip': '';
                                echo "<div id='$key' class='$value' price='$price'>".
                                    "G$i";
                                    ++$i;
                                echo "</div>";
                            }
                }
            echo '</div>';
            }

            // <!-- Row H -->
            if(!empty($rowDonH)) { 
            echo    '<div class="ghe-don">';
                    $i = 1;
                    foreach($rowDonH as $key => $value) { 
                        foreach($rowGiaH as $id => $price)
                            if($id == $key) {
                                $value = $value == 'BIZ'? 'ghe-vip': '';
                                echo "<div id='$key' class='$value' price='$price'>".
                                    "H$i";
                                    ++$i;
                                echo "</div>";
                            }
                    }
            echo    '</div>';
            }

            if(!empty($rowDoiH)) {
            echo '<div class="ghe-doi">';
                $i = 1;
                foreach($rowDoiH as $key => $value) { 
                    foreach($rowGiaH as $id => $price)
                        if($id == $key) {
                            $value = $value == 'BIZ'? 'ghe-vip': '';
                            echo "<div id='$key' class='$value' price='$price'>".
                                "H$i";
                                ++$i;
                            echo "</div>";
                        }
                }
            echo '</div>';
            }

        $connect->disconnect();
    }
?>
