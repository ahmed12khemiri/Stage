<?php require './includes/common.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }
    $email=$_SESSION['email'];
    $old_pass=md5(mysqli_real_escape_string($con,$_POST['old']));
    
    $fetch="select password from users where email='$email'";
    $run=  mysqli_query($con, $fetch) or die(mysqli_error($con));
    $row=  mysqli_fetch_array($run);
   
    

    
    if(strcmp($old_pass,$row['password'])==0){
        $new_pass=md5(mysqli_real_escape_string($con,$_POST['new']));
        $rety_pass=md5(mysqli_real_escape_string($con,$_POST['confirm']));

        


        if(strcmp($new_pass,$rety_pass)!=0){
            echo'<script type=text/javascript>alert("Password don\'t match")</script>';
            echo'<script>location.href="change_password.php"</script>';
        }
        else{
            $update="update users set password='$rety_pass' where email='$email'";
            $query_run=  mysqli_query($con, $update)or die(mysqli_error($con));
            echo'<script type=text/javascript>alert("Votre Mot de passe a était mis à jour avec succès !!")</script>';
            echo '<script> window.location ="index.php";</script>';
        }
    }
    else{
        echo'<script type=text/javascript>alert("You have entered the wrong password")</script>';
        echo'<script>location.href="change_password.php"</script>';
    }
?>

