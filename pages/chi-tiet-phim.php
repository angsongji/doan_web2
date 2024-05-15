<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết phim</title>
    <script src="https://kit.fontawesome.com/459a7e2db3.js" crossorigin="anonymous"></script>
    <script defer src="./js/chi-tiet-film.js"></script>
    <link rel="stylesheet" href="./css/ChiTietPhim.css">
</head>

<body>

    <main>
        <?php
            include('trailer.php');
            include('film-info.php');
            include('film-calendar.php');
        ?>
    </main>

    <?php
        include('container-popup.php');
        include('container-popup-menu-chon-ghe.php');
        include('container-popup-menu-chon-nuoc.php');
        include('container-popup-thanh-toan.php');
    ?>

</body>
</html>