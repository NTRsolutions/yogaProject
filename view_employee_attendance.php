
<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>

<?php  

# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://localhost/yogaProject/view_e_attend_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$employee = json_decode($content);
$attend_view = $employee->e_attend_view;
//print_r($attend_view);
?>

<?php 
 # Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://localhost/yogaProject/view_employee_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$employe = json_decode($content);
$e_name = $employe->employee_view;
//print_r($e_name);
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
                                    
                                        <table class="table table-hover">
                                            <thead class="text-primary">
                                                <th>Sr no.</th>
                                                <th>Employee ID</th>
                                                <th>Date</th>
                                                <th>Time </th>
                                            </thead>
                                           
                                            <tbody id="myTable">
                                                
                                                <?php        $i=1;foreach($attend_view as $value):     ?>
                                                <tr>
                                                    <td><?php echo $i;$i++; ?></td>
                                                    <td><?php echo $value->e_attend_ID; ?> </td>
                                                    
                                                        <td><?php $e_attend_ID=$value->e_attend_ID ?>
                                                        <form action="view_attendance_employee.php" method="post">
                                                        <input type="hidden" value="<?php echo $e_attend_ID; ?>" name="e_attend_ID" >
                                                    <input type="submit" value="<?php echo $value->date; ?>" name="submit">
                                                        </form>
                                                    </td>
                                                    <td><?php echo $value->time; ?></td>
                                                </tr><?php endforeach; ?>
                                               
                                            </tbody>
                                    </table>
                            </div>
                        </div>
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
