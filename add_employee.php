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
	                <?php 
                    if(isset($_POST['submit'])){
                        if(isset($_POST['e_name']) && isset($_POST['e_surname']) && isset($_POST['e_salary']) && isset($_POST['e_contact']) && isset($_POST['e_address'])){
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
													<input onkeyup="allLatters(e_name)" type="text" class="form-control validName" name="e_name" required>
												</div>
	                                        </div>
	                                  
                                                  <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Surname </label>
													<input onkeyup="allLatters(e_surname)" type="text" class="form-control validName" name="e_surname" required>
												</div>
	                                        </div>
                                        </div>
                                        
                                        
	                                     <div class="row">
	
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Salary</label>
													<input onkeyup="allnumeric(e_salary)"  type="text" class="form-control validnumber" name="e_salary" required>
												</div>
	                                        </div>
	                                    
                                        
                                        
                                         
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Contact</label>
													<input type="text" class="form-control" name="e_contact" id="phone" onkeypress="phoneno()" maxlength="10" required>
												</div>
	                                        </div>
	                                    
                                        </div>


	                                   <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Address</label>
                                    <textarea rows="3" cols="30" name="e_address"  class="form-control" required></textarea> 
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
     <?php include 'validation_script.php'; ?>
<?php include 'script_include.php'; ?>
<?php
}
else echo "<h1>No User Logged In</h1>";
?>
