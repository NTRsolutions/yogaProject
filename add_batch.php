<?php
// Start the session
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

     <div class="content">
	            <div class="container-fluid">
	                <div class="row">
                        <?php 
                    include 'config.php';
                    if(isset($_POST['submit'])){ 
                    if(isset($_POST['batch_name']) && isset($_POST['batch_timing'])){

                         $batch_name = $_POST['batch_name'];
                         $batch_timing = $_POST['batch_timing'];
                         $data = array(
                            'batch_name' => $_POST['batch_name'],
                            'batch_timing' => $_POST['batch_timing'],
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
	                               
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Name</label>
													<input type="text" class="form-control" name="batch_name" required>
												</div>
	                                        </div>
	                               

                                        
	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Time</label>
													<input type="text" class="form-control" name="batch_timing" required>
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

