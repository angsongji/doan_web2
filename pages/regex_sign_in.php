<?php
        $chuoiEmpty = "";
        $count = 0;
        if($_SERVER["REQUEST_METHOD"]=="POST"){

            if(empty($_POST['Email'])){
                if($chuoiEmpty==""){
                    $chuoiEmpty = "errorEmail=empty";  
                }else{
                    $chuoiEmpty .="&errorEmail=empty";  
                }
                $count++;
            }else if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()-+])[A-Za-z\d!@#$%^&*()-+]{8,}$/', $_POST['Email'])){
                if($chuoiEmpty==""){
                        $chuoiEmpty = "errorEmail=wrong";  
                }else{
                        $chuoiEmpty .="&errorEmail=wrong";  
                }
                $count++;
            }else{
                $count++;
                $chuoiEmpty .="Email=".$_POST['Email'];  
                }    
        if($count>0){
            header("location: log_sign.php?".$chuoiEmpty);
        }else{

        }
    }

?>