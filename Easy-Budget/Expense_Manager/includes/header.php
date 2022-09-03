<navbar class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand">Easy-budget</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
            <?php if(isset($_SESSION['email'])){?>

                <li><a href="change_password.php"><span class="glyphicon glyphicon-cog"></span> modifier votre mot de passe</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Se Déconnecter
</a></li>
            <?php } else{?>

                <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> S'inscrire</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Se connecté</a></li>
             <?php }?> 
            </ul>
        </div>
    </div>
</navbar>

