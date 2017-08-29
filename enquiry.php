<?php include 'header.php'; ?>
  <?php $page=7;include 'sidebar.php'; ?>
   <?php $nav=6;include 'nav.php'; ?>
    <div class="content">
        
        
        <?php  
//# Create a connection
//$ch = curl_init();
//curl_setopt( $ch, CURLOPT_URL, 'http://localhost/yogaproject/view_enquiry_api.php');
//curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
//# Get the response
//$content = curl_exec($ch);
//$enquiry = json_decode($content);
//$enquiry_view = $enquiry->enquiry_view;

//$batch_view = $batch->batch_view;
?>

<?php include 'config.php'; ?>


    <div class="content">
        <div class="container-fluid">
            <?php 
            if(isset($_POST['submit'])){ 
                if(isset($_POST['e_token']) && isset($_POST['e_name']) && isset($_POST['e_mail']) && isset($_POST['e_contact']) &&isset($_POST['e_message'])){
                    $data = array(
                        'token_no' => $_POST['e_token'],
                        'name' => $_POST['e_name'],
                        'email' => $_POST['e_mail'],
                        'contact' => $_POST['e_contact'],
                        'message' => $_POST['e_message']                        
                    );
                    # Create a connection
                    $url = 'http://localhost/yogaProject/enquiry_api.php';
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
            <div class="container-fluid">
                    
                         <div class="row">
                              <div class="col-lg-4 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="orange">
                                    <i class="material-icons">sms</i>								
                                </div>
                                <div class="card-content">
									<p class="category">Enquiry</p>
								</div>
								<div class="card-footer">
									<div class="stats">
										<a href="enquiry_table.php"><i class="material-icons">plus_one</i> Enquiry Information</a> 
								
									</div>
								</div>
							</div>
						</div>
                          </div>

                    <div class="row">
	                    <div class="col-md-8">
	                        <div class="card">
                                <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Enquiry</h4>
									<p class="category">Fill up the enquiry Form</p>
	                            </div>
	                            <div class="card-content">
	                                <form action="enquiry.php" method="post">
	                                        <div class="row">
	
	                                        <div class="col-md-6">
                                                <div class="form-group label-floating">
													<label class="control-label">Token Number</label>
													<input onkeyup="allnumeric(e_token)" type="text" class="form-control validnumber" name="e_token" required>
												</div>
	                                        </div>
	                                  
                                                <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Name</label>
													<input onkeyup="allLatters(e_name)" type="text" class="form-control validName" name="e_name" required>
												</div>
	                                        </div>
                                        </div>
                                        
                                        
                                        <div class="row">
	   
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Email</label>
													<input id="txtEmail"  type="email" class="form-control" name="e_mail" required>
                                                </div>
                                             </div>
	                                    
                                        
                                        
                                         
                                             <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Contact</label>
													<input id="phone" onkeypress="phoneno()" maxlength="10" type="text" class="form-control"   name="e_contact" required>
                                                </div>
                                             </div>
	                                       
                                        </div>

                                        
                                        <div class="row">
                                           <div class="col-md-6">
                                               <div class="form-group label-floating">
                                            <label class="control-label">Message</label>
                                            <textarea rows="3" cols="30" name="e_message"  class="form-control"     required></textarea> 
                                               </div>
                                            </div>
                                           
                                             <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label"></label>
													<input type="date" value="<?php echo date("Y-m-d"); ?>" class="form-control"   name="e_date" required>
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
     <?php include 'footer.php'; ?>
<?php include 'validation_script.php'; ?>

<?php include 'script_include.php'; ?>
