<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>
<?php  /*
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://yoga.classguru.in/view_batch_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$batch = json_decode($content);
$batch_view = $batch->batch_view;

//$batch_view = $batch->batch_view;
            if(isset($_POST['submit']))
            { 
                if(isset($_POST['batch']))
                {
                    $data =array('batch'=>$_POST['batch']);
                }
            }*/
?>
<?php include 'header.php'; ?>
<style>
    #myInput{
        width:20%;
        float:right;
        color:white;
    }
    .form-group{
        padding-bottom: 0px!important;
        margin: 0 0 0 0!important;
    }
    .icon{
    
        float:right;
    }
    
</style>


<?php $page=2;include 'sidebar.php'; ?>
<?php $nav=2;include 'nav.php'; ?>
<?php /* 
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://localhost/yogaproject/view_client_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$client = json_decode($content);
$client_view = $client->client_view;
    //print_r($client_view);*/
?>	   
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Client<p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="add_client.php">
                                <i class="material-icons">plus_one</i> Add new Client
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">touch_app</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Attendance</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="client_attendance.php">
                                <i class="material-icons">plus_one</i> Mark Attendance
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <i class="material-icons">payment</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Payment</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                         <a href="client_payment.php"><i class="material-icons">plus_one</i> Add Payment</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header" data-background-color="purple">
                        <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search..">
                        <i class="material-icons icon">search</i> 
                        <h4 class="title">Client Details</h4>
                    </div>
                    <div class="card-content">
                        <table class="table table-hover">
                            <thead class="text-primary">
                                <th>Sr no.</th>
                                <th>Client name</th>
                                <th>Date</th>
                                <th>Diet</th>
                                <th>weight</th>
                                <th></th>
                                  <th></th>
                            </thead>
                            <tbody id="myTable"><?php /*$i=1; foreach($client_view as $value ): foreach($batch_view as $value1 ):
                            if ($value->batch_id == $value1->batch_id){?>
                                <tr>
                                    <td><?php echo $i;$i++; ?></td>
                                    <td><?php echo $id = $value->c_ID; ?></td>
                                    <td><a href='view_client_profile.php?c_ID=<?php echo $id;?>'><?php echo $value->c_name; ?></a></td> 
                                    <td><a href='view_client_profile.php?c_ID=<?php echo $id;?>'><?php echo $value->c_surname; ?></a></td> 
                                    <td><?php echo $value->contact; ?></td>
                                    <td><?php echo $value1->batch_name;  ?></td>
                                    <?php if($value->status_payment == 'unpaid'){ ?>
                                    <td><font style="color:red"><?php echo $value->status_payment;?></font></td>
                                    <?php }?>
                                    <?php if($value->status_payment == 'paid'){ ?>
                                    <td><font style="color:green"><?php echo $value->status_payment;?> </font></td>
                                    <?php }*/?>
                                    
                                <form action="edit_client.php" method="POST">
                                    <input value="<?php echo $value->c_ID;?>" type="hidden" name="c_ID">
                                    <td style="width:20px!important;"> <input style="width:50px; height:28px;" src="assets/img/edit.png" class="btn btn-xs btn-warning" type="image" alt="submit" value="">
                                    </td>
                                </form>
                                   
                                    <td style="width:20px!important;">
                                        <div class="dropdown">
                                            <button style="width:56px;" class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="material-icons">delete</i>
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href='delete_client_api.php/?c_ID=<?= $id;?>'>Yes</a></li>
                                                <li><a href="#">No</a></li>
                                            </ul>
                                        </div>
                                    </td>                              
                                </tr><?php //} endforeach;?><?php //endforeach;?>
                                </tbody>
                        </table>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<?php include 'tablesearch_script.php'; ?>
<?php include 'script_include.php'; ?>
<?php
}
else echo "<h1>No User Logged In</h1>";
?>
