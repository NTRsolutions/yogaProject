<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>
<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://yoga.classguru.in/view_batch_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$batch = json_decode($content);
$batch_view = $batch->batch_view;
//$batch_view = $batch->batch_view;
?>
<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://yoga.classguru.in/upload_img_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$client = json_decode($content);
$client_view = $client->client_view;
$idArray = $client_view[0];
 $id = $idArray->c_ID;
 $img=$id+1;
    //$batch_view = $batch->batch_view;
?>
<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://yoga.classguru.in/view_packages_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$packages = json_decode($content);
$packages_view = $packages->packages_view;
  //  print_r($packages_view);
   
?>
<?php include 'config.php'; ?>
<?php include 'header.php'; ?>
<?php $page=2;include 'sidebar.php'; ?>
<?php $nav=2;include 'nav.php'; ?>
    <div class="content">
        <div class="container-fluid">
<?php 
if(isset($_POST['submit']) && isset($_POST['c_name'])){ 
    $Name = $_POST['c_name'] . $img;
    $url = "client_image/$Name.jpg";
    $data = array(
            'c_name' => $_POST['c_name'],
            'c_surname' => $_POST['c_surname'],
            'gender' => $_POST['gender'],
            'DOB' => $_POST['DOB'],
            'Anniversary' => $_POST['Anniversary'],
            'Age' => $_POST['Age'],
            'c_address' => $_POST['c_address'],
            'c_contact' => $_POST['c_contact'],
            'c_fees' => $_POST['c_fees'],
            'received' => $_POST['received'],
            'balance' => $_POST['balance'],
            'package' => $_POST['package'],
            'startdate' => $_POST['startdate'],
            'enddate' => $_POST['enddate'],
            'Lead_By' => $_POST['Lead_By'],
            'photo' => $url,
            'batch' => $_POST['batch'],
            'Comments' => $_POST['Comments']
        );


        # Create a connection
        $url = 'http://localhost/yogaproject/add_client_api.php';
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

         ?> 
<?php 
if(isset($_POST['date_before'])){ 
    
    $data = array(
            'date_before' => $_POST['date_before'],
            'Diet_before' => $_POST['Diet_before'],
            'Weight_before' => $_POST['Weight_before']
        );


        # Create a connection
        $url = 'http://localhost/yogaproject/add_client_fitness_api.php';
        $ch = curl_init($url);
        # Form data string
        $postString = http_build_query($data, '', '&');
        # Setting our options
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        # Get the response
        $response = curl_exec($ch);
           // print_r($response);
        curl_close($ch);  
        }

         ?>
          <div class="row">
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
                                <i class="material-icons">plus_one</i> Add new Client
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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Add Client</h4>
                            <p class="category">Fill up the Client Form</p>
                        </div>
                        <div class="card-content">
                            
                            <form action="add_client.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Name </label>
                                            <input  onkeyup="allLatters(c_name, event)" type="text" 
                                            class="form-control validName" name="c_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Surname </label>
                                            <input  onkeyup="Latters(c_surname, event)" type="text" 
                                             class="form-control validSurname" name="c_surname" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                       <div > 
                                           Gender :
                                            <select style="width:140px; height:38px;" name="gender" required>
                                            <option >Select Gender</option>
                                            <option name="gender" value="male">Male</option>
                                            <option name="gender"  value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group label">
                                            <label class="control-label">Date of Birth</label>
                                            <input  type="date" class="form-control validnumbers" name="DOB" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Age</label>
                                            <input type="text"  class="form-control" name="Age" id="phone" onkeypress="phoneno()" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group label">
                                            <label class="control-label">Anniversary</label>
                                            <input type="date"  class="form-control" name="Anniversary" id="phone" onkeypress="phoneno()" maxlength="10" required>
                                        </div>
                                    </div>
	                            </div>
                                
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Fees</label>
                                            <input  onkeyup="allnumeric(c_fees, event)" id="Text1" type="text"  class="form-control validnumber" name="c_fees" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Received</label>
                                            <input onkeyup="allnumerics(received, event)"  id="Text2" type="text" class="form-control validnumbers" name="received" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group label">
                                            <label class="control-label">Balance</label>
                                            <input  type="text" onfocus="calc_balance()" id="txtresult"  class="form-control" name="balance" required readonly >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Contact</label>
                                            <input type="text"  class="form-control" name="c_contact" id="phone" onkeypress="phoneno()" maxlength="10" required>
                                        </div>
                                    </div>
	                            </div>
                             <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Comments</label>
                                            <textarea  cols="30" name="Comments"  class="form-control" ></textarea> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Address</label>
                                            <textarea cols="30" name="c_address"  class="form-control" required></textarea> 
                                        </div>
                                    </div>
                                </div>  
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Lead By </label>
                                            <input  type="text" class="form-control " name="Lead_By" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <?php 
                                        if(isset($_POST['submit']))
                                        {

                                        //$img = file_get_contents($_FILES['img']['tmp_name']);
                                        file_put_contents("client_image/$Name.jpg",file_get_contents($_FILES['img']['tmp_name']));
                                        }
                                    ?>
                                    Select image :<br><br>
                                    <input type="file" name="img" accept="image/*"/>

                                </div>
                            </div>
                            <hr><h4>Fill Batch & packages Detail</h4>
                               <div class="row">
                                    <div style="margin:35px 0 0 0" class="col-md-6">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <p class="hidden-lg hidden-md">Notifications</p>
                                            </a>
                                            <label for="business">Select Batch:</label>
                                            <select style="width:300px; height:38px;" name="batch" required><option value="">Select Batch</option>
                                                <?php foreach($batch_view as $value): ?>
                                                <li>
                                                    <option value="<?php echo $value->batch_id;?>"><?php echo $value->batch_name;?></option>
                                                </li>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                   <div style="margin:35px 0 0 0" class="col-md-6">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <p class="hidden-lg hidden-md">Package</p>
                                            </a>
                                            <label for="business">Select Packages:</label>
                                            <select id="timeunit" style="width:300px; height:38px;" name="package" required><option value="">Select Packages</option>
                                                <?php foreach($packages_view as $value): ?>
                                                <li>
                                                    <option value="<?php echo $value->Time_unit;?>"><?php echo $value->Catogary;?></option>
                                                </li>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>        
                                </div>
                                
                                <div class="row" >
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Start Date  </label>
                                            <input type="date" id='date1' value="<?php echo date('Y-m-d'); ?>" onblur="date()" name="startdate" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">EndDate By </label>
                                            
                                            <input type="date" id='resultDate' name="enddate" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <h4> Fill Fitness Detail</h4>
                            <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label">
                                    <label class="control-label">Date</label>
                                    <input type="date" class="form-control" name="date_before" required>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">nutritions/Diet</label>
                                    <input type="text" class="form-control" name="Diet_before" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Weight</label>
                                    <input type="text" class="form-control" name="Weight_before" required>
                                </div>
                            </div>
                         </div>
                               
                             <button type="submit" name="submit"class="btn btn-primary pull-right">Add</button>
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
<?php include 'endStart_script.php'; ?>
<?php include 'script_include.php'; ?>
<?php
}
else echo "<h1>No User Logged In</h1>";
?>
