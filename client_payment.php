<?php include 'header.php'; ?>
  <?php $page=2;include 'sidebar.php'; ?>
   <?php $nav=2;include 'nav.php'; ?>
    <div class="content">
	            <div class="container-fluid">
 

                    <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Client Payment</h4>
									<p class="category">Fill up the payment Form</p>
	                            </div>
	                            <div class="card-content">
	                                <form action="add_employee.php" method="post">
	                                        <div class="row">
	
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Client ID</label>
													<input onkeyup="allnumeric(c_id)" type="text" class="form-control validnumber" name="c_id" required>
												</div>
	                                        </div>
	                                  
                                                  <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label"></label>
													<input type="date" class="form-control" name="e_name" required>
												</div>
	                                        </div>
                                        
                                               
                                           <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Payment Mode</label>
													<input type="text" class="form-control" name="e_name" required>
												</div>
	                                        </div>
                                        </div>
                                        
                                         <div class="row">
	
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Final Amount</label>
													<input type="text" class="form-control" name="c_amount" required readonly>
												</div>
	                                        </div>
	                                  
                                                 
                                               
                                           <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Balance</label>
													<input type="text" class="form-control" name="c_balance" required readonly>
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
