<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>
<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://localhost/yogaproject/view_income_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$in_date_view = json_decode($content);
$in_date = $in_date_view->in_date;

//print_r($in_date_view);
   
?>
<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://localhost/yogaproject/view_expence_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$exp_date_view = json_decode($content);
$exp_date= $exp_date_view->exp_date;
  // print_r($exp_date);
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
                                <i class="material-icons">plus_one</i> total expenxes
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
                <div class="card card-plain">
                    <div class="card-header" data-background-color="purple">
                        <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search..">
                        <i class="material-icons icon">search</i> 
                        <h4 class="title">transaction Details</h4>
                    </div>
                </div>
                <div class="card-content">
                    <table class="table table-hover">
                        <thead class="text-primary">
                            <th>Sr no.</th>
                            <th>Date</th>
                            <th>Income</th>
                            <th>Expence</th>
                            <th>Profit</th>
                            <th>Loss</th>
                        </thead>
                    <tbody id="myTable"><?php  $i=1;foreach($in_date as $value): foreach($exp_date as $value1):  if ($value->date == $value1->date)break; {?>
                        
                            <tr>
                                <td><?php  echo $i; $i++; ?></td>
                                <td><?php  echo $value->date; ?></td>
                                <td><?php echo $value->amount; ?></td>
                                <td><?php echo $value1->amount; ?></td>
                              
                                <td><!--<a href="batch_detail.php?batch_id=<?php echo $id;?>&batch_name=<?php echo $value->batch_name; ?>"><?php echo $value->batch_name; ?></a>--></td>
                                <td><?php //echo $value->batch_timing; ?></td>
                                               
           
                                <form action="edit_batch.php" method="POST">
                                    <td style="width:20px!important;">
                                            <input value="<?php echo $value->batch_id;?>" type="hidden" name="batch_id">
                                           <input style="width:50px; height:28px;" src="assets/img/edit.png" class="btn btn-xs btn-warning" type="image" alt="submit" value="">
                                    </td>
                                </form>
                                <td style="width:20px!important;">      
                                    <div class="dropdown">
                                        <button style="width:56px;" class="btn btn-sm btn-primary dropdown-toggle"  type="button" data-toggle="dropdown"><i class="material-icons">delete</i>
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="delete_batch_api.php/?b_id=<?= $id?>">Yes confirm</a></li>
                                            <li><a href="#">No</a></li>
                                        </ul>
                                    </div>
                                </td>                                       
                            </tr>
                            <?php  } endforeach; ?><?php  endforeach; ?>
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
