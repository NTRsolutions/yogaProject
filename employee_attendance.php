<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>
<?php include 'header.php';
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://yoga.classguru.in/view_employee_api.php');
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
      $timing = $_POST['timing'];
      $eid = $_POST['eid'];
      if(!isset($_POST['checkbox'])){
          $checkbox=NULL;
      }else{
          $checkbox = $_POST['checkbox'];
      }
      $data = array(
          'date' => $date,
          'timing' => $timing,
          'eid'=>$eid,
          'checkbox' => $checkbox
      );
      //print_r($data);
      # Create a connection
      $url = 'http://yoga.classguru.in/add_employee_attend_api.php';
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
                        <p class="category">Employee</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="view_employee_attendance.php"><i class="material-icons">plus_one</i> View employee attendance</a> 
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
                        <p class="category">Employee<p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="add_employee.php">
                                <i class="material-icons">plus_one</i> Add New Employee
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
                            <a href="employee_attendance.php">
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
                            <a href="employee_payment.php"><i class="material-icons">plus_one</i> Add Payment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
            <form action="employee_attendance.php" method="post">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Employee Attendance</h4>
                        </div>
                        <div class="card-content">
                            <div class="col-md-6">
                                <div class="form-group label-   floating">
                                    <input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>"name="date">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Timing</label>
                                        <input type="text" class="form-control" name="timing">
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
                            <h4 class="title">Employee Attendance Details</h4>
                        </div>
                    </div>
                    <div class="card-content">
                        <table class="table table-hover">
                            <thead class="text-primary">
                                <th>Sr no.</th>
                                <th>Employee Id</th>
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
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<?php include 'tablesearch_script.php'; ?>
<?php include 'script_include.php'; ?>
<?php
}
else echo "<h1>No User Logged In</h1>";
?>
