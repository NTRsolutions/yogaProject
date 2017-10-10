<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>
<?php 
if(isset($_POST['submit'])){
      $e_attend_id = $_POST['e_attend_ID'];
    # Create a connection
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, "http://yoga.classguru.in/view_trainer_attendance_api.php/?e_attend_id=$e_attend_id");
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
    # Get the response
    $content = curl_exec($ch);
    $employee_attend = json_decode($content);
    $attend_view = $employee_attend->attendance_view;
    $attendance = $attend_view[0];
    $e_id = explode(",",$attendance->e_id);
    $attendance = explode(",",$attendance->attendance);
    //print_r($attendance);
    }
?>
<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://yoga.classguru.in/view_trainer_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$employee = json_decode($content);
$employee_view = $employee->employee_view;
//print_r($employee_view);
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
                                     <h4 class="title">Trainer Attendance Details</h4>


                                </div>
	                            </div>
	                            <div class="card-content">
                                    
                                        <table class="table table-hover">
                                            <thead class="text-primary">
                                                <th>Sr no.</th>
                                                <th>Trainer Id</th>
                                                <th>Trainer name</th>
                                                <th>Attendance </th>
                                            </thead>
                                           
                                            <tbody id="myTable"><?php        $i=1;foreach($e_id as $value):    

                                                foreach($employee_view as $employeetvalue):
                                                if($employeetvalue->e_ID == $value){
                                                ?> 
                                                <tr>
                                                    <td><?php echo $i;$i++; ?></td>
                                                    <td><?php echo $value;?></td>
                                                    <td><?php echo $employeetvalue->e_name." ".$employeetvalue->e_surname;?></td>
                                                    <td><?php $ab = in_array($value,$attendance); 
                                                    if($ab >0){ echo "<font color='red'>absent</font>";}
                                                    else {echo "<font color='green'>present</font";}?></td>
                                                    </tr><?php }endforeach;endforeach; ?>
                        </tbody>
                    </table>
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
else echo "<h1>No User Logged In</h1>";
?>
