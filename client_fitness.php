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
$sql = "SELECT * FROM client WHERE c_ID = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
             
  //print_r($id);
?>
<?php 
include 'config.php';
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, "http://yoga.classguru.in/view_client_fitness_api.php?cid=$id");
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$client_fitness = json_decode($content);
$client_fitness_view = $client_fitness->client_fitness_view;
$fitness=$client_fitness_view;
                   //  print_r($fitness);
?>


<div class="content">
    <div class="container-fluid">
          
   
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card card-plain">
                    <div class="card-header" data-background-color="purple">
                        <!--<input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search..">
                        <i class="material-icons icon">search</i> -->
                        <h4 class="title">Client fitness Details</h4>
                        <p>Client Id : <?php echo $id; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   Name : <?php echo $c_name; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Surname : <?php echo $c_surname; ?></p>
                    </div>
                </div>
                    <div class="card-content">
                        <form action="client_fitness_api.php" name="bmiForm" method="post">
                            <input type="hidden" value="<?php echo $id; ?>" name="c_ID" />
                            
   
                    <h4 >Latest</h4>
                         <div class="row">
                            <div class="col-md-3">
                                <div class="form-group label-floating">
                                    <label class="control-label"></label>
                                    <input type="date" class="form-control" name="date_latest"  >
                                </div>
                            </div> 
                            <div class="col-md-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">nutritions/Diet</label>
                                    <input type="text" class="form-control" name="Diet_latest"  >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Weight ( KG )</label>
                                    <input type="text" class="form-control" name="Weight_latest" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Height ( CM )</label>
                                    <input type="text" class="form-control" name="height_latest" >
                                </div>
                            </div>  
                         </div>
                        <div class="row">
                            <input type="button" class="btn btn-primary pull-right" value="Calculate BMI" onClick="calculateBmi()"><br />
                            <div class="col-md-3">Your BMI: <input type="text" name="bmi" class="form-control"  size="10"><br /></div>
                            <div class="col-md-6">This Means: <input type="text" class="form-control"  name="meaning" size="25"><br /></div>
                        </div>
                    
                            <button type="submit" class="btn btn-primary pull-right" name="submit">Add</button>
                            <div class="clearfix"></div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header" data-background-color="purple">
                        <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search..">
                        <i class="material-icons icon">search</i> 
                        <h4 class="title">Client Fitness Details</h4>
                    </div>
                    <div class="card-content">
                        <table class="table table-hover">
                            <thead class="text-primary">
                                <th>Sr no.</th>
                                <th>Client name</th>
                                <th>Date</th>
                                <th>Diet</th>
                                <th>weight</th>
                                <th>Height</th>
                                  <th>BMI</th>
                            </thead>
                            <tbody id="myTable"><?php $i=1; foreach($fitness as $value ):{?>
                                <tr>
                                    <td><?php echo $i;$i++; ?></td>
                                    <td><?php echo $c_name; ?></td>
                                    <td><?php echo $value->date_before;echo $value->date_latest; ?></td>
                                   
                                    <td><?php echo $value->Diet_before;echo $value->Diet_latest; ?></td> 
                                    
                                    <td><?php echo $value->Weight_before;echo $value->Weight_latest; ?></td>
                                    
                                    <td><?php echo $value->height_before;echo $value->height_latest;?></td>
                                    
                                    <td><?php  echo $value->bmi;?></td>
                                    
                                    
                                    
                               <!-- <form action="edit_client.php" method="POST">
                                    <input value="<?php echo $value->c_ID;?>" type="hidden" name="c_ID">
                                    <td style="width:20px!important;"> <input style="width:50px; height:28px;" src="assets/img/edit.png" class="btn btn-xs btn-warning" type="image" alt="submit" value="">
                                    </td>
                                </form>-->
                                   <!--
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
                                    </td>  -->                            
                                </tr><?php } endforeach;?><?php //endforeach;?>
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


