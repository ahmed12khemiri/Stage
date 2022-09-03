<?php require './includes/common.php'; ?>
<head>
        <title>Easy-Budget</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <style>
            .success{
                background-color: #115c52;
                color:white;
            }
        </style>
    </head>
    <body style='background-color: #f5fcff'>
        <?php include './includes/header.php'; ?>
        <div class="conatiner" style="padding-top: 100px">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <center><h3>Changez votre Mot de passe</h3></center>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="password_script.php">
                                Ancien  mot de passe <br>
                                <input type="password" name="old" placeholder="Ancien  mot de passe" class="form-control form-group" required>
                                Nouveau mot de passe<br>
                                <input type="password" name="new" placeholder="Nouveau mot de passe" class="form-control form-group" required>
                                Confirmez votre mot de passe<br>
                                <input type="password" name="confirm" placeholder="Confirmez votre mot de passe" class="form-control form-group" required>
                                <button class="btn success btn-block">Changer</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
        <?php include './includes/footer.php';?>
    </body>
</html>


