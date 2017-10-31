<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>
<?php include 'header.php'; ?>
<?php  
$batch_id = $_GET['batch_id'];                     
$batch_name = $_GET['batch_name'];                     
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, "http://yoga.classguru.in/batch_detail_api.php?batch_id=$batch_id");
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$client = json_decode($content);

$client_view = $client->client_view;

?>

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
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header" data-background-color="purple">
                        <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search..">
                        <i class="material-icons icon">search</i> 
                        <h4 class="title">Batch Details</h4>
                        <p> Batch ID = <?php echo $batch_id; ?>&nbsp&nbsp&nbsp&nbsp&nbsp Batch Name = <?php echo $batch_name; ?></p>
                    </div>
                </div>
                <div class="card-content">
                    <table class="table table-hover" >
                        <thead class="text-primary">
                            <th>Sr no.</th>
                            <th>Client ID</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Contact</th>
                            
                           
                        </thead>
                        <tbody id="myTable"><?php $i=1;foreach($client_view as $value): ?>
                            <tr>
                                <td><a href="table.php?batch_id=$batch_id"><?php echo $i; $i++; ?></a></td>
                                <td><?php echo $id = $value->c_ID; ?></td>
                                <td><a href="view_client_profile.php?c_id=<?php echo $id; ?>"><?php echo $value->c_name; ?></a></td>
                                <td><a href="view_client_profile.php"><?php echo $value->c_surname; ?></a></td>
                                <td><?php echo $value->contact; ?></td>
                                
                            </tr><?php endforeach; ?>
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
else {header('Location: index.php');}// echo "<h1>No User Logged In</h1>";
?>
