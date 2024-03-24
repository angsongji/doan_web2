<?php 
    echo '<span>Quản lí phim</span>
    <span>
        <div class="mode_page">';
    if(isset($_GET['mode'])){
        $mode=$_GET['mode'];
        switch($mode){
            case "day":{
                echo '<a href="../admin.php?mode=night"><i class="fa-solid fa-cloud-sun"></i></a>';
                break;
            }
            case "night":{
                echo '<a href="../admin.php?mode=day"><i class="fa-solid fa-cloud-moon"></i></a>';
                
                break;
            }
        }
    }
    else     echo '<a href="../admin.php?mode=night"><i class="fa-solid fa-cloud-sun"></i></a>';    
    echo    '</div>
        <i class="fa-solid fa-user-tie"></i>
        <span>Ten admin a</span>
    </span>';

?>