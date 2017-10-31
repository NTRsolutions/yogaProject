<?php
// Start the session
session_start();
if(!empty($_SESSION)){
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
<?php 
 # Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://yoga.classguru.in/view_employee_api.php');
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
    #inlist{
        overflow: hidden;
        word-wrap:normal |break-word;
    }
    .dropdown-menu_1 {
    position: relative;
   }
    
    #drop_style{
      min-width: 50px!important; 
    }
  
    .dropdown-toggle_1 {
       float:left;
       margin-top:20px;
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
                    <div class="card-content table-responsive">
                    <table id="inlist" class="table table-hover table-striped">
                            <thead class="text-primary">
                                <th>Sr no.</th>
                                <th>Attendance No</th>
                              <!--  <th>Employee Name</th>-->
                                <th>Date</th>
                                <th>IN Time </th>
                                <th>Out Time </th>
                            </thead>

                        <tbody id="myTable">

                            <?php  $i=1;foreach($attend_view as $value):   ?>
                            <tr>
                                <td><?php echo $i;$i++; ?></td>
                                <td><?php echo $value->e_attend_ID; ?> </td>
                                <!--<td><?php print_r($e_name->e_name) ?> </td>-->

                                <td><?php $e_attend_ID=$value->e_attend_ID ?>
                                <form action="view_attendance_employee.php" method="post">
                                <input type="hidden" value="<?php echo $e_attend_ID; ?>" name="e_attend_ID" >
                                <input type="submit" value="<?php echo $value->date; ?>" name="submit">
                                    </form>
                                </td>
                                <td><?php echo $value->in_time; ?></td>
                                <td><?php echo $value->out_time; ?></td>
                                
                                <td >
                                <div class="dropdown">
<!--user acess control for delete button-->                                     
                                    <?php  if(($_SESSION['permission'] == 'admin' || 'superadmin' )&&(($_SESSION['permission']!='operator')&&($_SESSION['permission']!= 'user'))){?> 
                                    <button  class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle_1" type="button" data-toggle="dropdown">
                                        <i class="material-icons">delete</i>
                                <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu_1" id="drop_style">
                                    <li><a tabindex="-1" href='delete_empl_attend_api.php/?e_attend_ID=<?= $e_attend_ID;?>'>Yes</a></li>
                                    <li><a tabindex="-1" href="#">No</a></li>
                                    </ul><?php } ?>
                                </div>
                                </td>
                            </tr><?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
     </div>
</div>

<script>
$('.dropdown-toggle_1').click(function() {
  dropDownFixPosition($('button'), $('.dropdown-menu_1'));
});
function dropDownFixPosition(button, dropdown) {
  var dropDownTop = button.offset().top + button.outerHeight();
  dropdown.css('top', dropDownTop + "px");
  dropdown.css('right', button.offset().right + "px");
}
</script>

<?php include 'footer.php'; ?>
<?php include 'tablesearch_script.php'; ?>
<?php include 'script_include.php'; ?>
<?php
}
else  {header('Location: index.php');}//echo "<h1>No User Logged In</h1>";
?>
