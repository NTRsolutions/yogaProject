<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>
<?php include 'header.php'; ?>
<?php $page=6;include 'sidebar.php'; ?>
<?php $nav=5;include 'nav.php'; ?>
<?php  
if(isset($_POST['batch_id'])){
    $id = $_POST['batch_id'];
    $data = array('batch_id'=> $id);
    # Create a connection
    $url = 'http://yoga.classguru.in/view_edit_batch_api.php';
    $ch = curl_init($url);
    # Form data string
    $postString = http_build_query($data, '', '&');
    # Setting our options
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    # Get the response
    $content = curl_exec($ch);
    
    $batch_detail = json_decode($content);
    $batch_view = $batch_detail->batch_view[0];
    //print_r($batch_view);
}
?>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Edit Batch</h4>
                        <p class="category">Fill up the Required Batch</p>
                    </div>
                    <div class="card-content">
                        <form action="edit_batch_api.php" method="post">
                             <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Name</label>
                                    <input type="text" class="form-control" value="<?php echo $batch_view->batch_name;?> " name="batch_name" required>
                                </div>
                            </div>
                           
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Time</label>
                                        <input type="text" class="form-control" value="<?php echo $batch_view->batch_timing;?> " name="batch_timing" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                     <div class="form-group label-floating">
                                        <label class="control-label">Trainer</label>
                                        <select style="width:300px; height:40px;" name="e_name">
                                            <option><?php echo $batch_view->e_name;?></option>
                                            <option> ---::---</option><?php foreach($employee_view as $value):?>
                                            <option> <?php echo $value->e_name;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                               
                            </div>
                            
                            <input type="hidden" value="<?php echo $batch_view->batch_id; ?>" name="batch_id">
                            
                            <button type="submit" class="btn btn-primary pull-right" name="submit">Add</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<?php include 'script_include.php'; ?>
<?php
}
else echo "<h1>No User Logged In</h1>";
?>
