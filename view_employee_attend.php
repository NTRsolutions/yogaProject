<?php 
if(isset($e_POST['submit'])){
      $e_attend_ID = $_POST['e_attend_ID'];
    # Create a connection
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, "http://localhost/yogaProject/view_employee_attendance_api.php/?e_attend_ID=$e_attend_ID");
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
    # Get the response
    $content = curl_exec($ch);
    $employee_attend = json_decode($content);
    $attend_view = $employee_attend->attendance_view;
    $attendance = $attend_view[0];
    $e_id = explode(",",$attendance->e_id);
    $attendance = explode(",",$attendance->attendance);
    }
?>

<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://localhost/yogaProject/view_employee_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$employee = json_decode($content);
$employee_view = $employee->employee_view;


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


  <?php $page=4;include 'sidebar.php'; ?>
   <?php $nav=7;include 'nav.php'; ?>

     <div class="content">
	            <div class="container-fluid">
	                <div class="row">

                        <div class="col-md-12">
                            <div class="card card-plain">
                                <div class="card-header" data-background-color="purple">
	                               <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search..">
                                     <i class="material-icons icon">search</i> 
                                     <h4 class="title">Employee Details</h4>


                                </div>
	                            </div>
	                            <div class="card-content">
                                    
                                        <table class="table table-hover">
                                            <thead class="text-primary">
                                                <th>Sr no.</th>
                                                <th>Employee ID</th>
                                                <th>Employee name</th>
                                                <th>Date</th>
                                                <th>Time </th>
                                            </thead>
                                           <?php print_r($employee_view);?>
                                            <tbody id="myTable"><?php        $i=1;foreach($e_id as $value):    
                                                foreach($employee_view as $employeevalue):
                                                if($employeevalue->e_ID == $value){ 
                                                ?> 
                                                <tr>
                                                    <td><?php echo $i;$i++; ?></td>
                                                    <td><?php echo $employeevalue->e_ID;?></td>
                                                    <td><?php echo $employeevalue->e_name." ".$employeevalue->e_surname;?></td>
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

<script>
function searchTable() {
    var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                found = true;
            }
        }
        if (found) {
            tr[i].style.display = "";
            found = false;
        } else {
            tr[i].style.display = "none";
        }
    }
}
</script>


<?php include 'script_include.php'; ?>
