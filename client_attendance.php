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
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title"> Client Attendance</h4>
<!--									<p class="category">Fill up the attendance form</p>-->
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
                                        
                                        
                                        <button type="submit" class="btn btn-primary pull-right" name="submit">Submit</button>
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
                                     <h4 class="title">Client Details</h4>


                                </div>
	                            </div>
	                            <div class="card-content">
	                                <table class="table table-hover">
	                                    <thead class="text-primary">
	                                        <th>Sr no.</th>
	                                    	<th>Id</th>
	                                    	<th>Name</th>
	                                    	<th>Surname</th>
	                                    	<th>Contact</th>
	                                    	<th>Status</th>
                                            
                                            
	                                    </thead>
	                                    <tbody id="myTable">
	                                        <tr>
	                                        	<td>1</td>
	                                        	<td>Dakota Rice</td>
	                                        	<td>$36,738</td>
	                                        	<td>Niger</td>
	                                        	<td>Oud-Turnhout</td>
                                                 <td>Oud-Turnhout</td>                                                   
                                            </tr>
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
