<?php include 'header.php'; ?>
  <?php $page=3;include 'sidebar.php'; ?>
   <?php include 'nav.php'; ?>
<div class="content">
	            <div class="container-fluid">
	                <?php 
                    if(isset($_POST['submit'])){
                        if(isset($_POST['e_name']) && isset($_POST['e_surname']) &&isset($_POST['e_salary']) &&isset($_POST['e_contact']) &&isset($_POST['e_address'])){
                        $data = array(
                            'e_name' => $_POST['e_name'],
                            'e_surname' => $_POST['e_surname'],
                            'e_salary' => $_POST['e_salary'],
                            'e_contact' => $_POST['e_contact'],
                            'e_address' => $_POST['e_address']
                        );
                        # Create a connection
                        $url = 'http://localhost/yogaProject/add_employee_api.php';
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
                    <div class="row">
	                    <div class="col-md-8">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Add Employee</h4>
									<p class="category">Fill up the employee Form</p>
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
													<label class="control-label">Surname </label>
													<input type="text" class="form-control" name="e_surname">
												</div>
	                                        </div>
                                        </div>
                                        
                                        
	                                     <div class="row">
	
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Salary</label>
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
                                            <label class="control-label">Address</label>
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
