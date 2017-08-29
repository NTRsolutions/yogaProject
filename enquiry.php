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
	                                <form action="enquiry_table.php" method="post">
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
													<input id="txtEmail" onclick="checkEmail();" type="text" class="form-control validEmail"   name="e_mail" required>
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
