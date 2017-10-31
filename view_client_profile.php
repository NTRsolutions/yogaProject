<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>
<?php 
include 'config.php'; /*database connection*/
$id = $_GET['c_ID'];
$sql = "SELECT * FROM client WHERE c_ID = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
    $name=$row['c_name'];
    $surname=$row['c_surname'];
  //print_r($row);
?>
<?php include 'header.php'; ?>
<?php $page=2;include 'sidebar.php'; ?>
<?php $nav=2;include 'nav.php'; ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
<!--card is added here-->            
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">touch_app</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Attendance</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="perticular_client_attendance.php?cid=<?php echo $id;?>&cname=<?php echo $name; ?>&csurname=<?php echo $surname; ?>">
                                <i class="material-icons">plus_one</i> View Attendance
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">fitness_center</i>
                    </div>
                    <div class="card-content">
                        <p class="category">view client fitness<p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="client_fitness.php?cid=<?php echo $id;?>&cname=<?php echo $name; ?>&csurname=<?php echo $surname; ?>">
                                <i class="material-icons">plus_one</i> client Fitness history
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">touch_app</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Attendance</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="client_attendance.php">
                                <i class="material-icons">plus_one</i> Mark Attendance
                            </a>
                        </div>
                    </div>
                </div>
            </div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8" style="margin-right:10px!important;">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Client Profile</h4>
                       <!-- <p class="category">Here goes Details of client</p>-->
                        <div><div class="row"><div class="col-md-4">
                        <?php  echo "<img style='width:100px; height:100px; '  src=".$row['photo']." />"; ?>
                            </div><div class="col-md-2"> Client ID :<?php echo $cid = $row['c_ID']; ?></div><div class="col-md-3"> Name :<?php echo $name = $row['c_name']; ?></div><div class="col-md-3"> Surname :<?php echo $surname = $row['c_surname']; ?></div></div></div>
                    </div>
                    <div class="card-content">
                        <form action="edit_client.php" method="post">
 <!--start of form-->                           
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group label-floating">
                                      <strong class="text-primary">ID:&nbsp&nbsp&nbsp&nbsp</strong> <?php echo $cid = $row['c_ID']; ?>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group label-floating">
                                      <strong class="text-primary">Package type:&nbsp&nbsp&nbsp&nbsp</strong> <?php echo  $row['package']; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                    <div class="form-group label-floating">
                                      <strong class="text-primary">Start Date:<br></strong> <?php echo  $row['startdate']; ?>
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="form-group label-floating">
                                      <strong class="text-primary">End Date:<br></strong> <?php echo  $row['enddate']; ?>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                           <input type="hidden" name="c_ID" value="<?php echo $cid; ?>" >
                          
                             <hr>

                             <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                    <strong class="text-primary">Gender:&nbsp&nbsp&nbsp&nbsp</strong> <?php echo $row['gender']; ?>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                    <strong class="text-primary">Date Of Birth:&nbsp&nbsp&nbsp&nbsp</strong> <?php echo $row['DOB']; ?>

                                    </div>
                                </div> 
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                    <strong class="text-primary">Anniversary:&nbsp&nbsp&nbsp&nbsp</strong> <?php echo $row['Anniversary']; ?>

                                    </div>
                                </div>
                             </div>                                 
                         <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <strong class="text-primary">Contact:&nbsp&nbsp&nbsp&nbsp</strong> 
                                          <?php echo $row['contact']; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <strong class="text-primary">Email:&nbsp&nbsp&nbsp&nbsp</strong> 
                                          <?php echo $row['email']; ?>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                    <strong class="text-primary" >Address:&nbsp&nbsp&nbsp&nbsp</strong> <?php echo $row['address']; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <strong class="text-primary">Comments:&nbsp&nbsp&nbsp&nbsp</strong> 
                                          <?php echo $row['Comments']; ?>
                                    </div>
                                </div> 
                            </div>
                        <!--<hr>
                           
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                    <strong class="text-primary">View Client Attendance:&nbsp&nbsp&nbsp&nbsp</strong><a href="perticular_client_attendance.php?cid=<?php echo $cid;?>&cname=<?php echo $name; ?>&csurname=<?php echo $surname; ?>">Click Here<button style="color:black";>Click Here</button></a>

                                    </div>
                                </div>-->
                               <!-- <div class="col-md-6">
                                    <div class="form-group label-floating">
                                    <strong  class="text-primary">View Client fitness:&nbsp&nbsp&nbsp&nbsp</strong><a href="client_fitness.php?cid=<?php echo $cid;?>&cname=<?php echo $name; ?>&csurname=<?php echo $surname; ?>">Click Here<button style="color:black";>Click Here</button></a>

                                    </div>
                                </div>
                            </div>-->
                           <hr>
                        <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <strong class="text-primary">Fees:&nbsp&nbsp&nbsp&nbsp</strong> <?php echo $row['fees']; ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <strong class="text-primary">Recived:&nbsp&nbsp&nbsp&nbsp</strong> <?php echo $row['received']; ?>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <strong class="text-primary">Payment Status:&nbsp&nbsp&nbsp&nbsp</strong>

                                         <?php if($row['status_payment'] == 'unpaid'){ ?>
                                        <font style="color:red"><?php echo      $row['status_payment']; ?>
                                        </font>
                                        <?php }?>
                                        <?php if($row['status_payment'] == 'paid'){ ?>
                                        <font style="color:green"><?php echo $row['status_payment']; ?>
                                        </font>
                                        <?php }?>
                                    </div>
                                </div> 
                            </div> 
                            <hr>
<!--user access control for edit button-->     
                            <center>
                           <?php if((($_SESSION['permission']== 'admin' ||'superadmin') || ($_SESSION['permission']== 'operator'))&&($_SESSION['permission'] != 'user' )){?>
                      <button style="margin-right:20px;" type="submit" class="btn btn-primary">Edit</button>
                            <?php }?>
                        </form>
            <!--form ended here-->    
<!--user access control for delete button-->                        
                        <?php if(($_SESSION['permission']== 'admin' || 'superadmin')&&($_SESSION['permission'] != 'operator'  )&&($_SESSION['permission'] != 'user'  )){?>
                         <a href='delete_client_api.php/?c_ID=<?= $id;?>'>
                          <button  name="c_ID" class="btn btn-danger" style="background-color:red">Delete</button></a><?php } ?>
                          </center>
                          
                    </div>
                </div>
            </div>
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
else  {header('Location: index.php');}//echo "<h1>No User Logged In</h1>";
?>
