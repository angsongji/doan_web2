<?php
        $chuoiEmpty = "";
        $count = 0;
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(empty($_POST['Name'])){
                $count++;
                $chuoiEmpty = "errorName=empty";
            }else{
                $chuoiEmpty .="Name=".$_POST['Name'];  
                }

            if(empty($_POST['Email'])){
                if($chuoiEmpty==""){
                    $chuoiEmpty = "errorEmail=empty";  
                }else{
                    $chuoiEmpty .="&errorEmail=empty";  
                }
                $count++;
               // '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()-+])[A-Za-z\d!@#$%^&*()-+]{8,}$/'
            }else if(!preg_match('/^[a-zA-Z0-9]+@gmail\.com$/', $_POST['Email'])){
                if($chuoiEmpty==""){
                        $chuoiEmpty = "errorEmail=wrong";  
                }else{
                        $chuoiEmpty .="&errorEmail=wrong";  
                }
                $count++;
            }else{
                if($chuoiEmpty==""){
                         $chuoiEmpty .="Email=".$_POST['Email'];   
                }else{
                        $chuoiEmpty .="&Email=".$_POST['Email'];   
                    }
                }

                if(empty($_POST['Name_account'])){
                    if($chuoiEmpty==""){
                        $chuoiEmpty = "errorName_account=empty";  
                    }else{
                        $chuoiEmpty .="&errorName_account=empty";  
                    }
                    $count++;
                }else if(!preg_match('/^(?=.*[a-zA-Z])(?=.*\d).{6,}$/', $_POST['Name_account'])){
                    if($chuoiEmpty==""){
                            $chuoiEmpty = "errorName_account=wrong";  
                    }else{
                            $chuoiEmpty .="&errorName_account=wrong";  
                    }
                    $count++;
                }else{
                    if($chuoiEmpty==""){
                             $chuoiEmpty .="Name_account=".$_POST['Name_account'];   
                    }else{
                            $chuoiEmpty .="&Name_account=".$_POST['Name_account'];   
                        }
                    }

                    if(empty($_POST['Password'])){
                        if($chuoiEmpty==""){
                            $chuoiEmpty = "errorPassword=empty";  
                        }else{
                            $chuoiEmpty .="&errorPassword=empty";  
                        }
                        $count++;
                    }else if(!preg_match('/^.{8,}$/', $_POST['Password'])){
                        if($chuoiEmpty==""){
                                $chuoiEmpty = "errorPassword=wrong";  
                        }else{
                                $chuoiEmpty .="&errorPassword=wrong";  
                        }
                        $count++;
                    }else{
                        if($chuoiEmpty==""){
                                 $chuoiEmpty .="Password=".$_POST['Password'];   
                        }else{
                                $chuoiEmpty .="&Password=".$_POST['Password'];   
                            }
                        }

                        if(empty($_POST['Password'])){
                        if($chuoiEmpty==""){
                            $chuoiEmpty = "errorPassword=empty";  
                        }else{
                            $chuoiEmpty .="&errorPassword=empty";  
                        }
                        $count++;
                    }else if(!preg_match('/^.{8,}$/', $_POST['Password'])){
                        if($chuoiEmpty==""){
                                $chuoiEmpty = "errorPassword=wrong";  
                        }else{
                                $chuoiEmpty .="&errorPassword=wrong";  
                        }
                        $count++;
                    }else{
                        if($chuoiEmpty==""){
                                 $chuoiEmpty .="Password=".$_POST['Password'];   
                        }else{
                                $chuoiEmpty .="&Password=".$_POST['Password'];   
                            }
                        }


                        if(empty($_POST['Password'])){
                            if($chuoiEmpty==""){
                                $chuoiEmpty = "errorRe_password=emptyPass";  
                            }else{
                                $chuoiEmpty .="&errorRe_password=emptyPass";  
                            }
                            $count++;
                        }else if(empty($_POST['Re_password'])){
                            if($chuoiEmpty==""){
                                $chuoiEmpty = "errorRe_password=empty";  
                            }else{
                                $chuoiEmpty .="&errorRe_password=empty";  
                            }
                            $count++;
                        }else if($_POST['Re_password']!==$_POST['Password']){
                            if($chuoiEmpty==""){
                                    $chuoiEmpty = "errorRe_password=wrong";  
                            }else{
                                    $chuoiEmpty .="&errorRe_password=wrong";  
                            }
                            $count++;
                        }
                $count++;    
        if($count>0){
            header("location: log_sign.php?".$chuoiEmpty);
        }else{

        }
    }

?>