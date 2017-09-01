<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>
<?php 
include 'config.php';
$id = $_GET['e_id'];
$sql = "SELECT * FROM employee WHERE e_ID = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<?php include 'header.php'; ?>
<?php $page=3;include 'sidebar.php'; ?>
<?php $nav=3;include 'nav.php'; ?>

      <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-8">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Employee Profile</h4>
									<p class="category">Here goes Details of Employee</p>
	                            </div>
	                            <div class="card-content">
                                    <form action="edit_employee.php" method="post">
	                                    <div class="row">
                                            <div class="col-md-4">
                                            
                                                <div class="form-group label-floating">
													<strong class="text-primary">ID:&nbsp&nbsp&nbsp&nbsp</strong>    <?php echo $eid = $row['e_ID']; ?>
		  											
												</div>
	                                        </div>
                                        </div>
                                        <input type="hidden" name="e_ID" value="<?php echo $eid; ?>">
                                        <hr>
                                        <div class="row">
                                                 
                                            <div class="col-md-4">
												<div class="form-group label-floating">
                                                    <strong class="text-primary">Name:&nbsp&nbsp&nbsp&nbsp</strong>    <?php echo $row['e_name']; ?>
												
												</div>
	                                        </div>
                                        

	                                    
	                                        <div class="col-md-4">
                                                <div class="form-group label-floating">
													<strong class="text-primary">Surname:&nbsp&nbsp&nbsp&nbsp</strong>  <?php echo $row['e_surname']; ?>
													
												</div>
	                                        </div>
                                                 
                                        </div> 
                                        <hr>
                                        
                                         <div class="row">

	                                     <div class="col-md-4">
                                             <div class="form-group label-floating">
                                                 <strong class="text-primary">Address:&nbsp&nbsp&nbsp&nbsp</strong>  <?php echo $row['address']; ?>
													
												</div>
	                                        </div>
                                                    
                                        </div> 
                                        <hr>
                                        
                                                 
                                        <div class="row">
                                                
                                            <div class="col-md-4">
												<div class="form-group label-floating">
													<strong class="text-primary">Contact:&nbsp&nbsp&nbsp&nbsp</strong>  <?php echo $row['contact']; ?>
					       							
												</div>
                                            </div>
                                        

	                                    
                                            <div class="col-md-4">
												<div class="form-group label-floating">
                                                    <strong class="text-primary">Salary:&nbsp&nbsp&nbsp&nbsp</strong>  <?php echo $row['salary']; ?>
													
												</div>
	                                        </div>
                                                
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
													<strong class="text-primary">Payment Status:&nbsp&nbsp&nbsp&nbsp</strong>
                                                    
                                                    <?php if($row['status'] == 'unpaid'){ ?>
                                                    <font style="color:red"><?php echo $row['status']; ?>
                                                    </font>
                                                    <?php }?>
                                                    <?php if($row['status'] == 'paid'){ ?>
                                                    <font style="color:green"><?php echo $row['status']; ?>
                                                    </font>
                                                    <?php }?>

                                     	
												</div>
	                                        </div>
                                         
                                        </div>    
                                        <hr>     
	                          
	                                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
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
