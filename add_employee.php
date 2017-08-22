<?php include 'header.php'; ?>
  <?php include 'sidebar.php'; ?>
   <?php include 'nav.php'; ?>



     <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-8">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Add Employee</h4>
									<p class="category">Fill up the employee Form</p>
	                            </div>
	                            <div class="card-content">
	                                <form action="#" method="post">
	                                        <div class="row">
	
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Name </label>
													<input type="text" class="form-control" name="e_name">
												</div>
	                                        </div>
	                                  
                                                  <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Surname </label>
													<input type="text" class="form-control" name="e_surname">
												</div>
	                                        </div>
                                        </div>
                                        
                                        
	                                     <div class="row">
	
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Fees</label>
													<input type="text" class="form-control" name="e_fees">
												</div>
	                                        </div>
	                                    
                                        
                                        
                                         
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Contact</label>
													<input type="text" class="form-control" name="e_contact">
												</div>
	                                        </div>
	                                    
                                        </div>


	                                    <div class="row">
	                                        <div class="col-md-12">
												<div class="form-group label-floating">
													 <label class="control-label">Address</label>
                                                    <textarea rows="4" cols="50" name="e_address"  class="form-control"></textarea>
                                                </div>
	                                        </div>
	                                    </div>
                                        <button type="submit" class="btn btn-primary pull-right">Login</button>
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
