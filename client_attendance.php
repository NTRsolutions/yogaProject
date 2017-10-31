<?php
// Start the session
session_start();
if(!empty($_SESSION)){
if(($_SESSION['permission']!='operator') && ($_SESSION['permission']!='user')){
/*session for user access control*/
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
if(isset($_POST['submit'])){
     $batch_id = $_POST['batch_id'];
    # Create a connection
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, "http://yoga.classguru.in/view_client_batch_api.php/?batch_id=$batch_id");
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
    # Get the response
    $content = curl_exec($ch);
    $client = json_decode($content);
    $client_view = $client->client_view;
    }
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
      .selectpicker_style {
       width:250px;
       height:33px;
        }
    
     .field_top{
        top:-27px!important;
    }
    
      .color_style {
        color:red;
    }
    
</style>
<?php $page=4;include 'sidebar.php'; ?>
<?php $nav=4;include 'nav.php'; ?>
<div class="content">
    <div class="container-fluid">
        <?php 
    if(isset($_POST['submit'])){
        include 'config.php';
        $batch_id = $_POST['batch_id'];
        $date = $_POST['date'];
        $timing = $_POST['timing'];
        $data = array(
            'batch_id' => $batch_id,
            'date' => $date,
            'timing' => $timing
        );
        //print_r($data);
        # Create a connection
        $url = 'http://yoga.classguru.in/add_clientbatch_attend_api.php';
        $ch = curl_init($url);
        # Form data string
        $postString = http_build_query($data, '', '&');
        # Setting our options
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        # Get the response
        $response = curl_exec($ch);
        //print_r($response);
        curl_close($ch);
        $sql = "SELECT MAX(`c_attend_ID`) FROM c_attend";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $c_attend_ID = $row['MAX(`c_attend_ID`)'];
        }
        ?>
        <div class="row">
<!-- card for view client add client,client attendance,client payment-->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">person</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Client</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="view_attendance.php"><i class="material-icons">plus_one</i> View   client attendance</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
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
            <div class="col-lg-3 col-md-6 col-sm-6">
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
            <div class="col-lg-3 col-md-6 col-sm-6">
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
                        <h4 class="title"> Enter Batch Details</h4>
                        <!--<p class="category"></p>-->
                    </div>
                    <div class="card-content">
<!-- form for enter batch detail-->                        
                        <form action="client_attendance.php" method="post">
                            <div class="col-md-4">
                                <div style="padding:32px 0px 0px 0px!important;">
                                <div style="width:250px;" class="form-group label-floating">
                            <label class="control-label">Select Batch<span class="required color_style"> * </span></label>
                                    <select class="selectpicker_style" name="batch_id" required>
                                        <option value="">Name ---  Timing</option>
                                        <?php foreach($batch_view   as $value): ?>
                                        <option value="<?php echo $value->batch_id;?>"><?php echo $value->batch_name." --- ".$value->batch_timing; ?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                             </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                       <label class="control-label">Date <span class="required color_style"> * </span></label>
                                    <!--<label class="control-label">date</label>-->
                                    <input style="margin-top:28px;" type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>"name="date" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label field_top">Timing <span class="required color_style"> * </span></label>
                                    <input style="margin-top:28px;" type="text" class="form-control" name="timing" required>
                                </div>
                            </div>
                            <div class="row">
                                <button style="margin-right:20px;" type="submit" class="btn btn-primary pull-right" name="submit">Submit</button>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<!--if batch detail is submited then view client detail of that batch-->                
            <?php if(isset($_POST['submit'])):?>
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header" data-background-color="purple">
                        <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search..">
                            <i class="material-icons icon">search</i> 
                        <h4 class="title">Client Details</h4>
                    </div>
                </div>
                <div class="card-content">
                    <form action="mark_client_attend_api.php" method="post">
<!--client detail of batch -->                        
                        <table class="table table-hover">
                            <thead class="text-primary">
                                <th>Sr no.</th>
                                <th>Client Id</th>
                                <th>Name</th>
                                <th>Mark Absent </th>
                            </thead>
                            <input type="hidden" value="<?php echo $c_attend_ID;?>"             name="c_attend_ID" >
                            <tbody id="myTable"><?php $i=1;foreach($client_view as   $value): ?>
                                <tr>
                                    <td><?php echo $i;$i++; ?></td>
                                    <td><input type="hidden" name="client_id[]" value="<?php echo $value->c_ID; ?>"><?php echo $value->c_ID; ?>     </td>
                                    <td><?php echo $value->c_name." ".$value->c_surname; ?></td>
                                    <td><input type="checkbox" value="<?php echo $value->c_ID;  ?>" name="absent_client[]"></td>
                                </tr><?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <button type="submit" class="btn btn-primary pull-right" name="mark">Mark   Attendance</button>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
            <?php endif;?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<?php include 'tablesearch_script.php'; ?>
<?php include 'script_include.php'; ?>
<?php
} else{
    
echo '<script language="javascript">';
echo 'alert("Access denied");window.location = "view_attendance.php" </script>';}
}
else {header('Location: index.php');}//echo "<h1>No User Logged In</h1>";
?>
