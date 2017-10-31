<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>
<?php include 'header.php'; ?>
<style>
    #myInput{
        width:20%;
        float:right;
        color:white;
    }
    .form-group{
        padding-bottom: 0px!important;
        margin: 0 0 0 0!important;
    }
    .icon{
        float:right;
    }
</style>
<?php $page=6;include 'sidebar.php'; ?>
<?php $nav=5;include 'nav.php'; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Batch<p>
                    </div>  
                    <div class="card-footer">
                        <div class="stats">
                            <a href="add_batch.php">
                                <i class="material-icons">plus_one</i> Add New batch
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header" data-background-color="purple">
                        <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search..">
                        <i class="material-icons icon">search</i> 
                        <h4 class="title">Client Details</h4>
                        <p> Batch ID = 9&nbsp&nbsp&nbsp&nbsp&nbsp Batch Name = Afternoon</p>
                    </div>
                </div>
                <div class="card-content">
                    <table class="table table-hover" >
                        <thead class="text-primary">
                            <th>Sr no.</th>
                            <th>Client ID</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Contact</th>
                            <th>Batch Name</th>
                            <th>Status</th>
                        </thead>
                        <tbody id="myTable">
                            <tr>
                                <td>1</td>
                                <td>77</td>
                                <td><a href="view_client_profile.php">priyanka</a></td>
                                <td><a href="view_client_profile.php">lalge</a></td>
                                <td>8932596598</td>
                                <td>A_1</td>
                                <td>Paid</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<?php include 'tablesearch_script.php'; ?>
<?php include 'script_include.php'; ?>
<?php
}
else echo "<h1>No User Logged In</h1>";
?>
