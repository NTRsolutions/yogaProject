<?php
// Start the session
session_start();

?>
<?php include 'config.php'; ?>
<?php 

if(isset($_SESSION["username"])){
?>
<?php include 'header.php'; ?>
<?php $page=1;include 'sidebar.php'; ?>
<?php $nav=1;include 'nav.php'; ?>
<div class="content">
    <div class="container-fluid">
<!--card for add,client,add emplyee..etc-->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">person</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Client</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="add_client.php"><i class="material-icons">plus_one</i> Add New Client</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Employees</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="add_employee.php"><i class="material-icons">plus_one</i> Add New Employee</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">group_add</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Set of Batches</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="add_batch.php"><i class="material-icons">plus_one</i> Add New Batches</a>									
                        </div>
                    </div>
                </div>
            </div>  
           <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Trainer</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="add_trainer.php"><i class="material-icons">plus_one</i> Add New Trainer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">local_offer</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Packages</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="add_packages.php"><i class="material-icons">plus_one</i> Add New Packages</a>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                   <i class="material-icons">sms</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Enquiry</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="enquiry_table.php"><i class="material-icons">plus_one</i> Add enquiry</a>									
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--footer and session end-->
<?php include 'footer.php'; ?>
<?php include 'script_include.php'; ?>
<?php }
else {header('Location: index.php');}
    //echo "<h1>Not a Valid user</h1>";
?>
