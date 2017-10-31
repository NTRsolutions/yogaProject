<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>
<?php 
if(isset($_POST['e_attend_ID'])){
      $e_attend_id = $_POST['e_attend_ID'];
    # Create a connection
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, "http://yoga.classguru.in/view_employee_attendance_api.php/?e_attend_id=$e_attend_id");
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
    # Get the response
    $content = curl_exec($ch);
    $employee_attend = json_decode($content);
    $attend_view = $employee_attend->attendance_view;
    
    $attendance = $attend_view[0];
    $e_id = explode(",",$attendance->e_id);
    $attendance_empl = explode(",",$attendance->attendance);
  
    foreach($attendance_empl as $attendEmp){
         $e_attend =explode("-",$attendEmp);
        $e_id_emp[]=$e_attend[0];
        $e_id_duration[]=$e_attend[1];  
    }
    }
?>
<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://yoga.classguru.in/view_employee_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$employee = json_decode($content);
$employee_view = $employee->employee_view;
//print_r($employee_view);
?>

<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://yoga.classguru.in/view_e_attend_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$employee = json_decode($content);
$attend_view = $employee->e_attend_view;
//print_r($attend_view);
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
</style>
  <?php $page=5;include 'sidebar.php'; ?>
   <?php $nav=7;include 'nav.php'; ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header" data-background-color="purple">
                       <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search..">
                         <i class="material-icons icon">search</i> 
                         <h4 class="title">Employee Attendance Details</h4>


                    </div>
               </div>
        <div class="card-content">
<!--form start here-->            
            <form action="export_excel.php" method="post">
            <table class="table table-hover">
                <thead class="text-primary">
                    <th>Sr no.</th>
                    <th>Employee Id</th>
                    <th>Employee name</th>
                    <th>Duration </th>
                    <th>Attendance </th>
                </thead>

                <tbody id="myTable"><?php $i=1;foreach($e_id as $value):    
                    foreach($employee_view as $employeetvalue):
                    if($employeetvalue->e_ID == $value){
                    ?> 
                    <tr>
                        <td><input type="hidden" name="sr_no[]" value="<?php echo $i;$i++; ?>"/> <?php echo $i;$i++; ?></td>

                        <td><input type="hidden" name="e_id[]" value=" <?php echo $value;?>"/> <?php echo $value;?></td>

                        <td><input type="hidden" name="e_name[]" value="<?php echo $employeetvalue->e_name." ".$employeetvalue->e_surname;?>"/> <?php echo $employeetvalue->e_name." ".$employeetvalue->e_surname;?></td>


                        <td><input type="hidden" name="duration[]" value="<?php echo $e_id_duration[$ab1]?>"/> <?php if(in_array($value,$e_id_emp)){
                         $ab1 = array_search($value,$e_id_emp);
                            echo "<font color='red'>$e_id_duration[$ab1] day</font>" ;}
                            else {echo "<font color='green'>full day</font";}

                            ?></td>

                        <td><input type="hidden" name="attendance[]" value="<?php $ab = in_array($value,$e_attend); 
                        if($ab >0 || in_array($value,$e_id_emp)){ echo "absent";}
                        else {echo "present";}?>"/> <?php $ab = in_array($value,$e_attend); 
                        if($ab >0 || in_array($value,$e_id_emp)){ echo "<font color='red'>absent</font>";}
                        else {echo "<font color='green'>present</font";}?></td>

                        </tr><?php }endforeach;endforeach; ?>
            </tbody>
        </table>

            <table  class="table table-hover">
                <tr>
                    <thead class="text-primary">
                    <th> Total Attendance</th>
                    <th>Present</th>
                    <th>Absent</th>
                    </thead>
                </tr>

                <tr><?php  $emplo_no=count($e_id);
                $absent= count($e_id_emp); ?>
                <?php  $present=$emplo_no-$absent; ?>
                <tbody id="myTable">
                <td><bold>Total</bold></td>
                <td><?php echo $present; ?></td>
                <td><?php echo $absent; ?></td>
                </tbody>
                </tr>

            </table>

            <button class="btn btn-primary pull-right" type="submit" name="submit" ><font color='white'>Export Attendance</font></button>
        </form>
<!--form end here-->            
        </div>
    </div>
</div>
</div>
</div>
<?php include 'footer.php'; ?>
<?php include 'validation_script.php'; ?>
<?php include 'script_include.php'; ?>
<?php include 'tablesearch_script.php'; ?>
<?php
}
else  {header('Location: index.php');}//echo "<h1>No User Logged In</h1>";
?>
