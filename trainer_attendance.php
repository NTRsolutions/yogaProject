<?php
// Start the session
session_start();
if(!empty($_SESSION)){
if(($_SESSION['permission']!='operator') && ($_SESSION['permission']!='user')){
/*user acceess control by session */
?>
<?php include 'header.php';
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://yoga.classguru.in/view_trainer_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$employee = json_decode($content);
$employee_view = $employee->employee_view;
 ?>  
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
<?php $page=5;include 'sidebar.php'; ?>
<?php $nav=7;include 'nav.php'; ?>
<div class="content">
    <div class="container-fluid">
<?php 
  if(isset($_POST['submit'])){
      $date = $_POST['date'];
      $in_time = $_POST['in_time'];
      $out_time = $_POST['out_time'];
      $eid = $_POST['eid'];
      if(!isset($_POST['checkbox'])){
          $checkbox=NULL;
      }else{
          $checkbox = $_POST['checkbox'];
      }
      $data = array(
          'date' => $date,
          'in_time' => $in_time,
          'out_time' => $out_time,
          'eid'=>$eid,
          'checkbox' => $checkbox
      );
      //print_r($data);
      # Create a connection
      $url = 'http://yoga.classguru.in/add_trainer_attend_api.php';
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
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="blue">
                    <i class="material-icons">people</i>
                </div>
                <div class="card-content">
                    <p class="category">Trainer</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="view_trainer_attendance.php"><i class="material-icons">plus_one</i> View Trainer attendance</a> 
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-4">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <i class="material-icons">people</i>
                </div>
                <div class="card-content">
                    <p class="category">Trainer<p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="trainer.php">
                            <i class="material-icons">plus_one</i> View Trainer
                        </a>
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
                    <p class="category">Trainer<p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="add_trainer.php">
                            <i class="material-icons">plus_one</i> Add New Trainer
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
                    <p class="category">Trainer Payment</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="trainer_payment.php"><i class="material-icons">plus_one</i> Add Trainer Payment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
<!--form start here-->            
            <form action="trainer_attendance.php" method="post">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">trainer Attendance</h4>
                        </div>
                        <div class="card-content">
                            <div class="col-md-6">
                                <div class="form-group label-   floating">
                                    <input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>"name="date">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">In Time :
                                    <div class="form-group label-floating">
                                        <label class="control-label"></label>
                                        <input type="time" class="form-control" name="in_time">
                                    </div>
                                </div>
                                <div class="col-md-3">Out Time :
                                    <div class="form-group label-floating">
                                        <label class="control-label"></label>
                                        <input type="time" class="form-control" name="out_time">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-plain">
                        <div class="card-header" data-background-color="purple">
                            <input type="text" class="form-control"     id="myInput" onkeyup="searchTable()" placeholder="Search..">
                            <i class="material-icons icon">search</i> 
                            <h4 class="title">Trainer Attendance Details</h4>
                        </div>
                    </div>
                    <div class="card-content">
                        <table class="table table-hover">
                            <thead class="text-primary">
                                <th>Sr no.</th>
                                <th>Trainer Id</th>
                                <th>Name</th>
                                <th>Mark Absent </th>
                            </thead>
                            <tbody id="myTable"><?php  $i=1;foreach($employee_view as $value): ?>
                                <tr>
                                    <input type="hidden" value="<?php echo $value->e_ID; ?>"    name="eid[]">
                                    <td><?php echo $i;$i++; ?></td>
                                    <td><?php echo $value->e_ID; ?></td>
                                    <td><?php echo $value->e_name." ".$value->e_surname; ?></td>
                                    <td><input type="checkbox"  value="<?php echo $value->e_ID; ?>" name="checkbox[]" ></td>
                                </tr><?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <button type="submit" class="btn btn-   primary pull-right"     name="submit">Mark Attend</button>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </form>
            <!--form end here-->
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<?php include 'tablesearch_script.php'; ?>
<?php include 'script_include.php'; ?>
<?php
} else{
    
echo '<script language="javascript">';
echo 'alert("Access denied");window.location = "view_trainer_attendance.php" </script>';}
}
else {header('Location: index.php');}// echo "<h1>No User Logged In</h1>";
?>
