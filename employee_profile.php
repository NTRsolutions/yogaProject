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
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Employee Profile</h4>
                        <p class="category">Here goes Details of Employee</p>
                    </div>
                    <div class="card-content">
                        <form>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        ID:
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        Name:
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        Surname:
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        Address:
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        Contact:
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        Salary:
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        Payment Status:
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
