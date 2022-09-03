<?php
    require './includes/common.php';
    $name=  mysqli_escape_string($con,$_POST['name']);
    $email=  mysqli_escape_string($con, $_POST['email']);
    $password=mysqli_escape_string($con, $_POST['password']);
    $phone=$_POST['phone'];
    $pattern_email="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
    

    
    if(preg_match($pattern_email,$email)){

        

        $email_query="select id from users where email='$email'";
        $email_run=  mysqli_query($con, $email_query) or die(mysqli_error($con));
        $email_rows=  mysqli_num_rows($email_run);
        
        if($email_rows>0){ 
            
            echo '<script type="text/javascript">alert("Email address is already registered!");</script>';
            echo "<script>location.href = 'signup.php';</script>";
        } else{
            if(strlen($password)<6){ 
                
                echo '<script type="text/javascript">alert("Password length is too small!");</script>';
                echo "<script>location.href = 'signup.php';</script>";
            }
            else{
                $pass=md5($password); 
                
                if(strlen($phone<10)){ 
                    
                   echo '<script type="text/javascript">alert("Contact number is invalid!");</script>'; 
                   echo "<script>location.href = 'signup.php';</script>";
                }
                else{
                    
                    
                    $insert_query="Insert into expense_manager.users (name,email,password,phone)"
                            . " values('$name','$email','$pass','$phone') ";
                    $insert_run=  mysqli_query($con, $insert_query) or die(mysqli_errno($con));
                    $_SESSION['id']=  mysqli_insert_id($con);
                    $_SESSION['email']=$email;
                    header('location:homepage.php');
                }
            }
            
        }
    }
    else{
        echo '<script type="text/javascript">alert("Email entered is invalid!");</script>';
        echo "<script>location.href = 'signup.php';</script>";
    }
    
    
?>

