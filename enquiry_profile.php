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
    curl_setopt( $ch, CURLOPT_URL, "http://yoga.classguru.in/view_enquiry_profile_api.php");
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
	                                <form action="edit_enquiry.php" method="post">
	                                    <div class="row">
	                                        <div class="col-md-4">
                                            
												<div class="form-group label-floating">
													<strong class="text-primary">Token No:&nbsp&nbsp&nbsp&nbsp</strong>
													<?php echo $tokenid = $detail_enquiry->token_no; ?>
												</div>
	                                        </div>
                                        
	                                        <div class="col-md-4">
                                            
												<div class="form-group label-floating">
													<strong class="text-primary">Date:&nbsp&nbsp&nbsp&nbsp</strong>
													<?php echo $detail_enquiry->date; ?>
												</div>
	                                        </div>
                                            <div class="col-md-4">
                                            
												<div class="form-group label-floating">
													<strong class="text-primary">FollowUp Date:&nbsp&nbsp&nbsp&nbsp</strong>
													<?php echo $detail_enquiry->followupdate; ?>
												</div>
	                                        </div>
                                        </div>
                                         <hr>
                                        
                                             <div class="row">

	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<strong class="text-primary">Name:&nbsp&nbsp&nbsp&nbsp</strong>
												    <?php echo $detail_enquiry->name; ?>
												</div>
	                                        </div>
                                         <div class="col-md-6">
												<div class="form-group label-floating">
													<strong class="text-primary">Email Address:&nbsp&nbsp&nbsp&nbsp</strong>
													<?php echo $detail_enquiry->email; ?>
												</div>
	                                        </div>
                                             
                                        </div> 
                                        
                                        <hr>
                                         

	                                             
                                     
                                         
                                        
                                                 
	                                        <div class="row">

	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<strong class="text-primary">Contact:&nbsp&nbsp&nbsp&nbsp</strong>
												    <?php echo $detail_enquiry->contact; ?>
												</div>
	                                        </div>
                                        
                                            
	                                         
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<strong class="text-primary">Message:&nbsp&nbsp&nbsp&nbsp</strong>
													<?php echo $detail_enquiry->message; ?>
												</div>
	                                        </div>
                                                   
                                        </div>    
                                      <hr>
                                        <input type="hidden" name="tokenid" value="<?php echo $tokenid;?>" >
	                                    <button type="submit" class="btn btn-primary pull-right">Update Enquiry</button>
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
