<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>

<?php include 'header.php'; ?>
  <?php $page=3;include 'sidebar.php'; ?>
   <?php $nav=3;include 'nav.php'; ?>
    <div class="content">
	            <div class="container-fluid">
 

                    <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Employee Payment</h4>
									<p class="category">Fill up the payment form</p>
	                            </div>
	                            <div class="card-content">
	                                <form action="add_employee.php" method="post">
	                                        <div class="row">
	
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Employee Id</label>
													<input onkeyup="allnumeric(e_id)" type="text" class="form-control validnumber" name="e_id" required>
												</div>
	                                        </div>
                                                
                                                <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Employee salary</label>
													<input onkeyup="allnumeric(e_salary)" type="text" class="form-control validnumber" name="e_salary" required>
												</div>
	                                        </div>
                                             
	                                  
                                                  <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label"></label>
													<input type="date" class="form-control" name="e_date" required>
												</div>
	                                        </div>
                                        
                                               
                                           <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Payment Mode</label>
													<input type="text" class="form-control" name="e_payment" required>
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
<?php
}
else echo "<h1>No User Logged In</h1>";
?>
