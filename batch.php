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
//print_r($content);
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

<?php $page=6;include 'sidebar.php'; ?>
<?php $nav=5;include 'nav.php'; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Batch<p>
                    </div>  
                    <div class="card-footer">
                        <div class="stats">
                            <a href="add_batch.php">
                                <i class="material-icons">plus_one</i> Add New batch
                            </a>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="card-content">
                        <p class="category">View Trainer<p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="trainer.php">
                                <i class="material-icons">plus_one</i> View Trainer
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Add Trainer<p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="add_trainer.php">
                                <i class="material-icons">plus_one</i> Add New Trainer
                            </a>
                        </div>
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
                        <h4 class="title">Batch Details</h4>
                    </div>
                </div>
                <div class="card-content">
                    <table class="table table-hover">
                        <thead class="text-primary">
                            <th>Sr no.</th>
                            <th>Batch id</th>
                            <th>Name</th>
                            <th>Timings</th>
                            <th>Trainer Name</th>
                        </thead>
                        <tbody id="myTable"><?php $i=1;foreach($batch_view as $value): ?>
                            <tr>
                                <td><?php echo $i; $i++; ?></td><?php  $id = $value->batch_id; ?>
                                <td><a href="batch_detail.php?batch_id=<?php echo $id;?>&batch_name=<?php echo $value->batch_name; ?>"><?php echo $id; ?></a></td>
                                <td><a href="batch_detail.php?batch_id=<?php echo $id;?>&batch_name=<?php echo $value->batch_name; ?>"><?php echo $value->batch_name; ?></a></td>
                                <td><?php echo $value->batch_timing; ?></td>
                                <td><?php echo $value->e_name; ?></td>
                                                <!--<td style="width:20px!important;"><a    href="edit_batch.php" class="btn btn-sm btn-warning">Edit</a></td>
-->
                                <form action="edit_batch.php" method="POST">
                                    <td style="width:20px!important;">
                                            <input value="<?php echo $value->batch_id;?>" type="hidden" name="batch_id">
                                           <input style="width:50px; height:28px;" src="assets/img/edit.png" class="btn btn-xs btn-warning" type="image" alt="submit" value="">
                                    </td>
                                </form>
                                <td style="width:20px!important;">      
                                    <div class="dropdown">
                                        <button style="width:56px;" class="btn btn-sm btn-primary dropdown-toggle"  type="button" data-toggle="dropdown"><i class="material-icons">delete</i>
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="delete_batch_api.php/?b_id=<?= $id?>">Yes confirm</a></li>
                                            <li><a href="#">No</a></li>
                                        </ul>
                                    </div>
                                </td>                                       
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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
