<?php include 'header.php'; ?>
<?php $page=6;include 'sidebar.php'; ?>
   <?php include 'nav.php'; ?>
<?php  
if(isset($_POST['batch_id'])){
     $id = $_POST['batch_id'];
    $data = array('batch_id'=> $id);
    # Create a connection
    $url = 'http://localhost/yogaProject/view_edit_batch_api.php';
    $ch = curl_init($url);
    # Form data string
    $postString = http_build_query($data, '', '&');
    # Setting our options
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    # Get the response
    $content = curl_exec($ch);
   // print_r($content);
    $batch_detail = json_decode($content);
    $batch_view = $batch_detail->batch_view[0];
   
    
    

}
?>



<div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Batches</h4>
									<p class="category">Fill up the Required Batch</p>
	                            </div>
	                            <div class="card-content">
	                                <form action="edit_batch_api.php" method="post">
	                               
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $batch_view->batch_name;?> " name="batch_name">
												</div>
	                                        </div>
	                               

                                        
	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Time</label>
                                                    <input type="text" class="form-control" value="<?php echo $batch_view->batch_timing;?> " name="batch_timing">
												</div>
	                                        </div>
	                                    </div>
                                        
                                         <input type="hidden" value="<?php echo $batch_id; ?>" name="batch_id"> 
                                        <button type="submit" class="btn btn-primary pull-right" name="submit">Edit</button>
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
