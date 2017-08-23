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
                                                <td><a href="edit_attendance.php" class="btn btn-sm btn-warning">Edit</a></td>
                                                <td>     <div class="dropdown">
                                                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Delete
                                                        <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">Yes</a></li>
                                                        <li><a href="#">No</a></li>
                                                    </ul>
                                                    </div>
                                                </td>                                                     
                                            </tr>
                                        </tbody>
                                    </table>
	                   

	                        </div>
                        </div>
                    </div>
                        
         </div>
    </div>
	           
                        
                        
                        
                        
                        
                        
                         
 
	<?php include 'footer.php'; ?>

<?php include 'script_include.php'; ?>
