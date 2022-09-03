<?php require './includes/common.php';
error_reporting(E_ERROR | E_PARSE);
$em=$_SESSION['email'];



$select_id="select id from users where email='$em'";
$query_run=mysqli_query($con,$select_id) or die(mysqli_error($con));
$row_id=  mysqli_fetch_array($query_run) or die(mysqli_error($con));
$id=$row_id['id'];




$select_bid_query="select * from budget_plan bp where bp.user_id ='$id'";
$query_bud_res=  mysqli_query($con, $select_bid_query) or die(mysqli_error($con));
$fetch=mysqli_fetch_array($query_bud_res);
$no_of_rows=  mysqli_num_rows($query_bud_res);

if($no_of_rows>0){ 
    
    $budget=$fetch['initial_budget'];
    $title=$fetch['title'];
    $pep=$fetch['people'];
    $frm=$fetch['from_date'];
    $to=$fetch['to_date'];
}
?>
<html>
    <head>
        <title>Easy-budget
</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <style>
            .success{
                color:#115c52;
                border-color:#115c52;
                background-color: white;
            }
        </style>
    </head>
    <body style='background-color: #f5fcff'>
        <?php include './includes/header.php';
            if($no_of_rows==0){ ?> 
            
                <h2 style="padding-top: 4%;padding-left:10%">Vous n'avez aucun plan actif</h2>
                <div class='container'>
                    <div class='row' >
                        <center>
                            <div class='col-xs-6 col-xs-offset-3'style="padding-top:10%">
                                <div class='panel panel-default' style=" width: 40%">
                                    <div class='panel-body' style='height:25%'>
                                        <a href='create_new_plan.php' style="text-decoration: none">
                                        <span class="glyphicon glyphicon-plus-sign" style='padding-top: 30%'></span>Creer un nouveau Plan</a>    
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div>
                </div>
            <?php }else{?>
                <h2 style="padding-left:13%;padding-top: 50px">Vos Plans</h2>
                
                <?php while($no_of_rows--){ ?> 
                <div class="conatiner">
                <div class="row" style='width:80%;height:30%'>
                <div class="col-xs-4 col-xs-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:#115c52;color:white">
                            <div class='row'>
                                <div class='col-xs-6 col-xs-offset-1'>
                                    <?php echo $title;?>
                                </div>
                                <div class='col-xs-2'style="float:right">
                                    <span class='glyphicon glyphicon-user'></span> <?php echo $pep;?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class='row'>
                                <div class='col-xs-3 '>
                                    <strong>Budget</strong>
                                </div>
                                <div class='col-xs-offset-3 col-xs-6'>
                                     <?php echo $budget; ?>  TND
                                </div>
                            </div>
                            <br>
                            <div class='row'>
                                <div class='col-xs-3 '>
                                    <strong>Date</strong>
                                </div>
                                <div class='col-xs-offset-1 col-xs-8'>
                                    <?php echo date('jS F',strtotime($frm))."-".date('jS F Y',strtotime($to)); ?>
                                </div>
                            </div>
                            <br>
                            <div class='row'>
                                <div class='col-xs-12'>
                                    <button type="submit" class="btn btn-block success" 
                                        onclick="window.location.href ='view_plan.php?title=<?php echo $title; ?>'">Details </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
                <?php $fetch=mysqli_fetch_array($query_bud_res);
                        $budget=$fetch['initial_budget'];
                        $title=$fetch['title'];
                        $pep=$fetch['people'];
                        $frm=$fetch['from_date'];
                        $to=$fetch['to_date'];
                 }  ?>
                <a href='create_new_plan.php' style="text-decoration: none;position:fixed;bottom:60px;right:40px; font-size:40px;color:#115c52">
                    <span class=" glyphicon glyphicon-plus-sign"></span></a>
            <?php }include './includes/footer.php'; ?>
    </body>
</html>