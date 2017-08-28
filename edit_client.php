<?php include 'config.php'; ?>
<?php include 'header.php'; ?>
<?php $page=2;include 'sidebar.php'; ?>
<?php $nav=2;include 'nav.php'; ?>
<?php  
if(isset($_POST['c_id'])){
     $cid = $_POST['c_id'];
    $data = array('c_id'=> $cid);
    # Create a connection
    $url = 'http://localhost/yogaProject/view_edit_client_api.php';
    $ch = curl_init($url);
    # Form data string
    $postString = http_build_query($data, '', '&');
    # Setting our options
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    # Get the response
    $content = curl_exec($ch);
    $client_detail = json_decode($content);
    $c_view = $client_detail->client_view[0];
   // echo $c_view->c_name;
    
    
   # Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://localhost/yogaproject/view_batch_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$batch = json_decode($content);
$batch_view = $batch->batch_view;
}
/*if(isset($_POST['edit'])){
     
     $c_name = $_POST['c_name'];
     $c_surname = $_POST['c_surname'];
     $c_fees = $_POST['c_fees'];
     $c_contact = $_POST['c_contact'];
     $c_address = $_POST['c_address'];
    
    $data = array(
        'c_id' => $_POST['c_id'],
        'c_name' => $_POST['c_name'],
        'c_surname' => $_POST['c_surname'],
        'c_fees' => $_POST['c_fees'],
        'c_contact' => $_POST['c_contact'],
        'c_address' => $_POST['c_address']
        //'batch' => $_POST['batch']
    );
    # Create a connection
    $url = 'http://localhost/yogaProject/edit_client_api.php';
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
     
    
}*/
?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Edit Client</h4>
                            <p class="category">Edit Client Detail</p>
                        </div>
                        <div class="card-content">
                            <form action="edit_client_api.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Name</label>
                                            <input type="text" class="form-control" value="<?php echo $c_view->c_name;?> " name="c_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">surname</label><input type="text" class="form-control" value="<?php echo $c_view->c_surname;?>" name="c_surname"> 
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Fees</label>
                                            <input type="text" class="form-control" value="<?php echo $c_view->fees;?>" name="c_fees">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Contact</label>
                                            <input type="text" class="form-control" value="<?php echo $c_view->contact;?>" name="c_contact">
                                        </div>
                                    </div>
	                            </div>
                                
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Address</label>
                                     <textarea rows="3" cols="30" name="c_address"  class="form-control"><?php echo $c_view->address;?></textarea> 
                                        </div>
                                    </div>
                                    
                                      <div class="col-md-6">
                                     <div class="dropdown">
                                        
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                 <p class="hidden-lg hidden-md">Notifications</p>
								</a>
<?php foreach($batch_view as $value){if($c_view->batch_name == $value->batch_name){ $id = $value->batch_id;}}?>
                             <label for="business">Select Batch:</label>
                             <select name="batch">
                                 <li>
                                            <option value="<?php echo $id;?>"><?php echo $c_view->batch_name;?></option>
                                 </li>
                                 <?php foreach($batch_view as $value): ?>
                                 <li>
                                            <option value="<?php echo $value->batch_id;?>"><?php echo $value->batch_name;?></option>
                                 </li>

									<?php endforeach; ?>
                             </select>
                                    
								                                        
                         </div>                                  </div> 
                                    
                                </div>
                                <input type="hidden" value="<?php echo $cid; ?>" name="c_id"> 
                                <button type="submit" name="edit"class="btn btn-primary pull-right">Done</button>
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
