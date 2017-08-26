<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://localhost/yogaProject/view_employee_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$employe = json_decode($content);
$employee_view = $employe->employee_view;
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


  <?php $page=3;include 'sidebar.php'; ?>
   <?php include 'nav.php'; ?>
	   
           <div class="content">
				<div class="container-fluid">
					<div class="row">
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
                                      <i class="material-icons">people</i>
								</div>
								<div class="card-content">
									<p class="category">Attendance</p>
<!--									<h3 class="title">50</h3>-->
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
									<i class="material-icons">info_outline</i>
								</div>
								<div class="card-content">
									<p class="category">Payment</p>
<!--									<h3 class="title">75</h3>-->
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">plus_one</i> Add Payment
									</div>
								</div>
							</div>
						</div>

                 
                
                                
	                    <div class="col-md-12">
	                        <div class="card card-plain">
	                            <div class="card-header" data-background-color="purple">
	                                <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search..">
                                     <i class="material-icons icon">search</i> 
                                     <h4 class="title">Employee Details</h4>

 
					        	</div>
	                        </div>
	                            <div class="card-content table-responsive">
	                                <table class="table table-hover" >
	                                    <thead class="text-primary">
	                                        <th>Sr no.</th>
	                                    	<th>ID</th>
	                                    	<th>Name</th>
	                                    	<th>Contact</th>
	                                    	<th>Status</th>
                                            <th></th>
	                                    	<th></th>
	                                   </thead>
	                                    <tbody id="myTable"><?php $i=1;foreach($employee_view as $value): ?>
	                                        <tr>
	                                        	<td><?php echo $i;$i++; ?></td>
	                                        	<td><?php echo $value->e_ID;?></td>
	                                        	<td><a href="employee_profile.php"><?php echo $value->e_name;?></a></td>
	                                        	<td><?php echo $value->contact;?></td>
                                                <?php if($value->status == 'unpaid'){ ?>
	                                        	<td><font style="color:red"><?php echo $value->status;?></font></td>
                                                <?php }?>
                                                <?php if($value->status == 'paid'){ ?>
	                                        	<td><font style="color:green"><?php echo $value->status;?></font></td>
                                                <?php }?>
                                                <td style="width:20px!important;"><a href="edit_employee.php" class="btn btn-sm btn-warning">Edit</a></td>
                                                
                                                <td style="width:20px!important;"> 
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Delete
                                                            <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="#">Yes</a></li>
                                                            <li><a href="#">No</a></li>
                                                        </ul>
                                                    </div>

                                                </td>                  
                                       
                                            </tr><?php endforeach;?>
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
