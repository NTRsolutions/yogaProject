<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://localhost/yogaproject/view_batch_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$batch = json_decode($content);
$batch_view = $batch->batch_view;
if(isset($_POST['submit'])){
     $batch_id = $_POST['batch_id'];
     /*$date = $_POST['date'];
     $timing = $_POST['timing'];
    $data = array(
        'batch_id' => $batch_id,
        'date' => $date,
        'timing' => $timing
    );
    //print_r($data);
    # Create a connection
    $url = 'http://localhost/yogaproject/add_clientbatch_attend_api.php';
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
    curl_close($ch);*/    
        
    # Create a connection
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, "http://localhost/yogaProject/view_client_batch_api.php/?batch_id=$batch_id");
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

</style>


  <?php $page=4;include 'sidebar.php'; ?>
   <?php $nav=4;include 'nav.php'; ?>

     <div class="content">
	            <div class="container-fluid">
	                <div class="row">
                        <?php 
                            if(isset($_POST['submit'])){
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
                                $url = 'http://localhost/yogaproject/add_clientbatch_attend_api.php';
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
	                    <div class="col-md-12">
	                        <div class="card">
                                
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title"> Enter Batch Details</h4>
									<!--<p class="category"></p>-->
	                            </div>
	                            <div class="card-content">
	                                <form action="client_attendance.php" method="post">
	                                    <div class="col-md-4">
                                            <div class="form-group label-   floating">
                                                <label for="business">Select        Batch:</label>
                                                <select name="batch_id" required>
                                                    <option value="">Name ---   Timing</option>
                                                    <?php foreach($batch_view   as $value): ?>
                                                    <option value="<?php echo $value->batch_id;?>"><?php echo $value->batch_name." --- ".$value->batch_timing; ?></option>
                                                    <?php endforeach?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<!--<label class="control-label">date</label>-->
													<input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>"name="date">
												</div>
	                                        </div>
	                                   <div class="col-md-4">
                                           <div class="form-group label-floating">
                                               <label class="control-label">Timing</label>
                                               <input type="text" class="form-control" name="timing">
                                           </div>
                                        </div>
                                        <div class="row">
                                            <button type="submit" class="btn btn-primary pull-right" name="submit">Submit</button>
                                            <div class="clearfix"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                          <?php if(isset($_POST['submit'])):?>
                        <div class="col-md-12">
                            <div class="card card-plain">
                                <div class="card-header" data-background-color="purple">
	                               <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search..">
                                     <i class="material-icons icon">search</i> 
                                     <h4 class="title">Client Details</h4>


                                </div>
	                            </div>
	                            <div class="card-content"><form>
	                                <table class="table table-hover">
	                                    <thead class="text-primary">
	                                        <th>Sr no.</th>
	                                    	<th>Client Id</th>
	                                    	<th>Name</th>
	                                    	
	                                    	<th>Mark Absent </th>
                                            
                                            
	                                    </thead>
                                        
                                            <tbody id="myTable"><?php  $i=1;foreach($client_view as $value): ?>
                                                <tr>
                                                    <td><?php echo $i;$i++; ?></td>
                                                    <td><?php echo $value->c_ID; ?></td>
                                                    <td><?php echo $value->c_name." ".$value->c_surname; ?></td>

                                                    <td><input type="checkbox" value="<?php echo $value->c_ID; ?>" ></td>
                                                </tr><?php endforeach; ?>
                                            </tbody>
                                            
                                        
                                    </table>
                                    <div class="row">
                                        <button type="submit" class="btn btn-primary pull-right" name="submit">Mark Attend</button>
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
