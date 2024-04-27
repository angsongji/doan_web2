<?php 
    $MAQUYEN="QAD";
    $EDIT= false;
    if (isset($_GET['MAQUYEN'])){
        $MAQUYEN = $_GET['MAQUYEN'];
        require_once('../database/connectDatabase.php');
    }
    if (isset($_GET['EDIT'])){
        $EDIT = $_GET['EDIT'];
        require_once('../database/connectDatabase.php');
    }
    

    $quyen = listAllQuyen();
    echo '<div class="phanquyen_wrap" name="'.$MAQUYEN.'">
            <ul class="phanquyen_wrap_quyen">
//--------------------------------------------------------------------------------------
            <li class="btn_phanquyen" id="quyen_selected" name="cc">cc</li> ';
    foreach ($quyen as $key => $value) {
        if($key == $MAQUYEN)
        echo '<li class="btn_phanquyen" id="quyen_selected" name="'.$key.'">'.$value.'</li>';
        else
        echo '<li class="btn_phanquyen" name="'.$key.'">'.$value.'</li>';
    }
    echo '<li class="btn_thaotacphanquyen" name="new_quyen"><i class="fa-solid fa-plus"></i></li>';
    if($EDIT)
        echo '<li class="btn_thaotacphanquyen" name="submit_edit_quyen"><i class="fa-solid fa-check"></i></li>';
    else
        echo '<li class="btn_thaotacphanquyen" name="edit_quyen"><i class="fa-solid fa-pen"></i></li>';
    
    echo '<li class="btn_thaotacphanquyen" name="remove_quyen"><i class="fa-solid fa-trash"></i></li>';
    echo '</ul>';
    $hanhdong=["Xem","Thêm","Sửa","Xóa"];
    echo ' 
          <div class="phanquyen_wrap_header">
            <div name="cotdetrong"></div>';
            foreach($hanhdong as $h){
                echo '<div class="phanquyen_hanhdong">'.$h.'</div>';
            }
           
    echo '</div>';
    $chucnang = listAllChucnang();
    foreach ($chucnang as $key => $value) {
        echo '<div class="phanquyen_wrap_function">
                <div class="phanquyen_wrap_content">';
        echo '<div class="phanquyen_name">'.$value.'</div>';
        foreach($hanhdong as $h){
            if($EDIT){
                if(isQuyen_Chucnang_Hanhdong($MAQUYEN,$key,$h))
                echo '<input type="checkbox" name="'.$h.'" checked>';
            else
                echo '<input type="checkbox" name="'.$h.'">';
            }else{
                if(isQuyen_Chucnang_Hanhdong($MAQUYEN,$key,$h))
                    echo '<input type="checkbox" name="'.$h.'" checked disabled>';
                else
                    echo '<input type="checkbox" name="'.$h.'" disabled>';
            }
        } 
        echo '  </div>
              </div>';
    }
    echo '</div>';
    echo '
    <script>
        $(".phanquyen_wrap_quyen>.btn_phanquyen").click(function(){
            let maquyen = $(this).attr("name");
            $.ajax({
                url: "./pages/phanquyenadmin.php", // Đường dẫn tới trang content.php
                type: "GET",
                data: {MAQUYEN: maquyen},
                success: function(response) {
                    $("#content").html(response); // Thay đổi nội dung của #content
                }
            });
        });
        $(".btn_thaotacphanquyen").on("click",function(){
            let typebtn = $(this).attr("name");
            let maquyen = $(".phanquyen_wrap").attr("name");
            switch(typebtn){
                case "new_quyen":
// Nội dung cần sửa của Tuấn------------------------------------------------------------------------
                    alert("new");
                    break;
                case "edit_quyen":
                    $.ajax({
                        url: "./pages/phanquyenadmin.php", // Đường dẫn tới trang content.php
                        type: "GET",
                        data: {EDIT: true,MAQUYEN: maquyen},
                        success: function(response) {
                            $("#content").html(response); // Thay đổi nội dung của #content
                        }
                    });
                    break;
                case "submit_edit_quyen":
                    $.ajax({
                        url: "./pages/phanquyenadmin.php", // Đường dẫn tới trang content.php
                        type: "GET",
                        data: {MAQUYEN: maquyen},
                        success: function(response) {
                            $("#content").html(response); // Thay đổi nội dung của #content
                        }
                    });
                    break;
                case "remove_quyen":
                    alert("remove");
                    break;
                    break;
            }
        });
    </script>
    ';
function listAllChucnang(){
    
    $sql="SELECT * FROM chucnang";
    $conn = new connectDatabase();
    $result=$conn->executeQuery($sql);
    $conn->disconnect();
    if ($result) {
        $chucnang = [];
        // Thực hiện các thao tác với kết quả
        while ($row = $result->fetch_assoc()) {
            $ma = $row['MACHUCNANG'];
            $ten = $row['TENCHUCNANG'];

            // Thêm cặp khóa và giá trị vào mảng chucnang
            $chucnang[$ma] = $ten;
        }
        return $chucnang;
    }
}

function listAllQuyen(){
    
    $sql="SELECT * FROM quyen";
    $conn = new connectDatabase();
    $result=$conn->executeQuery($sql);
    $conn->disconnect();
    if ($result) {
        $chucnang = [];
        // Thực hiện các thao tác với kết quả
        while ($row = $result->fetch_assoc()) {
            $ma = $row['MAQUYEN'];
            $ten = $row['TENQUYEN'];

            // Thêm cặp khóa và giá trị vào mảng chucnang
            $chucnang[$ma] = $ten;
        }
        return $chucnang;
    }
}

function isQuyen_Chucnang_Hanhdong($MAQ,$MACHUCNANG,$hanhdong){
    
    $sql="SELECT * FROM chitietquyen_chucnang WHERE MAQUYEN='".$MAQ."' AND MACHUCNANG='".$MACHUCNANG."' AND HANHDONG='".$hanhdong."'";
    $conn = new connectDatabase();
    $result=$conn->executeQuery($sql);
    $conn->disconnect();
    if ($result){
        if ($result->num_rows > 0)
            return true;
        else 
            return false;
        
        
    }
}

?>