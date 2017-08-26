<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://localhost/yogaproject/view_batch_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$batch = json_decode($content);
$batch_view = $batch->batch_view;
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

  <?php $page=6;include 'sidebar.php'; ?>
   <?php include 'nav.php'; ?>
<?php 
include 'config.php';
if(isset($_POST['submit'])){ 
if(isset($_POST['batch_name']) && isset($_POST['batch_timing'])){
    
     $batch_name = $_POST['batch_name'];
     $batch_timing = $_POST['batch_timing'];
     $data = array(
        'batch_name' => $_POST['batch_name'],
        'batch_timing' => $_POST['batch_timing'],
    );
    //print_r($data);
    # Create a connection
    $url = 'http://localhost/yogaproject/add_batch_api.php';
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



    // output data of each row
/*    while($row = $result->fetch_assoc()) {
        echo "<br> batch_name: ". $row["batch_name"]. " - batch_timing: ". $row["batch_timing"]. "<br>";
    }*/

    
}     
?>
     <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Batches</h4>
									<p class="category">Fill up the Required Batch</p>
	                            </div>
	                            <div class="card-content">
	                                <form action="add_batch.php" method="post">
	                               
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Name</label>
													<input type="text" class="form-control" name="batch_name">
												</div>
	                                        </div>
	                               

                                        
	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Time</label>
													<input type="text" class="form-control" name="batch_timing">
												</div>
	                                        </div>
	                                    </div>
                                        
                                        
                                        <button type="submit" class="btn btn-primary pull-right" name="submit">Add Batch</button>
	                                    <div class="clearfix"></div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
                        
                        
                        
                              
                               <div class="col-md-12">
	                        <div class="card card-plain">
	                            <div class="card-header" data-background-color="purple">
	                                 <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search..">
                                     <i class="material-icons icon">search</i> 
                             <h4 class="title">Batch Details</h4>


						         </div>
	                        </div>
	                            <div class="card-content">
	                                <table class="table table-hover">
	                                    <thead class="text-primary">
	                                        <th>Sr no.</th>
	                                    	<th>Batch id</th>
	                                    	<th>Name</th>

	                                    	<th>Timings</th>
	                                    	<th></th>
                                        </thead>

	                                    <tbody id="myTable"><?php $i=1;foreach($batch_view as $value): ?>

	                                        <tr>
	                                        	<td><?php echo $i; $i++; ?></td>
	                                        	<td><?php echo $id = $value->batch_id; ?></td>
	                                        	<td><?php echo $value->batch_name; ?></td>
	                                        	<td><?php echo $value->batch_timing; ?></td>
	                                        	
                                                <td style="width:20px!important;"><a href="edit_batch.php" class="btn btn-sm btn-warning">Edit</a></td>
                                                <td style="width:20px!important;">     <div class="dropdown">
                                                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Delete
                                                        <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="delete_batch_api.php/?b_id=<?= $id?>">Yes confirm</a></li>
                                                        <li><a href="#">No</a></li>
                                                    </ul>
                                                    </div>
                                                </td>                                       
	                                       </tr>
                                            <?php endforeach; ?>
	                                        
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
