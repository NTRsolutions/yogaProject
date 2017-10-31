<?php
// Start the session
session_start();
if(!empty($_SESSION)){
if(($_SESSION['permission']!='operator') &&($_SESSION['permission']!='user')) {
    /* user access control using session*/
?>
<?php  
include 'config.php';
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://yoga.classguru.in/view_client_api.php');
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
   // print_r($row);
}
?>
<?php include 'header.php'; ?>
<style>
  .field_top{
        top:-27px!important;
    }
    
      .color_style {
        color:red;
    }
</style>
<?php $page=2;include 'sidebar.php'; ?>
<?php $nav=2;include 'nav.php'; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
<!--add card for client ,Attendance, payment-->            
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Client<p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="add_client.php">
                                <i class="material-icons">plus_one</i> Add New Client
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
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <i class="material-icons">payment</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Payment</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                         <a href="client_payment.php"><i class="material-icons">plus_one</i> Add Payment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Client Payment</h4>
                        <p class="category">Fill up the payment Form</p>
                    </div>
                    <div class="card-content">
                        <div class="row">
<!--start of for for client payment-->
                        <form action="client_payment.php" method="post">           
                            <div class="col-md-4">
                                <div style="margin:18px 0px 0px 0px;" class="form-group label-floating">
                                    <label for="business">Select ID:<span class="required color_style"> * </span></label>
                                    <select style="width:300px; height:38px;" name="c_id" required
                                            <?php if(isset($_POST['id'])){echo "disabled";} ?>>
                                        <option value="<?php if(isset($_POST["c_id"])){echo $_POST["c_id"];}else echo "" ?>"> <?php if(isset($_POST["c_id"])){echo $_POST["c_id"];}else echo "Select ID"; ?>
                                        </option>
                                        <?php foreach($client_view as $value){?>
                                        <option value="<?php echo $value->c_ID; ?>"><?php echo $value->c_ID." - - ".$value->c_name; ?></option>
                                        <?php } ?> 
                                    </select>
                                </div>
                            </div>
                            <?php if(!isset($_POST["id"])){ ?>
                            <button style="margin-top:46px;" type="submit" class="btn btn-primary" name="id">Add</button>
                            <div class="clearfix"></div>
                            <?php } ?>
                        </form>
<!-- detail of selected client-->                            
                        <form action="client_payment_api.php" method="post">
                            <?php if(isset($_POST["id"])){
                              $c_id = $_POST["c_id"];?>
                            <input type="hidden" name="c_id" value="<?php echo  $c_id;?>" >
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Date <span class="required color_style"> * </span></label>
                                    <input style="margin-top:46px;" type="date" class="form-control" value="<?php echo date("Y-m-d")?>" name="date" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div  style="margin:18px 0 0 0"  class="form-group label-floating">
                                    <label for="business">Select Payment Mode <span class="required color_style"> * </span></label>
                                 <select style="width:300px; height:38px;" name="paymode" required >
                                        <option value="">------ SELECT PAYMENT MODE ------</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Card">Card</option>
                                        <option value="Net Banking">Net Banking</option>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group label-floating">
                                        <label class="control-label field_top">Final Amount <span class="required color_style"> * </span></label>
                                        <input type="text" class="form-control" value="<?php   echo $row['fees'] ?>" name="c_amount" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group label-floating">
                                        <label class="control-label field_top">Recieved <span class="required color_style"> * </span></label>
                                        <input type="text" class="form-control" value="<?php   echo $row['received'] ?>" name="received" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group label-floating">
                                        <label class="control-label field_top">Balance <span class="required color_style"> * </span></label>

                                        <input type="text" value="<?php   if ($row['balance'] < 00000) {  echo 0000; } else { echo $row['balance'];}   ?>" class="form-control" name="c_balance" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group label-floating">
                                        <label class="control-label field_top">Payment <span class="required color_style"> * </span></label>
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
} else{
    
echo '<script language="javascript">';
echo 'alert("Access denied");window.location = "client.php" </script>';}
}
else {header('Location: index.php');} // echo "<h1>No User Logged In</h1>";
?>
