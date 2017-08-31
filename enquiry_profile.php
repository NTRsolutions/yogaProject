<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>

<?php 
if(isset($_GET['enq_id'])){
    $enq_id = $_GET['enq_id'];
    $data = array(
        'enq_id' => $enq_id
    );
    # Create a connection
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, "http://localhost/yogaproject/view_enquiry_profile_api.php");
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
    # Form data string
    $postString = http_build_query($data, '', '&');
    # Setting our options
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
    # Get the response
    $content = curl_exec($ch);
    $enquiry = json_decode($content);
    $enquiry_view = $enquiry->enquiry_view;
    $detail_enquiry = $enquiry_view[0];
    
    
    /*# Create a connection
    $url = 'http://localhost/yogaProject/add_client_api.php';
    $ch = curl_init($url);
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    # Get the response
    $response = curl_exec($ch);
        print_r($response);
    curl_close($ch); */
    
    
    
    
    
    
    
    
} 
?>
<?php include 'header.php'; ?>
<?php $page=7;include 'sidebar.php'; ?>
<?php $nav=6;include 'nav.php'; ?>

      <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-8">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Enquiry</h4>
									<p class="category">Here goes Details of Enquiry</p>
	                            </div>
	                            <div class="card-content">
	                                <form>
	                                    <div class="row">
	                                        <div class="col-md-4">
                                            
												<div class="form-group label-floating">
													ID:
													<?php echo $detail_enquiry->token_no; ?>
												</div>
	                                        </div>
                                        
	                                        <div class="col-md-4">
                                            
												<div class="form-group label-floating">
													Date:
													<?php echo $detail_enquiry->date; ?>
												</div>
	                                        </div>
                                        </div>
                                         
                                        
                                             <div class="row">

	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													Name:
												    <?php echo $detail_enquiry->name; ?>
												</div>
	                                        </div>
                                        

	                                    
	                                        
                                                 
                                        </div> 
                                        
                                        
                                         <div class="row">

	                                     <div class="col-md-4">
												<div class="form-group label-floating">
													Email Address:
													<?php echo $detail_enquiry->email; ?>
												</div>
	                                        </div>
                                                 
                                        </div> 
                                         
                                        
                                                 
	                                        <div class="row">

	                                        <div class="col-md-12">
												<div class="form-group label-floating">
													Contact:
												    <?php echo $detail_enquiry->contact; ?>
												</div>
	                                        </div>
                                        

	                                    
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													Message:
													<?php echo $detail_enquiry->message; ?>
												</div>
	                                        </div>
                                                
                                                
	                                        
                                            
                                                 
                                        </div>    
                                            
	                                  
	                                   

	                                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
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
