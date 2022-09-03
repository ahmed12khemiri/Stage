<?php require './includes/common.php';
$em=$_SESSION['email'];
$select_id="select id from users where email='$em'";
$query_run=mysqli_query($con,$select_id) or die(mysqli_error($con));
$row_id=  mysqli_fetch_array($query_run) or die(mysqli_error($con));
$id=$row_id['id'];
$title=$_GET['title'];

$select_bid_query="select * from budget_plan bp where bp.user_id ='$id' and title='$title'";
$query_bud_res=  mysqli_query($con, $select_bid_query) or die(mysqli_error($con));
$fetch=mysqli_fetch_array($query_bud_res);
$b_id=$fetch['id'];
$budget=$fetch['initial_budget'];
$pep=$fetch['people'];
$frm=$fetch['from_date'];
$to=$fetch['to_date'];
?>
<html>
    <head>
        <title>Easy-Budget </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
       
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/index.css">
    </head>
    <body style='background-color: #f5fcff;overflow-y: scroll; width: 100%;height: 100%;' class="container">
        <?php include './includes/header.php';?>
        <div class="container col-xs-7" style="padding-top:6%">
                <div class="row" style='height:30%;width: 190%'>
                    <div class="col-xs-offset-1 col-xs-4">
                   
                    
                        <div class="panel panel-default">
                            <div class="panel-heading" style="background-color:#115c52;color:white">
                                <div class='row'>
                                    <div class='col-xs-8'>
                                        <center><?php echo $title;?></center>
                                    </div>
                                    <div class=' col-xs-6'>
                                        <span class='glyphicon glyphicon-user'></span> <?php echo $pep;?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class='row'>
                                    <div class='col-xs-7 '>
                                        <strong>Budget</strong>
                                    </div>
                                    <div class='col-xs-6'>
                                        <p><?php echo $budget; ?> TND</p>
                                    </div>
                                </div>

                                <div class='row'>
                                    <div class='col-xs-8 '>
                                        <strong>Montant restant</strong>
                                    </div>
                                    <div class='col-xs-6'>
                                        <?php
                                            
                                            
                                            $name_query="select * from person_details where bud_id='$b_id'";
                                            $query_res=mysqli_query($con,$name_query) or die(mysqli_error($con));
                                            $n=$pep;
                                            $sum=0;
                                            while($n--){ 
                                                $name_res=  mysqli_fetch_array($query_res) or die(mysli_error($con));
                                                $sum=$sum+$name_res['expense'];
                                                $amt=$budget-$sum; 
                                            } 
                                                if($amt>0){ ?>
                                                    <p style="color:green"> <?php echo $amt;?> TND</p>
                                                <?php } elseif ($amt<0) { ?>
                                                    <p style="color:red"> <?php echo $amt;?> TND</p>
                                                <?php } else{ ?>
                                                    <p style="color:black"> <?php echo $amt;?> TND</p>
                                                <?php } ?>      
                                    </div>
                                </div>

                                <div class="row">
                                    <div class='col-xs-3 '>
                                        <strong>Date</strong>
                                    </div>
                                    <div class='col-xs-6' style='float:right'>
                                        <p style='float:right'><?php echo date('jS F',strtotime($frm))."-".date('jS F Y',strtotime($to)); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row">
                <?php
      
      
                    $select_pid="select * from person_details where bud_id=$b_id";
                    $pid_run=  mysqli_query($con,$select_pid) or die(mysqli_error($con));
                    $m=$pep;
                    while($m--){
                        $fetch_pid=mysqli_fetch_array($pid_run);
                        $pid=$fetch_pid['id'];
                        $name=$fetch_pid['name'];
                        $select_qu="select * from add_expense where p_id=$pid order by id asc";
                        $run=mysqli_query($con,$select_qu) or die(mysqli_error($con));
                        $pid_rows=mysqli_num_rows($run);
                        while($pid_rows--){
                            $info_query=mysqli_fetch_array($run);
                            $title1=$info_query['title'];
                            $exp=$info_query['expense'];
                            $date=$info_query['date'];
                            $bill=$info_query['bill'];?>
                <div class="col-xs-5">
                    <div class="panel panel-default"style="margin-bottom:40px;">
                        <div class="panel-heading" style="background-color:#115c52;color:white">
                            <center><h4><?php echo $title1; ?></h4></center>
                        </div>
                        <div class="panel-body">
                                <div class='col-xs-6'style="margin-bottom: 10px">
                                    <strong>Montant</strong>
                                </div>
                                <div class='col-xs-offset-4'>
                                    <p style="float: right"> <?php echo $exp; ?> TND</p>
                                </div>
                            <div class='col-xs-6' style="margin-bottom: 10px">
                                    <strong>Payé par</strong>
                                </div>
                                <div class='col-xs-offset-4'>
                                    <p style="float:right"><?php echo $name; ?></p>
                                </div>
                                <div class='col-xs-6'>
                                    <strong>Payé le</strong>
                                </div>
                                <div class='col-xs-offset-4'>
                                    <p style="float:right"><?php echo date('jS F-Y',strtotime($date)); ?></p>
                                </div>
                        </div>
                        <div class="panel-footer" style="text-align: center;border:none;background-color: white">
                            <?php
                                if($bill=='0'){
                                    ?><p style="color:#115c52">Pas de facture</p> <?php
                                }
                                else{ ?>
                              
                              
                               <a data-toggle="modal" href="#myModal"style="color:#115c52;text-decoration: none">Voir Facture</a>
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body" style="background-color: rgba(0,0,0,0.7)">
                                                    <img src="<?php echo $bill;?>"  alt="no image form!!" height="50%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                <?php }
                            ?>     
                        </div>
                    </div>
                </div>
                        <?php }
                     }
                    ?>
            </div>
        </div>
        <div class="container col-xs-5">
            <div>

            
                <button style="border-color:#115c52;color:#115c52;background-color: white;margin-top: 100px;margin-bottom: 100px;" 
                        class="btn" onclick="window.location.href ='expense_distribution.php?title=<?php echo $title; ?>'">
                        Répartition des dépenses</button>
            </div>
            <div class="col-xs-10">
                <div class="panel panel-default">
                    <div class="panel-heading" style='background-color:#115c52;color:white '>
                      
                    
                        <center><h3>Ajouter une nouvelle dépense</h3></center>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="add_new_expense.php"  enctype="multipart/form-data" >
                            <input type="hidden" name="budget_title" value="<?php echo $title; ?>">
                            <strong>Titre</strong><br>
                            <input type="text" name="title" placeholder="Titre de dépense" class="form-control form-group" required>
                            <strong>Date</strong><br>
                            <input type="date" name="date" placeholder="dd/mm/yyyy" class="form-control form-group"
                                   min="<?php echo $frm; ?>" max="<?php echo $to; ?>" required>
                            <strong>Montant dépensé</strong><br>
                            <input type="number" name="amount" placeholder="montant " class="form-control form-group"
                                   pattern="[0-9]+" required>
                            <select class="form-control form-group" name="name" required> 
                              
                            
                                <option disabled selected value>Choisir</option>
                                <?php 
                                
                                    $name_query="select * from person_details where bud_id='$b_id'";
                                    $query_res=mysqli_query($con,$name_query) or die(mysqli_error($con));
                                    $n=$pep;
                                    while($n--){ 
                                        $name_res=  mysqli_fetch_array($query_res) or die(mysli_error($con));?>
                                        <option><?php echo $name_res['name']; ?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                            <strong>Télécharger la facture</strong><br> 
                            <input type="file" class="sample-class form-control form-group" name="uploadedimage">
                            <button class="btn btn-block form-control form-group" style="border-color:#115c52;color:#115c52;background-color: white">Ajouté</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <div style="margin-left:-15px;">
        <?php include './includes/footer.php';?>
    </div>
</html>

