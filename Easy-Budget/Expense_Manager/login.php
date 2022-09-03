<?php require './includes/common.php';?>
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
    <body>
        <?php include './includes/header.php'; ?>
        

        <div class="conatiner" style="padding-top: 100px">
            <div class="row">
                <div class=" col-xs-offset-4 col-xs-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <center><h3>Se connecter</h3></center>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="login_script.php">
                                Email :<br>
                                <input type="email" name="email" placeholder="Email" class="form-control form-group" required>
                                Mot de passe :<br>
                                <input type="password" name="password" placeholder="Mot de passe" class="form-control form-group" required>
                                <button class="btn btn-lg-active btn-success btn-block">Se connecter</button>
                            </form>
                        </div>
                        <div class="panel-footer">
                            <p><center>Pas de compte ?<a href='signup.php'> Cliquez ici pour vous inscrire</a></center></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './includes/footer.php';?> 
        
        
    </body>
</html>
