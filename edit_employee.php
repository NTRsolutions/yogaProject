<?php include 'config.php'; ?>
<?php include 'header.php'; ?>
<?php $page=3;include 'sidebar.php'; ?>
<?php include 'nav.php'; ?>
<?php  
if(isset($_POST['e_ID'])){
     $eid = $_POST['e_ID'];
    $data = array('e_ID'=> $eid);
    # Create a connection
    $url = 'http://localhost/yogaProject/view_edit_employee_api.php';
    $ch = curl_init($url);
    # Form data string
    $postString = http_build_query($data, '', '&');
    # Setting our options
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    # Get the response
    $content = curl_exec($ch);
    $employee_detail = json_decode($content);
    $e_view = $employee_detail->employee_view[0];
   // echo $c_view->c_name;
}
?><!--
    
   # Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://localhost/yogaproject/view_batch_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$batch = json_decode($content);
$batch_view = $batch->batch_view;
}-->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Edit Employee</h4>
                            <p class="category">Fill up the Employee Form</p>
                        </div>
                        <div class="card-content">
                            <form action="add_client.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Name </label>
                                            <input type="text" class="form-control" value="<?php echo $e_view->e_name;?> " name="e_name">
                                                                                        
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Surname </label>
                                            <input type="text" class="form-control" value="<?php echo $e_view->e_surname;?> " name="e_surname">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">salary</label>
                                            <input type="text" class="form-control" value="<?php echo $e_view->salary;?> " name="salary">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Contact</label>
                                            <input type="text" class="form-control" value="<?php echo $e_view->salary;?> " name="contact">
                                        </div>
                                    </div>
	                            </div>
                                
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Address</label>
                                     <textarea rows="3" cols="30" name="c_address" value="<?php echo $e_view->e_address;?> " class="form-control"></textarea> 
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <button type="submit" name="submit"class="btn btn-primary pull-right">Done</button>
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
