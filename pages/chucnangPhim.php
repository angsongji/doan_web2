<?php 

echo '
<div class="chucnang_wrap">
        <ul class="chucnangcon_wrap">
            ';
        if(isset($_GET['pagecon'])){
            switch($_GET['pagecon']){
                case "moviesadmin.php":
                    echo'
            <li class="chucnangcon_Phim" id="chucnangconPhim_selected" name="moviesadmin.php">Phim</li>
            <li class="chucnangcon_Phim" name="theloaiadmin.php">Thể loại</li>
            <li class="chucnangcon_Phim"  name="dienvienadmin.php">Diễn viên</li>';
                    break;
                case "theloaiadmin.php":
                    echo'
            <li class="chucnangcon_Phim"  name="moviesadmin.php">Phim</li>
            <li class="chucnangcon_Phim" id="chucnangconPhim_selected" name="theloaiadmin.php">Thể loại</li>
            <li class="chucnangcon_Phim"  name="dienvienadmin.php">Diễn viên</li>';
                    break;
                case "dienvienadmin.php":
                    echo'
            <li class="chucnangcon_Phim"  name="moviesadmin.php">Phim</li>        
            <li class="chucnangcon_Phim" name="theloaiadmin.php">Thể loại</li>
            <li class="chucnangcon_Phim"  id="chucnangconPhim_selected"  name="dienvienadmin.php">Diễn viên</li>';
                    break;
            }
        }
        else{
            echo'
            <li class="chucnangcon_Phim" id="chucnangconPhim_selected" name="moviesadmin.php">Phim</li>
            <li class="chucnangcon_Phim" name="theloaiadmin.php">Thể loại</li>
            <li class="chucnangcon_Phim"  name="dienvienadmin.php">Diễn viên</li>'; 
        }
echo' </ul>
    <div class="content_chucnangcon_wrap">';
    if(isset($_GET['pagecon']))
        require($_GET["pagecon"]);
    else 
        require("./pages/moviesadmin.php");
    echo'</div>
</div>';
echo '
    <script>
        $(".chucnangcon_wrap>.chucnangcon_Phim").click(function(){
            let luachon = $(this).attr("name");
            $.ajax({
                url: "./pages/chucnangPhim.php", 
                type: "GET",
                data: {pagecon: luachon},
                success: function(response) {
                    $("#content").html(response); // Thay đổi nội dung của #content
                }
            });
        });
    </script>
    ';

?>