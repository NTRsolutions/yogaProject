<?php
/*starting of seesion*/ 
session_start();
if(!empty($_SESSION)){
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

<?php 
include 'config.php';
$id = $_GET['cid'];
$c_name = $_GET['cname'];
$c_surname = $_GET['csurname'];
$sql = "SELECT * FROM client_fitness WHERE c_ID = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
             
  //print_r($id);
?>


<div class="content">
    <div class="container-fluid">
          
   
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card card-plain">
                    <div class="card-header" data-background-color="purple">
                        <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search..">
                        <i class="material-icons icon">search</i> 
                        <h4 class="title">Client fitness Details</h4>
                        <p>Client Id : <?php echo $id; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   Name : <?php echo $c_name; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Surname : <?php echo $c_surname; ?></p>
                    </div>
                </div>
                    <div class="card-content">
                        <form action="client_fitness_api.php" method="post"><h4 >Before</h4>
                            <input type="hidden" value="<?php echo $id; ?>" name="c_ID" />
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating"><label class="control-label"></label>
                                <input type="date" class="form-control" name="date_before" value="<?php print_r($row['date_before']); ?>" required >
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nutritions/Diet</label>
                                    <input type="text" class="form-control" name="Diet_before" value="<?php print_r($row['Diet_before']); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Weight</label>
                                    <input type="text" class="form-control" name="Weight_before" value="<?php print_r($row['Weight_before']); ?>" required>
                                </div>
                            </div>
                         </div>
                            <h4 >After</h4>
                         <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label"></label>
                                    <input type="date" class="form-control" name="date_after" value="<?php print_r($row['date_after']); ?>" >
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">nutritions/Diet</label>
                                    <input type="text" class="form-control" name="Diet_after"  value="<?php print_r($row['Diet_after']); ?>" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Weight</label>
                                    <input type="text" class="form-control" name="Weight_after" value="<?php print_r($row['Weight_after']); ?>" >
                                </div>
                            </div>
                         </div>
                            <h4 >Latest</h4>
                         <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label"></label>
                                    <input type="date" class="form-control" name="date_latest" value="<?php print_r($row['date_latest']); ?>" >
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">nutritions/Diet</label>
                                    <input type="text" class="form-control" name="Diet_latest"  value="<?php print_r($row['Diet_latest']); ?>" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Weight</label>
                                    <input type="text" class="form-control" name="Weight_latest" value="<?php print_r($row['Weight_latest']); ?>" >
                                </div>
                            </div>
                         </div>
                        
                            <button type="submit" class="btn btn-primary pull-right" name="submit">Add</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



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
    <?php include 'footer.php'; ?>
<?php include 'tablesearch_script.php'; ?>
<?php include 'script_include.php'; ?>
<?php
}
else echo "<h1>No User Logged In</h1>";
?>


