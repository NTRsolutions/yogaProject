<?php include 'header.php'; ?>
  <?php include 'sidebar.php'; ?>
   <?php include 'nav.php'; ?>
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
    $url = 'http://localhost:8080/yogaproject/add_batch_api.php';
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



    // output data of each row
/*    while($row = $result->fetch_assoc()) {
        echo "<br> batch_name: ". $row["batch_name"]. " - batch_timing: ". $row["batch_timing"]. "<br>";
    }*/




    
}     $sql = "SELECT * FROM batch";
$result = $conn->query($sql);
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
	                                <form action="add_batch.php" method="post">
	                               
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Name</label>
													<input type="text" class="form-control" name="batch_name">
												</div>
	                                        </div>
	                               

                                        
	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Time</label>
													<input type="text" class="form-control" name="batch_timing">
												</div>
	                                        </div>
	                                    </div>
                                        
                                        
                                        <button type="submit" class="btn btn-primary pull-right" name="submit">Add Batch</button>
	                                    <div class="clearfix"></div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
                        
                        
                        
                              
                               <div class="col-md-12">
	                        <div class="card card-plain">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Add Batches</h4>
	                               <!--  <p class="category">Here is a subtitle for this table</p> -->
	                                <div class="collapse navbar-collapse">
						        <form class="navbar-form navbar-right" role="search">
							           <div class="form-group  is-empty">
								         <input type="text" class="form-control" placeholder="Search">
								          <span class="material-input"></span>
							          </div>
							       <button type="submit" class="btn btn-white btn-round btn-just-icon">
								    <i class="material-icons">search</i><div class="ripple-container"></div>
							      </button>
						       </form>
						</div>
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table table-hover">
	                                    <thead class="text-primary">
	                                        <th>Sr no.</th>
	                                    	<th>Batch</th>
	                                    	<th>Name</th>
	                                    	<th>Timings</th>
	                                    	<th>Employees</th>
	                                    	<th>Name</th>
	                                    </thead>
	                                    <tbody><?php while($row = $result->fetch_assoc()) { ?>
	                                        <tr>
	                                        	<td>1 </td>
	                                        	<td><?php echo $row['batch_id']; ?></td>
	                                        	<td><?php echo $row['batch_name']; ?></td>
	                                        	<td><?php echo $row['batch_timing']; ?></td>
	                                        	<td>Oud-Turnhout</td>
	                                        	<td>Oud-Turnhout</td>
	                                        </tr>
                                            <?php  }?>
	                                        
	                                    </tbody>
	                                </table>
	                   

	                        </div>
	                    </div>

                        
                    
                        
                        
                        
                        
                  </div>
	            </div>
	        </div>
                        
                        
                        
                        
                        
                        
                         
 
	<?php include 'footer.php'; ?>

<?php include 'script_include.php'; ?>
