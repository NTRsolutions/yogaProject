<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>
<?php include 'header.php'; ?>
  <?php $page=3;include 'sidebar.php'; ?>
   <?php $nav=3;include 'nav.php'; ?>
<?php include 'config.php'; ?>
<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://localhost/yogaProject/employee_payment_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$employee = json_decode($content);
$employee_view = $employee->employee_view;
//print_r($employee_view);
?>

    <div class="content">
	            <div class="container-fluid">
 <?php 
                      if(isset($_POST['submit'])){
                        if(isset($_POST['e_id']) && isset($_POST['payment_date']) && isset($_POST['paymentmode'])){
                        $data = array(
                            'e_id' => $_POST['e_id'],
                            'payment_date' => $_POST['payment_date'],
                            'paymentmode' => $_POST['paymentmode'],
                            'checkbox' => $_POST['checkbox']
                        );
                        # Create a connection
                        $url = 'http://localhost/yogaProject/add_employee_payment_api.php';
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
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Employee Payment</h4>
									<p class="category">Fill up the payment form</p>
	                            </div>
	                            <div class="card-content">
	                                <form action="employee_payment.php" method="post">
                                        <?php foreach($employee_view as $value): ?>
	                                        <div class="row">
                                               
                                            <div class="col-md-2">
												<div class="form-group label-floating">
													<label class="control-label">payment date</label>
													<input type="date" class="form-control" name="payment_date[]" value="<?php echo date('Y-m-d');?>" required>
												</div>
	                                        </div>
	                                  
                                                <div class="col-md-2">
												<div class="form-group label-floating">
													<label class="control-label">Employee ID</label>
													<input type="text" value="<?php echo $value->e_ID;?>" class="form-control" name="e_id[]"  readonly>
												</div>
	                                        </div>
                                                <div class="col-md-2">
												<div class="form-group label-floating">
													<label class="control-label">Name</label>
													<input type="text" value="<?php echo $value->e_name;?>" class="form-control" name="e_name[]" readonly>
												</div>
	                                        </div>
                                                <div class="col-md-2">
												<div class="form-group label-floating">
													<label class="control-label">Salary</label>
													<input type="text" value="<?php echo $value->salary;?>" class="form-control" name="salary[]" readonly>
												</div>
	                                        </div>
                                        
                                               
                                           <div class="col-md-2">
												<div style="margin:26px 0 0 0" class="form-group label-floating">
													<label class="control-label">Payment Mode</label>
													<select style="width:200px; height:38px;" name ="paymentmode[]" >
                                                    <option value=""> -- Select Payment Mode -- </option>
                                                    <option value="Cash" >Cash</option>
                                                        <option value="Cheque" >Cheque</option>
                                                    <option value="Card" >Card</option>
                                                    <option value="NetBanking" >NetBanking</option>
                                                    </select>
												</div>  
	                                        </div>
                                                <div class="col-md-2">
												<div class="form-group label-floating">
													
													<input type="checkbox" class="form-control" value=" <?php echo $value->e_ID;?>" name="checkbox[]" >
												</div>
	                                        </div>
                                        </div>
                                        <?php endforeach ?>
                                        
	                                     
                                      <button type="submit" class="btn btn-primary pull-right" name="submit">Add</button>
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
