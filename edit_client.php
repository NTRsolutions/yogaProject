<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>
<?php include 'config.php'; ?>
<?php include 'header.php'; ?>
<?php $page=2;include 'sidebar.php'; ?>
<?php $nav=2;include 'nav.php'; ?>
<?php   
if(isset($_POST['c_ID'])){
     $cid = $_POST['c_ID'];
    $data = array('c_ID'=> $cid);
    # Create a connection
    $url = 'http://yoga.classguru.in/view_edit_client_api.php';
    $ch = curl_init($url);
    # Form data string
    $postString = http_build_query($data, '', '&');
    # Setting our options
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    # Get the response
    $content = curl_exec($ch);
    $client_detail = json_decode($content);
    $client_view = $client_detail->client_view[0];
   
   # Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://yoga.classguru.in/view_batch_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$batch = json_decode($content);
$batch_view = $batch->batch_view;
}
/*if(isset($_POST['edit'])){
     
     $c_name = $_POST['c_name'];
     $c_surname = $_POST['c_surname'];
     $c_fees = $_POST['c_fees'];
     $c_contact = $_POST['c_contact'];
     $c_address = $_POST['c_address'];
    
    $data = array(
        'c_id' => $_POST['c_id'],
        'c_name' => $_POST['c_name'],
        'c_surname' => $_POST['c_surname'],
        'c_fees' => $_POST['c_fees'],
        'c_contact' => $_POST['c_contact'],
        'c_address' => $_POST['c_address']
        //'batch' => $_POST['batch']
    );
    # Create a connection
    $url = 'http://localhost/yogaProject/edit_client_api.php';
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
     
    
}*/
?>

<div class="content">
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Edit Client</h4>
                            <p class="category">Edit Client Detail</p>
                        </div>
                        <div class="card-content">
                            <form action="edit_client_api.php" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Register ID </label>
                                            <input onkeyup="allLatters(Register_ID )" type="text" class="form-control validName" value="<?php echo $client_view->Register_ID ;?> " name="Register_ID" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Name</label>
                                            <input onkeyup="allLatters(c_name)" type="text" class="form-control validName" value="<?php echo $client_view->c_name;?> " name="c_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">surname</label><input onkeyup="Latters(c_surname)" type="text" class="form-control validSurname" value="<?php echo $client_view->c_surname;?>" name="c_surname" required> 
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   <div class="col-md-4">
                                        <div class="form-group label">
                                            <label class="control-label" >Gender : </label>
                                           <input  type="text" class="form-control" value="<?php echo $client_view->gender;?> " name="gender" required>
                                         </div>
                                    </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group label">
                                        <label class="control-label">Date Of Birth</label>
                                        <input  type="date(Y-M-d)" class="form-control" value="<?php echo $client_view->DOB;?> " name="DOB" required>
                                    </div>
                                </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Age</label>
                                            <input type="text" class="form-control" value="<?php echo $client_view->Age;?>" name="Age" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Fees</label>
                                            <input onkeyup="allnumeric(fees)" type="text" class="form-control validnumber" value="<?php echo $client_view->fees;?>" name="fees" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Anniversary</label>
                                            <input onkeyup="allnumeric(fees)" type="text" class="form-control validnumber" value="<?php echo $client_view->Anniversary;?>" name="Anniversary" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Contact</label>
                                            <input id="phone" onkeypress="phoneno()" maxlength="10" type="text" class="form-control" value="<?php echo $client_view->contact;?>" name="contact" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Address</label>
                                            <textarea rows="3" cols="30" name="address"  class="form-control" required><?php echo $client_view->address;?></textarea> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div style="margin:35px 0 0 0" class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <p class="hidden-lg hidden-md">Notifications</p>
                                            </a>
                                            <?php foreach($batch_view as $value){if($client_view->batch_name == $value->batch_name){ $id = $value->batch_id;}}?>
                                            <label for="business">Select Batch:</label>
                                            <select style="width:300px; height:38px;" name="batch" required>
                                                <li>
                                                    <option value="<?php echo $id;?>"><?php echo $client_view->batch_name;?></option>
                                                </li>
                                                <?php foreach($batch_view as $value): ?>
                                                <li>
                                                    <option value="<?php echo $value->batch_id;?>"><?php echo $value->batch_name;?></option>
                                                </li>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>                             
                                    </div> 
                                </div>
                            <div class=row>
                                <div class="col-md-5">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Comments</label>
                                            <textarea rows="3" cols="30" name="Comments"  class="form-control" required><?php echo $client_view->Comments;?></textarea> 
                                        </div>
                                    </div>
                                
                                   <!-- <div class="col-md-1">
                                        <div class="form-group label">
                                            <label class="control-label" >Change Photo<br><br><strong class="text-primary">click here</strong></label>
                                            <input id="Photo" type="file" class="form-control" value="<?php echo $client_view->Photo;?>" name="Photo" required>
                                        </div>
                                    </div><br>-->
                                
                                    <div class="col-md-3">
                                        
                                        <div class="form-group label">
                                        <strong class="text-primary">Client Photo:&nbsp&nbsp&nbsp&nbsp</strong> 
                                        <?php echo "<img src=".$client_view->photo." />"; ?>
                                        
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="<?php echo $cid; ?>" name="c_ID"> 
                                <button type="submit" name="edit"class="btn btn-primary pull-right">Done</button>
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
