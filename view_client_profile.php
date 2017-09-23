<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>
<?php 
include 'config.php';
$id = $_GET['c_ID'];
$sql = "SELECT * FROM client WHERE c_ID = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
   //print_r($row['Photo']);
?>
<?php include 'header.php'; ?>
<?php $page=2;include 'sidebar.php'; ?>
<?php $nav=2;include 'nav.php'; ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Client Profile</h4>
                        <p class="category">Here goes Details of client</p>
                    </div>
                    <div class="card-content">
                        <form action="edit_client.php" method="post">
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                      <strong class="text-primary">ID:&nbsp&nbsp&nbsp&nbsp</strong> <?php echo $cid = $row['c_ID']; ?>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group label-floating">
                                      <strong class="text-primary">Register_ID:&nbsp&nbsp&nbsp&nbsp</strong> <?php echo  $row['Register_ID']; ?>
                                    </div>
                                </div>
                                <!--<div class="col-md-4">
                                    <div class="form-group label">
                                      <strong class="text-primary">Client Photo:&nbsp&nbsp&nbsp&nbsp</strong> <?php echo $row['Photo']; ?>
                                    </div>
                                </div>-->
                            </div>
                            
                           <input type="hidden" name="c_ID" value="<?php echo $cid; ?>" >
                             <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <strong class="text-primary">Name:&nbsp&nbsp&nbsp&nbsp</strong> <?php echo $name = $row['c_name']; ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <strong class="text-primary">Surname:&nbsp&nbsp&nbsp&nbsp</strong> <?php echo $surname = $row['c_surname']; ?>

                                    </div>
                                </div>
                            </div> 
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
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                    <strong class="text-primary">Address:&nbsp&nbsp&nbsp&nbsp</strong> <?php echo $row['address']; ?>

                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                    <strong class="text-primary">View Client Attendance:&nbsp&nbsp&nbsp&nbsp</strong><a href="perticular_client_attendance.php?cid=<?php echo $cid;?>&cname=<?php echo $name; ?>&csurname=<?php echo $surname; ?>">Click Here</a>

                                    </div>
                                </div>
                            </div>
                           <hr>
                           
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <strong class="text-primary">Contact:&nbsp&nbsp&nbsp&nbsp</strong> 
                                          <?php echo $row['contact']; ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <strong class="text-primary">Comments:&nbsp&nbsp&nbsp&nbsp</strong> 
                                          <?php echo $row['Comments']; ?>
                                    </div>
                                </div> 
                            </div>
                            <hr>
                           
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <strong class="text-primary">Fees:&nbsp&nbsp&nbsp&nbsp</strong> <?php echo $row['fees']; ?>
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
                            </div>   <hr> 
                               <div class="row"> 
                                <div class="col-md-8">
                                    <div class="form-group label">
                                      <strong class="text-primary">Client Photo:&nbsp&nbsp&nbsp&nbsp</strong> 
                                        <?php echo "<img style='width:187px;' src=".$row['photo']." />"; ?>
                                    </div>
                                </div>
                                </div>    
                              

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
