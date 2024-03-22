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
            <div class="name_model" >Tìm kiếm</div>
                <form class="searchadmin" action="">
                    <?php require 'pages/searchadmin.php' ?>
                </form>
                <div class="name_model" >Tổng cộng: <span id="quantity_movies">13</span> phim</div> 
                <div id="content">  
                    <?php //require 'pages/usersadmin.php' ?><!--Trang ql nguoi dung-->
                    <?php //require 'pages/moviesadmin.php' ?><!--Trang ql movie-->
                    <?php //require 'pages/lichchieuphimadmin.php' ?><!--Trang ql lichchieuphim-->
                    <?php //require 'pages/dichvuadmin.php' ?><!--Trang ql dich vu-->
                    <?php //require 'pages/lsdatveadmin.php' ?><!--Trang lich su dat ve-->
                    <?php //require 'pages/phanquyenadmin.php' ?><!--Trang ql phan quyen-->
                    <div id="history_ticket_wrap">
                        <div class="history_ticket header_history_ticket">
                            
                                <span>Mã vé</span>
                                <span>Tên phim</span>
                                <span>Thời gian</span>
                                <span>Thành tiền</span>
                                <span></span>
                            
                        </div>
                        <div class="content_history_ticket">
                            <div class="history_ticket">
                                <span>VE019234</span>
                                <span>MAI</span>
                                <span>
                                    <span>19/1/2024</span>
                                    <span>20:30</span>
                                </span>
                                <span>
                                    <span>90000</span>
                                    <i class="fa-solid fa-dong-sign"></i>
                                </span>
                                <span><i class="fa-solid fa-ellipsis-vertical"></i></span>
                            </div>
                            <div class="history_ticket">
                                <span>VE019234</span>
                                <span>MAI</span>
                                <span>
                                    <span>19/1/2024</span>
                                    <span>20:30</span>
                                </span>
                                <span>
                                    <span>90000</span>
                                    <i class="fa-solid fa-dong-sign"></i>
                                </span>
                                <span><i class="fa-solid fa-ellipsis-vertical"></i></span>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <nav id="list_page">
                    <?php require 'pages/list_page_admin.php' ?>
                </nav>
        </div>
    </div>
    <script src="js/admin.js"></script>
</body>
</html>