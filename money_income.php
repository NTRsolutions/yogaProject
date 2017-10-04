<?php
/*starting of seesion*/ 
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
<?php $page=9;include 'sidebar.php'; ?>
<?php $nav=9;include 'nav.php'; ?>
<div class="content">
    <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                      <i class="material-icons">money_off</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Expences<p>
                    </div>  
                    <div class="card-footer">
                        <div class="stats">
                            <a href="money_expence.php">
                                <i class="material-icons">plus_one</i>Add new expenxes
                            </a>
                        </div>
                    </div>
                </div>
            </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                          <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Transaction<p>
                    </div>  
                    <div class="card-footer">
                        <div class="stats">
                            <a href="money_output.php">
                                <i class="material-icons">plus_one</i> view total transaction
                            </a>
                        </div>
                    </div>
                </div>
            </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                          <i class="material-icons">attach_money</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Income<p>
                    </div>  
                    <div class="card-footer">
                        <div class="stats">
                            <a href="money_income.php">
                                <i class="material-icons">plus_one</i> Add New income detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
          
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Income</h4>
                        <p class="category">Fill up the Required detail</p>
                    </div>
                    <div class="card-content">
                <form action="add_income_api.php" method="post">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="form-group label-floating">
                                    <label class="control-label">Sr No</label>
                                    <input type="text" class="form-control" name="Sr_no" value=<?php echo 1;?> readonly required>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group label-floating">
                                    <label class="control-label">Bill No</label>
                                    <input type="text" class="form-control" name="bill_no[]" required>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Name</label>
                                    <input type="text" class="form-control" name="in_name[]" required>
                                </div>
                            </div>
                      
                                <div class="col-md-3">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Amount</label>
                                        <input type="text" class="form-control"         name="Amount[]" required>
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    <div class="form-group label-floating">
                                        <label class="control-label"></label>
                                        <input type="Date" class="form-control"         name="Date[]" required>
                                    </div>
                                </div>
                            </div>
                            <?php for($i=0;$i<9;$i++){ 
                            $j=$i+2;
                            ?>
                        <div class="row">
                            <div class="col-md-1">
                                <div class="form-group label-floating">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control" name="Sr_no" value=<?php echo $j;?> readonly required>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group label-floating">
                                    <label class="control-label">Bill No</label>
                                    <input type="text" class="form-control" name="bill_no[]" >
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Name</label>
                                    <input type="text" class="form-control" name="in_name[]" >
                                </div>
                            </div>
                          
                           
                                <div class="col-md-3">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Amount</label>
                                        <input type="text" class="form-control"         name="Amount[]" >
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    <div class="form-group label-floating">
                                        <label class="control-label"></label>
                                        <input type="Date" class="form-control"         name="Date[]" >
                                    </div>
                                </div>
                            </div>
                    <?php } ?>
                        <!--    <button type="submit" class="btn btn-primary pull-left" name="Add"><i class="material-icons">add</i></button>-->
                            
                            <button type="submit" class="btn btn-primary pull-right" name="submit">Add Income</button>
                            <div class="clearfix"></div>
                            
                      
                            
                            
                        </form>
                    </div>
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

