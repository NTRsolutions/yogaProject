<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>
<?php  
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
            }
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
    #inlist{
        overflow: hidden;
        word-wrap:normal |break-word;
    }

    
    .dropdown-menu_1 {
  position: relative;
}
    
    #drop_style{
      min-width: 50px!important; 
    }
  
    .dropdown-toggle_1 {
       float:left;
       margin-top:20px;
}
   
</style>


<?php $page=2;include 'sidebar.php'; ?>
<?php $nav=2;include 'nav.php'; ?>
<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://yoga.classguru.in/view_client_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$client = json_decode($content);
$client_view = $client->client_view;
    //print_r($client_view);
?>	   
<div class="content">
    <div class="container-fluid">
        <div class="row">
<!--card for add client,client payment,client attendance-->
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
<!--tabular form information of client form database-->
                <div class="card card-plain">
                    <div class="card-header" data-background-color="purple">
                        <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search..">
                        <i class="material-icons icon">search</i> 
                        <h4 class="title">Client Details</h4>
                    </div>
                    
                    <div class="card-content table-responsive">
                    <table id="inlist" class="table table-hover table-striped">
                            <thead class="text-primary">
                                <th>Sr no.</th>
                                <th>Client ID</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Contact</th>
                                <th>Batch Name</th>
                                <th>Status</th>
                                <th></th>
                                  <th></th>
                            </thead>
                            <tbody id="myTable"><?php $i=1; foreach($client_view as $value ): foreach($batch_view as $value1 ):
                            if ($value->batch_id == $value1->batch_id){?>
                                <tr>
                                    <td><?php echo $i;$i++; ?></td>
                                    <td><?php echo $id = $value->c_ID; ?></td>
                                    <td><a href='view_client_profile.php?c_ID=<?php echo $id;?>'><?php echo $value->c_name; ?></a></td> 
                                    <td><a href='view_client_profile.php?c_ID=<?php echo $id;?>'><?php echo $value->c_surname; ?></a></td> 
                                    <td><?php echo $value->contact; ?></td>
                                    <td><?php echo $value1->batch_name;  ?></td>
                                    <?php if($value->status_payment == 'Inactive'){ ?>
                                    <td><font style="color:red"><?php echo $value->status_payment;?></font></td>
                                    <?php }?>
                                    <?php if($value->status_payment == 'Active'){ ?>
                                    <td><font style="color:green"><?php echo $value->status_payment;?> </font></td>
                                    <?php }?>
                           
<!--user access control form edit button-->                                   
                    <?php if((($_SESSION['permission']== 'admin' ||'superadmin') || ($_SESSION['permission']== 'operator'))&&($_SESSION['permission'] != 'user' )){?>        
                        <form action="edit_client.php" method="POST">
                            <input value="<?php echo $value->c_ID;?>" type="hidden" name="c_ID">
                            <td style="width:20px!important;"> <input style="width:50px; height:28px;" src="assets/img/edit.png" class="btn btn-xs btn-warning" type="image" alt="submit" value="">
                            </td>
                        </form>
                    <?php }?>
<!--user access control form delete button-->                                       
                    <?php  if(($_SESSION['permission'] == 'admin' || 'superadmin' )&&(($_SESSION['permission']!='operator')&&($_SESSION['permission']!= 'user'))){?>    
                        <td>
                            <div class="dropdown">
                                <button  class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle_1" type="button" data-toggle="dropdown"><i class="material-icons">delete</i>
                                <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu_1" id="drop_style">


                                <li><a tabindex="-1" href='delete_client_api.php/?c_ID=<?= $id;?>'>Yes</a></li>
                                <li><a tabindex="-1" href="#">No</a></li>
                                </ul>
                            </div>
                        </td> <?php }  ?>
                   
                                </tr><?php } endforeach;?><?php endforeach;?>
                                </tbody>
                        </table>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
<!--include footer ,serch script ...add end of session-->
<?php include 'footer.php'; ?>
<?php include 'tablesearch_script.php'; ?>
<?php include 'script_include.php'; ?>
<?php
}
else 
    header('Location: index.php');
    //echo "<h1>No User Logged In</h1>";
?>
