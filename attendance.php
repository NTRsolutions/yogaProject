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

     <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-lg-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Attendance</h4>
									<p class="category">Fill up the Attendance Form</p>
	                            </div>
	                            <div class="card-content">
	                                <form action="#" method="post">
	                               
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Name</label>
													<input type="text" class="form-control" name="attendance_name">
												</div>
	                                        </div>
                                        
	                                       
                                           <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Name</label>
													<input type="text" class="form-control" name="username">
												</div>
	                                        </div>
                                          
                                    
                                        
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Name</label>
													<input type="text" class="form-control" name="username">
												</div>
	                                         </div>
                                        
	                                    
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Time</label>
													<input type="text" class="form-control" name="username">
												</div>
	                                        </div>
	                                    
                                        
                                        
                                        <button type="submit" class="btn btn-primary pull-right">Add Batch</button>
	                                    <div class="clearfix"></div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
                        
                        
                        
                          
                               <div class="col-md-12">
	                        <div class="card card-plain">
	                            <div class="card-header" data-background-color="purple">
	                               <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search..">
                                     <i class="material-icons icon">search</i> 
                                     <h4 class="title">Mark Attendance</h4>


						</div>
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table table-hover">
	                                    <thead class="text-primary">
	                                        <th>Sr no.</th>
	                                    	<th>Batch</th>
	                                    	<th>Name</th>
	                                    	<th>Timings</th>
	                                    	<th>Employees</th>
	                                    	<th></th>
                                            <th></th>
                                            
	                                    </thead>
	                                    <tbody>
	                                        <tr>
	                                        	<td>1</td>
	                                        	<td>Dakota Rice</td>
	                                        	<td>$36,738</td>
	                                        	<td>Niger</td>
	                                        	<td>Oud-Turnhout</td>
	                                        	
                                                  <td><button class="btn btn-warning">Edit</button></td>

                                              <td><button class="btn btn-primary">Delete</button></td>
                                    
	                                        </tr>
	                                        <tr>
	                                        	<td>2</td>
	                                        	<td>Minerva Hooper</td>
	                                        	<td>$23,789</td>
	                                        	<td>Curaçao</td>
	                                        	<td>Sinaai-Waas</td>
	                                       
                                                  <td><button class="btn btn-warning">Edit</button></td>

                                              <td><button class="btn btn-primary">Delete</button></td>
                                    
	                                        </tr>
	                                        <tr>
	                                        	<td>3</td>
	                                        	<td>Sage Rodriguez</td>
	                                        	<td>$56,142</td>
	                                        	<td>Netherlands</td>
	                                        	<td>Baileux</td>
                                                  <td><button class="btn btn-warning">Edit</button></td>

                                              <td><button class="btn btn-primary">Delete</button></td>
                                    
	                                        </tr>
	                                        <tr>
	                                        	<td>4</td>
	                                        	<td>Philip Chaney</td>
	                                        	<td>$38,735</td>
	                                        	<td>Korea, South</td>
	                                        	<td>Overland Park</td>
                                                  <td><button class="btn btn-warning">Edit</button></td>

                                              <td><button class="btn btn-primary">Delete</button></td>
                                    
	                                        </tr>
	                                        <tr>
	                                        	<td>5</td>
	                                        	<td>Doris Greene</td>
	                                        	<td>$63,542</td>
	                                        	<td>Malawi</td>
	                                        	<td>Feldkirchen in Kärnten</td>
                                                  <td><button class="btn btn-warning">Edit</button></td>

                                              <td><button class="btn btn-primary">Delete</button></td>
                                    
	                                        </tr>
	                                        <tr>
	                                        	<td>6</td>
	                                        	<td>Mason Porter</td>
	                                        	<td>$78,615</td>
	                                        	<td>Chile</td>
	                                        	<td>Gloucester</td>
                                                  <td><button class="btn btn-warning">Edit</button></td>

                                              <td><button class="btn btn-primary">Delete</button></td>
                                    
	                                        </tr>
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
