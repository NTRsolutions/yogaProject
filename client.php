<?php include 'header.php'; ?>
<style>

    #myInput{
        width:20%;
        float:right
    }
    
    .form-group{
        padding-bottom: 0px!important;
        margin: 0 0 0 0!important;
    }
    
    .icon{
    
        float:right;
    }

</style>

<?php include 'sidebar.php'; ?>
<?php include 'nav.php'; ?>
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
       
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Client<p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="add_client.php">
                                <i class="material-icons">plus_one</i> Add New Client
                            </a>
							 	
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Attendance</p>
<!--					   				<h3 class="title">50</h3>-->
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="attendance.php">
                                <i class="material-icons">plus_one</i> Mark Attendance
                            </a>
				
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <i class="material-icons">info_outline</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Performance</p>
<!--					   				<h3 class="title">75</h3>-->
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">plus_one</i> Add Performance
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header" data-background-color="purple">
                
                        
                          <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search..">
                                     <i class="material-icons icon">search</i> 
                                     <h4 class="title">Client Details</h4>


                          
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table table-hover">
                            <thead class="text-primary">
                                <th>Sr no.</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Status</th>
                                <th></th>
                                  <th></th>
                            </thead>
                            <tbody><?php $i=1;foreach($client_view as $value): ?>
                                <tr>
                                    <td><?php echo $i;$i++; ?></td>
                                    <td><?php echo $value->c_ID; ?></td>
                                    <td><?php echo $value->c_name; ?></td>
                                    <td><?php echo $value->contact; ?></td>
                                    <?php if($value->status_payment == 'unpaid'){ ?>
                                    <td><font style="color:red"><?php echo $value->status_payment;?></font></td>
                                    <?php }?>
                                    <?php if($value->status_payment == 'paid'){ ?>
                                    <td><font style="color:green"><?php echo $value->status_payment;?></font></td>
                                    <?php }?>
                                    
                                   <td><a href="edit_client.php" class="btn btn-warning">Edit</a></td> 
                                    
                                    

                                  <td>   <a class="btn btn-primary" href="delete.page?id=1" onclick="return confirm('Are you sure you want to delete?')">Delete</a> </td>
  
                                   
                                                                       
                                </tr><?php endforeach;?>
                            </tbody>
                        </table>
	                </div>   
                </div>
            </div>
        </div>
    </div>
</div>



					
			<?php include 'footer.php'; ?>

<?php include 'script_include.php'; ?>
