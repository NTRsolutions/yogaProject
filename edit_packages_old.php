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

<?php include 'config.php'; ?>
<?php include 'header.php'; ?>
<?php $page=8;include 'sidebar.php'; ?>
<?php $nav=8;include 'nav.php'; ?>
<?php  
if(isset($_POST['Cat_ID'])){
    $id = $_POST['Cat_ID'];
    $data = array('Cat_ID'=> $id);
    # Create a connection
    $url = 'http://yoga.classguru.in/view_edit_packages_api.php';
    $ch = curl_init($url);
    # Form data string
    $postString = http_build_query($data, '', '&');
    # Setting our options
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    # Get the response
    $content = curl_exec($ch);
    
    $package_detail = json_decode($content);
    $packages_view =$package_detail->packages_view[0];
    print_r($content);
}
?>
    <div class="content">
        <div class="container-fluid">
            
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">local_offer</i>
                    </div>
                    <div class="card-content">
                        <p class="category">packages<p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="packages.php">
                                <i class="material-icons">plus_one</i> view packages
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            
            <!--<div class="col-lg-4 col-md-6 col-sm-6">
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
            </div>-->
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Edit packages</h4>
                            <p class="category">Fill up the packages Form</p>
                        </div>
                        <div class="card-content">
                            
                            <form action="edit_packages_api.php" method="post" >
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Catogary </label>
                                            <input   type="text" 
                                            class="form-control validName" name="Catogary" value=<?php echo $packages_view->Catogary ?> required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Active </label>
                                            <input  type="text" 
                                             class="form-control validSurname" name="Active" value=<?php echo $packages_view->Active ?> required>
                                        </div>
                                    </div>
                             
                                    <div class="col-md-4">
                                       <div class="form-group label-floating">
                                            <label class="control-label" >Name of plan : </label>
                                           <input  type="text" 
                                             class="form-control validSurname" name="Name_of_plan" value=<?php echo $packages_view->Name_of_plan; ?> required>
                                         </div>
                                    </div>
                                   </div>
                                <div class="row">
                                         <div style="margin:35px 0 0 0" class="col-md-6">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            </a>
                                            <label for="business">Time unit:</label>
                                            <select style="width:300px; height:38px;" name="Time_unit"  required>
                                                  <li>
                                                    <option value="<?php echo Cat_ID;?>"><?php echo $packages_view->Time_unit;?></option>
                                                    </li>
                                                <?php echo $packages_view->Time_unit; ?><option value="<?php echo $packages_view->Time_unit; ?>">Time unit:</option>
                                                
                                                <li>
                                                    <option value="Monthly">Monthly</option>
                                                    <option value="Quartely">Quartely</option>
                                                    <option value="half_yearly">Half yearly</option>
                                                    <option value="yearly">Yearly</option>  
                                                </li>
                                            </select>
                                        </div>
                                    </div>  
                                    <div style="margin:35px 0 0 0" class="col-md-6">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <p class="hidden-lg hidden-md">Notifications</p>
                                            </a>
                                            <label for="business">Select Batch:</label>
                                            <select style="width:300px; height:38px;" name="batch" required>
                                              
                                                <option value="<?php echo $packages_view->batch; ?>">Select Batch</option>
                                                <?php foreach($batch_view as $value): ?>
                                                <li>
                                                    <option value="<?php echo $value->batch_id;?>"><?php echo $value->batch_name;?></option>
                                                </li>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>  
                                </div>  
                                    
	                    
                               <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Description</label>
                                            
                                            <textarea rows="3" cols="30" name="Description"  class="form-control"   required><?php echo $packages_view->Description; ?></textarea> 
                                        </div>
                                    </div>       
                                </div>
                            
                                <input type="hidden" value="<?php echo $packages_view->Cat_ID; ?>" name="Cat_ID"> 
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
<?php include 'script_include.php'; ?>
<?php
}
else echo "<h1>No User Logged In</h1>";
?>
