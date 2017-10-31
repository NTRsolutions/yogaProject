<?php
// Start the session
session_start();
if(!empty($_SESSION)){
if(($_SESSION['permission']=='admin') || ($_SESSION['permission']=='superadmin')||($_SESSION['permission']!='operator') && ($_SESSION['permission']!='user')){
/* access control to user by session*/
?>
<style>
    .color_style {
        color:red;
    }
    .selectpicker_style {
       width:250px;
       height:30px;
        }
    .selectpicker_style_1 {
       width:200px;
       height:30px;
        }
    .field_top{
        top:-27px!important;
    } 
     @media screen (min-width:320px) and (max-width:750px) {
    .selectpicker_style {
       width:50px;
       height:30px;
    }
    }
</style>
<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://yoga.classguru.in/view_batch_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
/*get content of url*/  
$batch = json_decode($content);
$batch_view = $batch->batch_view;
//print_r($batch_view);
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
<?php include 'config.php'; ?><!--database connect-->
<?php include 'header.php'; ?>
<?php $page=2;include 'sidebar.php'; ?>
<?php $nav=2;include 'nav.php'; ?>
<div class="content">
<div class="container-fluid">
<?php 
if(isset($_POST['submit']) && isset($_POST['c_name'])){ 
    
    $Name = $_POST['c_name'] . $img;
    $url_i = "assets/client_image/$Name.jpg"; //address of image 
$data = array(
'c_name' => $_POST['c_name'],
'c_surname' => $_POST['c_surname'],
'gender' => $_POST['gender'],
'email' => $_POST['email'],
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
'photo' => $url_i,
'batch' => $_POST['batch'],
'Comments' => $_POST['Comments']
);

# Create a connection
$url = 'http://yoga.classguru.in/add_client_api.php';
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
'Weight_before' => $_POST['Weight_before'],
'height_before' => $_POST['height_before']
);

# Create a connection
$url = 'http://yoga.classguru.in/add_client_fitness_api.php';
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
<!--card start here for add new client,attendance,payment-->
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
                <!--start form for add new client-->
                <form action="add_client.php" method="post" enctype="multipart/form-data">
                    <h4 style="color:#3e79c1;"><strong>Personal Details</strong></h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Name <span class="required color_style"> * </span></label>
                                <input  onkeyup="allLatters(c_name, event)" type="text" 
                                class="form-control validName" name="c_name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label field_top">Surname <span class="required color_style"> * </span></label>
                                <input  onkeyup="Latters(c_surname, event)" type="text" 
                                 class="form-control validSurname" name="c_surname" required>
                            </div>
                        </div>
                        
                         <div class="col-md-4">
                            <div class="form-group label-floating">
                           <div style="padding:5px 0px 0px 0px;"> 
                                <label class="control-label">Gender <span class="required color_style"> * </span></label>
                                <select class="selectpicker_style_1" name="gender" required>
                                <option >Select Gender </option>
                                <option name="gender" value="male">Male</option>
                                <option name="gender" value="female">Female</option>
                                </select>
                            </div>
                            </div>
                        </div>
                    </div> 
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label field_top">Date of Birth <span class="required color_style"> * </span></label>
                                <input  type="date" class="form-control" name="DOB" required>
                            </div>    
                        </div>
                         <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label field_top">Contact <span class="required color_style"> * </span></label>
                                <input type="text" class="form-control" name="c_contact" id="phone" onkeypress="phoneno()" maxlength="10" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label field_top">Email</label>
                                <input type="email" class="form-control" name="email" >
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div style="padding:4px 0px 0px 0px;">
                            <div class="form-group label-floating">
                                <label class="control-label field_top">Age <span class="required color_style"> * </span></label>
                                <input type="text" class="form-control" name="Age" required>
                            </div>
                            </div>
                        </div>
                        <div   class="col-md-6">
                            <div class="form-group label">
                                <label class="control-label field_top">Anniversary <span class="required color_style"> * </span></label>
                                <input type="date"  class="form-control" name="Anniversary" id="phone" onkeypress="phoneno()" maxlength="10" required>
                            </div>
                        </div>
                    </div>

                 <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Address <span class="required color_style"> * </span></label>
                                <textarea cols="30" name="c_address"  class="form-control" required></textarea> 
                            </div>
                        </div>
                     
                      <div class="col-md-6">
                          <div style="padding:15px 0px 0px 0px;">
                            <div class="form-group label-floating">
                                <label class="control-label field_top">Referance <span class="required color_style"> * </span></label>
                                <input  type="text" class="form-control " name="Lead_By" required>
                            </div>
                          </div>
                        </div>
                    </div>  
                <div class="row">
                      <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label field_top">Comments</label>
                                <textarea  cols="30" name="Comments"  class="form-control" ></textarea> 
                            </div>
                        </div>
                       
                    <div class="col-md-6">
                        <div style="padding:14px 0px 0px 0px;">
                        <?php 
                                        if(isset($_POST['submit']))
                                        { file_put_contents("assets/client_image/$Name.jpg",file_get_contents($_FILES['img']['tmp_name']));
                                        }
                                    ?>
                                    Select image: <br><br>
                                    <input type="file" name="img" accept="image/*"/>
                        </div>
                    </div>
                </div>
                    
                  <br>  
              <h4 style="color:#3e79c1;"> <strong>Packages & Fitness Details</strong></h4>
                    <hr>
                   <div class="row">
                        <div class="col-md-6">
                      <div class="form-group label-floating">
                           <div style="padding:10px 0px 0px 0px;"> 
                                <label class="control-label">Select Batch <span class="required color_style"> * </span></label>
                                <select class="selectpicker_style" name="batch" required><option value="">Select Batch</option>
                                    <?php foreach($batch_view as $value): ?>
                                    <li>
                                        <option value="<?php echo $value->batch_id;?>"><?php echo "Name : ".$value->batch_name;  echo "Time : ".$value->batch_timing;?></option>
                                    </li>
                                    <?php endforeach; ?>
                                </select>
                          </div>
                        </div>
                       </div>
                     <div class="col-md-6">
                              <div class="form-group label-floating">
                           <div style="padding:10px 0px 0px 0px;"> 
                                <label class="control-label">Select Packages <span class="required color_style"> * </span></label>
                                <select id="timeunit" class="selectpicker_style" name="package" required><option value="">Select Packages</option>
                                    <?php foreach($packages_view as $value): ?>
                                    <li>
                                        <option value="<?php echo $value->Time_unit;?>"><?php echo $value->Catogary;?></option>
                                    </li>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                       </div>
                    </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Start Date</label>
                                <input type="date"  class="form-control" id='date1' value="<?php echo date('Y-m-d'); ?>" onblur="date()" name="startdate" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label field_top">End Date By <span class="required color_style"> * </span></label>
                                <input type="date" class="form-control" id='resultDate' name="enddate" required/>
                            </div>
                        </div>
                    </div>
                <div class="row">
                        <div class="col-md-3">
                            <div style="padding:4px 0px 0px 0px">
                            <div class="form-group label-floating">
                                <label class="control-label field_top">Fees <span class="required color_style"> * </span></label>
                                <input  onkeyup="allnumeric(c_fees, event)" id="Text1" type="text"  class="form-control validnumber" name="c_fees" required>
                            </div>
                             </div>
                        </div>
                        <div class="col-md-3">
                            <div style="padding:4px 0px 0px 0px">
                            <div class="form-group label-floating">
                                <label class="control-label field_top">Received <span class="required color_style"> * </span></label>
                                <input onkeyup="allnumerics(received, event)"  id="Text2" type="text" class="form-control validnumbers" name="received" required>
                            </div>
                                </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group label">
                                <label class="control-label">Balance <span class="required color_style"> * </span></label>
                                <input  type="text" onfocus="calc_balance()" id="txtresult"  class="form-control" name="balance" required readonly >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group label">
                                <label class="control-label">Date <span class="required color_style"> * </span></label>
                                <input type="date" class="form-control" name="date_before" required>
                            </div>
                        </div>
                    </div>    

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group label-floating">
                        <label class="control-label field_top">Nutritions/Diet <span class="required color_style"> * </span></label>
                        <input type="text" class="form-control" name="Diet_before" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group label-floating">
                        <label class="control-label field_top">Weight (KG) <span class="required color_style"> * </span></label>
                        <input type="text" class="form-control" name="Weight_before" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group label-floating">
                        <label class="control-label field_top">Height (CM) <span class="required color_style"> * </span></label>
                        <input type="text" class="form-control" name="height_before" required>
                    </div>
                </div> 
             </div> 
                
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label field_top">Comments</label>
                                <textarea cols="30" class="form-control" name="Comments"></textarea>
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
<!--footer,table serch script and session end here-->
<?php include 'footer.php'; ?>
<?php include 'validation_script.php'; ?>
<?php include 'endStart_script.php'; ?>
<?php include 'script_include.php'; ?>
<?php
}
else{ 
echo '<script language="javascript">';
echo 'alert("Access denied");window.location = "client.php" </script>';
}}

else //echo "<h1>No User Logged In</h1>";
{header('Location: index.php');}
?>

