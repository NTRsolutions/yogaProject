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
<?php $page=6;include 'sidebar.php'; ?>
<?php $nav=5;include 'nav.php'; ?>

<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://yoga.classguru.in/view_trainer_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$employe = json_decode($content);
$employee_view = $employe->employee_view;
//print_r($employee_view);
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
            <?php 
                include 'config.php';                 //connect to database
                if(isset($_POST['submit'])){ 
                if(isset($_POST['batch_name']) && isset($_POST['batch_timing'])){

                     $batch_name = $_POST['batch_name'];
                     $batch_timing = $_POST['batch_timing'];
                     $e_name = $_POST['e_name'];
                     $data = array(
                        'batch_name' => $_POST['batch_name'],
                        'batch_timing' => $_POST['batch_timing'],
                        'e_name' => $_POST['e_name']
                    );
                    //print_r($data);
                    # Create a connection
                    $url = 'http://localhost/yogaproject/add_batch_api.php';
                    $ch = curl_init($url);
                    # Form data string
                    $postString = http_build_query($data, '', '&');
                    # Setting our options
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    # Get the response
                    $response = curl_exec($ch);
                    print_r($response);
                    curl_close($ch);    
                    }   
                }  
            ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Batches</h4>
                        <p class="category">Fill up the Required Batch</p>
                    </div>
                    <div class="card-content">
                        <form action="add_batch.php" method="post">
                            <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Name</label>
                                    <input type="text" class="form-control" name="batch_name" required>
                                </div>
                            </div>
                             <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Time</label>
                                        <input type="text" class="form-control"         name="batch_timing" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Trainer</label>
                                        <select style="width:300px; height:40px;" name="e_name"><option> Select trainer</option><?php foreach($employee_view as $value):?>
                                       <option> <?php echo $value->e_name;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right" name="submit">Add Batch</button>
                            <div class="clearfix"></div>
                        </form>
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

