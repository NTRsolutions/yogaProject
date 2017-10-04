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
    <div class="content">
        <div class="container-fluid">
            <?php 
            if(isset($_POST['submit']) && isset($_POST['Catogary'])){ 
                
                $data = array(
                        'Catogary' => $_POST['Catogary'],
                        'Active' => $_POST['Active'],
                        'Name_of_plan' => $_POST['Name_of_plan'],
                        'Time_unit' => $_POST['Time_unit'],
                        'batch' => $_POST['batch'],
                        'Description' => $_POST['Description']
                    );

                
                    # Create a connection
                    $url = 'http://yoga.classguru.in/add_packages_api.php';
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
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">people</i>
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
          <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Add packages</h4>
                            <p class="category">Fill up the packages Form</p>
                        </div>
                        <div class="card-content">
                            
                            <form action="add_packages.php" method="post" >
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Catogary Name </label>
                                            <input   type="text" 
                                            class="form-control validName" name="Catogary" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Active </label>
                                            <input  type="text" 
                                             class="form-control validSurname" name="Active" required>
                                        </div>
                                    </div>
                             
                                    <div class="col-md-4">
                                       <div class="form-group label-floating">
                                            <label class="control-label" >Name of plan : </label>
                                           <input  type="text" 
                                             class="form-control validSurname" name="Name_of_plan" required>
                                         </div>
                                    </div>
                                   </div>
                                <div class="row">
                                         <div style="margin:35px 0 0 0" class="col-md-6">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            </a>
                                            <label for="business">Time unit:</label>
                                            <select style="width:300px; height:38px;" name="Time_unit" required><option value="">Time unit:</option>
                                                
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
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                                                <p class="hidden-lg hidden-md">Notifications</p>
                                            </a>
                                            <label for="business">Select Batch:</label>
                                            
                                            <select style="width:300px; height:38px;" name="batch"  required  ><option value="">Select Batch</option>
                                           <?php foreach($batch_view as $value): ?>
                                           
                                                <li>
                                                    <option   value="<?php echo $value->batch_id;?>"><?php echo $value->batch_name;?></option>
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
                                            <textarea rows="3" cols="30" name="Description"  class="form-control" required></textarea> 
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
<?php include 'script_include.php'; ?>
<?php
}
else echo "<h1>No User Logged In</h1>";
?>
