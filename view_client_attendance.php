<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>

<?php 
if(isset($_POST['submit'])){
      $c_attend_ID = $_POST['c_attend_ID'];
    # Create a connection
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, "http://localhost/yogaProject/view_client_attendance_api.php/?c_attend_ID=$c_attend_ID");
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
    # Get the response
    $content = curl_exec($ch);
    $client_attend = json_decode($content);
    $attend_view = $client_attend->attendance_view;
    $attendance = $attend_view[0];
    $c_id = explode(",",$attendance->c_id);
    $attendance = explode(",",$attendance->attendance);
    }
?>

<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://localhost/yogaProject/view_client_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$client = json_decode($content);
$client_view = $client->client_view;

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
   <?php $nav=4;include 'nav.php'; ?>

     <div class="content">
	            <div class="container-fluid">
	                <div class="row">

                        <div class="col-md-12">
                            <div class="card card-plain">
                                <div class="card-header" data-background-color="purple">
	                               <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search..">
                                     <i class="material-icons icon">search</i> 
                                     <h4 class="title">Client Details</h4>


                                </div>
	                            </div>
	                            <div class="card-content">
                                    
                                        <table class="table table-hover">
                                            <thead class="text-primary">
                                                <th>Sr no.</th>
                                                <th>Client Id</th>
                                                <th>Client name</th>
                                                <th>Attendance </th>
                                            </thead>
                                           
                                            <tbody id="myTable"><?php        $i=1;foreach($c_id as $value):    
                                                foreach($client_view as $clientvalue):
                                                if($clientvalue->c_ID == $value){
                                                ?> 
                                                <tr>
                                                    <td><?php echo $i;$i++; ?></td>
                                                    <td><?php echo $value;?></td>
                                                    <td><?php echo $clientvalue->c_name." ".$clientvalue->c_surname;?></td>
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
<?php
}
else echo "<h1>No User Logged In</h1>";
?>
