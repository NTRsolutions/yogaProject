<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>
<?php  
include 'config.php';
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://localhost/yogaProject/view_client_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$client = json_decode($content);
$client_view = $client->client_view;
if(isset($_POST['id'])){
    $cid = $_POST['c_id'];
    $sql = "SELECT * FROM client WHERE c_ID = '$cid'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

?>

<?php include 'header.php'; ?>
  <?php $page=2;include 'sidebar.php'; ?>
   <?php $nav=2;include 'nav.php'; ?>
    <div class="content">
	            <div class="container-fluid">
 

                    <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Client Payment</h4>
									<p class="category">Fill up the payment Form</p>
	                            </div>
	                            <div class="card-content">
                                    <div class="row">
                                        <form action="client_payment.php" method="post">            
                                            <div class="col-md-4">
												<div class="form-group label-floating">
													
                                                    <select style="width:250px;" name="c_id" required>
                                                        <option value="<?php if(isset($_POST["c_id"])){echo $_POST["c_id"];}else echo "" ?>"> <?php if(isset($_POST["c_id"])){echo $_POST["c_id"];}else echo "Select ID"; ?>
                                                        </option>
                                                        <?php foreach($client_view as $value){?>
                                                        <option value="<?php echo $value->c_ID; ?>"><?php echo $value->c_ID; ?></option>
                                                        <?php } ?> 
                                                    </select>
                                                </div>
	                                        </div>
                                                <?php if(!isset($_POST["id"])){ ?>
                                                    <button type="submit" class="btn btn-primary" name="id">Add</button>
                                                    <div class="clearfix"></div>
                                                    <?php } ?>
                                                </form>
                                                <form action="client_payment_api.php" method="post">
                                                <?php if(isset($_POST["id"])){
                                                    
                                                     $c_id = $_POST["c_id"];?>
                                                    <input type="hidden" name="c_id" value="<?php echo  $c_id;?>">
                                             <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label"></label>
													<input type="date" class="form-control" value="<?php echo date("Y-m-d")?>" name="date" required>
												</div>
	                                        </div>
                                        
                                               
                                           <div class="col-md-4">
												<div class="form-group label-floating">
													
                                                    <select style="width:250px;" name="paymode" required >
                                                    <option value="">-- SELECT PAY MODE --</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="Cheque">Cheque</option>
                                                    <option value="Card">Card</option>
                                                    <option value="Net Banking">Net Banking</option>
                                                    </select>
													
                                               </div>
                                                    </div>
                                        </div>
                                        
                                         <div class="row">
	
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Final Amount</label>
													<input type="text" class="form-control" value="<?php echo $row['fees'] ?>" name="c_amount" required readonly>
												</div>
	                                        </div>
	                                  
                                                 
                                               
                                           <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Balance</label>
													<input type="text" value="<?php echo $row['balance'] ?>" class="form-control" name="c_balance" required readonly>
												</div>
	                                        </div>
                                             <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Payment</label>
													<input type="text" class="form-control" name="pay" required >
												</div>
	                                        </div>
                                        </div>
                                        
                                        
	                                     
                                      <button type="submit" class="btn btn-primary pull-right" name="submit">Add</button>
	                                    <div class="clearfix"></div>
                                        <?php } ?>
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
