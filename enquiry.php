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
									<p class="category">Fill up the enquiry Form</p>
	                            </div>
	                            <div class="card-content">
	                                <form action="add_employee.php" method="post">
	                                        <div class="row">
	
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Name </label>
													<input type="text" class="form-control" name="e_name">
												</div>
	                                        </div>
	                                  
                                                  <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Token Number </label>
													<input type="text" class="form-control" name="e_surname">
												</div>
	                                        </div>
                                        </div>
                                        
                                        
	                                     <div class="row">
	
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Email</label>
													<input type="text" class="form-control" name="e_salary">
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
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Message</label>
                                    <textarea rows="3" cols="30" name="e_address"  class="form-control"></textarea> 
                                        </div>
                                    </div>
                                           
                                          
                                           
                                </div>
                                 
                                        <button type="submit" name="submit"class="btn btn-primary pull-right">Add</button>
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
