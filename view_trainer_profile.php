<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>
<?php 
include 'config.php';
$id = $_GET['e_id'];
$sql = "SELECT * FROM trainer WHERE e_ID = '$id'";
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
	                                <h4 class="title">Trainer Profile</h4>
									<!--<p class="category">Here goes Details of Employee</p>-->
                                    <div><div class="row"><div class="col-md-4">
                            <?php  echo "<img style='width:100px; height:100px; '  src=".$row['photo']." />"; ?>
                            </div><div class="col-md-2"> Trainer ID :<?php echo $cid = $row['e_ID']; ?></div><div class="col-md-3"> Name :<?php echo $name = $row['e_name']; ?></div><div class="col-md-3"> Surname :<?php echo $surname = $row['e_surname']; ?></div></div></div>
	                            </div>
	                            <div class="card-content">
                                    <form action="edit_trainer.php" method="post">
	                                    <div class="row">
                                           <?php  $eid = $row['e_ID']; ?>         
                                            <div class="col-md-4">
                                                 <div class="form-group label-floating">
                                                    <strong class="text-primary">Register_ID:&nbsp&nbsp&nbsp&nbsp</strong><?php echo $row['Register_ID']; ?>
                                                </div>
	                                        </div>
                                             <div class="col-md-4">
                                                 <div class="form-group label-floating">
                                                    <strong class="text-primary">ID Proof:&nbsp&nbsp&nbsp&nbsp</strong><?php echo  $row['id_name']; ?>
                                                </div>
	                                        </div>
                                             <div class="col-md-4">
                                                 <div class="form-group label-floating">
                                                    <strong class="text-primary">ID No:&nbsp&nbsp&nbsp&nbsp</strong><?php echo $row['id_no']; ?>
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
                                                <strong class="text-primary">Gender:&nbsp&nbsp&nbsp&nbsp</strong> <?php echo $row['Gender']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <strong class="text-primary">Date Of Birth:&nbsp&nbsp&nbsp&nbsp</strong> <?php echo $row['DOB']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <strong class="text-primary">Age:&nbsp&nbsp&nbsp&nbsp</strong> <?php echo $row['Age']; ?>
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
													<strong class="text-primary">Email:&nbsp&nbsp&nbsp&nbsp</strong>  <?php echo $row['Email']; ?>
					       						</div>
                                            </div>
                                        </div>
                                    <hr>  
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <strong class="text-primary" maxlength="100">Address:&nbsp&nbsp&nbsp&nbsp</strong>
                                            <?php echo  $row['address']; ?>
								        </div>
	                                </div>                    
                                </div>
                                         <hr>
                                     <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <strong class="text-primary">Title:&nbsp&nbsp&nbsp&nbsp</strong>  <?php echo $row['Title']; ?>
                                            </div>
                                        </div>
	                                  
                                        <div class="col-md-4">
								            <div class="form-group label-floating">
                                                <strong class="text-primary">Salary:&nbsp&nbsp&nbsp&nbsp</strong>  <?php echo $row['Salary']; ?>
													
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
                                        
	                                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
	                                    
	                                </form>
                                         <a href='delete_trainer_api.php/?e_ID=<?= $id;?>'>
                                        <button  name="e_ID" class="btn btn-primary pull-right" style="background-color:red">Delete </button></a>
                                    <div class="clearfix"></div>
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
