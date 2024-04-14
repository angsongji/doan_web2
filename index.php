
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/base.css">
    <!-- <link rel="stylesheet" href="./css/trangchu.css"> -->
    <?php
    if(isset($_GET['pages'])){
        $pages=$_GET['pages'];
        switch($pages){
            case 'contentUser.php':
                echo'<link rel="stylesheet" href="./css/base_user.css">
                     <link rel="stylesheet" href="./css/user.css">';
                break;
            case 'discount.php':
                echo '<link rel="stylesheet" href="./css/base.css">
                <link rel="stylesheet" href="./css/discount.css">';
        }
    }
    ?>
    
</head>

<body>
    <?php
        include "./pages/header.php";
     ?>
    <?php
    if(isset($_GET['pages'])){
        $pages=$_GET['pages'];
        switch($pages){
            case 'discount.php':
                include "./pages/discount.php";
                echo '<script src="./js/discount.js"></script>';
                break;
            case 'contentUser.php':
                include "./pages/contentUser.php";
                break;
        }
    }
    ?>
    
    <?php include "./pages/footer.php"; ?>
    <script src="./js/header.js"></script>
    
</body>