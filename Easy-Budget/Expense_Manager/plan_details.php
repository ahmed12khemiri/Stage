<?php
    require './includes/common.php';
?>
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
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="POST" action="plan_script.php">
                                <strong>Titre</strong><br>
                                <input type="text" name="title" placeholder="Entrer Titre (Ex. Ministére)"class="form-control form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <strong>du</strong> <br>
                                        <input type="date" name="from" placeholder="dd/mm/yyyy"
                                               min="2000-04-01" max="2050-04-20" required class="form-control form-group">
                                    </div>
                                    <div class="col-xs-6">
                                        <strong>au</strong> <br>
                                        <input type="date" name="to" placeholder="dd/mm/yyyy" 
                                               min="2000-04-01" max="2050-04-20" required class="form-control form-group">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-8">
                                        <strong>Budget Initial </strong><br>
                                        <input type="number" name="initial" value="<?php echo $_POST['budget']; ?>"
                                               placeholder="<?php echo $_POST['budget']; ?>" class="form-control form-group" readonly/>
                                    </div>
                                    <div class="col-xs-4">
                                        <strong>Nombre de personne</strong> <br>
                                        <input type="number" name="people"value="<?php echo $_POST['people']; ?>"
                                               placeholder="<?php echo $_POST['people']; ?>" class="form-control form-group" readonly/>
                                    </div>
                                </div>
                                <?php
                               
                               

                                $n=$_POST['people'];
                                $c=0;
                                
                                while($n--){
                                    $c++;?>
                                <strong>Personne <?php echo $c;?></strong><br>
                                    <input type="text" name="person[]" placeholder="Personne <?php echo $c;?> " class="form-control form-group">
                                <?php }
                                ?>
                                    
                                <button class="btn btn-block" style="border-color: green;color:green; background-color: white">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './includes/footer.php';?>
    </body>
</html>

