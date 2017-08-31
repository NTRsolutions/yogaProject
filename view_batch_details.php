

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
   <?php $nav=5;include 'nav.php'; ?>

     <div class="content">
				<div class="container-fluid">
					<div class="row">
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
                                            <th>Batch name</th>
	                                    	<th>client id</th>

	                                    	<th>client Name</th>
	                                    	
                                        </thead>

	                                    <tbody id="myTable">

	                                        <tr>
	                                        	<td></td>
	                                        	<td></td>
	                                        	<td></td>
	                                        	<td></td>
	                                        	
                                                                               
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
