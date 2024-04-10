<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' href='img/iconweb2.ico' />
    <link rel="stylesheet" href="css/admin.css" />
    <?php 
        if(isset($_GET['mode']) && $_GET['mode']=="night")
            echo '<link rel="stylesheet" href="css/admin_night.css" />';
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>MEME</title>
</head>
<body>
    <div class="wrapadmin">
        <nav class="menuadmin">
            <?php require 'pages/menuadmin.php' ?>
        </nav>
        <div class="contentadmin" >
            <div class="headeradmin">
                <?php require 'pages/headeradmin.php' ?>
            </div>
            <?php
                if(isset($_GET['page'])){
                    echo'<div class="name_model" >Tìm kiếm</div>
                    <form class="searchadmin" action="">
                         ';
                    require "pages/searchadmin.php";
                    echo' 
                    </form>
                    <div class="name_model" >Tổng cộng: <span id="quantity_movies">13</span> phim</div> ';
                }
            ?>
            
            <div id="content">  
                <?php
                    if(isset($_GET['page']))
                    {
                        require 'pages/'.$_GET['page'].'.php';
                    }
                    else{
                        echo '<div id="none_select_cn">Chua lua chon chuc nang</div>';
                    }   
                ?>
                <?php //require 'pages/usersadmin.php' ?><!--Trang ql nguoi dung-->
                <?php //require 'pages/moviesadmin.php' ?><!--Trang ql movie-->
                <?php //require 'pages/lichchieuphimadmin.php' ?><!--Trang ql lichchieuphim-->
                <?php //require 'pages/dichvuadmin.php' ?><!--Trang ql dich vu-->
                <?php //require 'pages/lsdatveadmin.php' ?><!--Trang lich su dat ve-->
                <?php //require 'pages/phanquyenadmin.php' ?><!--Trang ql phan quyen-->
                    
                    
            </div>
            <?php
                    if(isset($_GET['page']))
                    {
                        echo '<nav id="list_page">';
                        require "pages/list_page_admin.php";
                        echo'</nav>';
                    }
            ?>
            
        </div>
    </div>
    <div id="unclick_behind_this_screen" ></div>
    <script src="js/admin.js"></script>
</body>
</html>