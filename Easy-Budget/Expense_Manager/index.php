<!DOCTYPE html>
<?php require './includes/common.php'; ?>
<html>
    <head>
        <title>Easy-Budget</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/index.css">
    </head>
    <body style="overflow-y: hidden">
        <?php include './includes/header.php';?>
        <div id="banner_image">  
            

            <center>
                <div class="container">
                    <div id="banner_content">
                        <h2>Nous vous aidons à maîtriser votre budget</h2>
                        <a <?php if(isset($_SESSION['email'])){
                            echo "href='homepage.php'";
                        } else{ echo "href='login.php'";} ?> class="btn btn-success btn-lg-active">Commencez Aujourd'hui</a>
                    </div>
                </div>   
            </center>
        </div>
        <?php include './includes/footer.php'; ?>
    </body>
</html>
