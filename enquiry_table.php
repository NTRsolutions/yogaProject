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


  <?php $page=7;include 'sidebar.php'; ?>
   <?php $nav=6;include 'nav.php'; ?>
	   
           <div class="content">
				<div class="container-fluid">
					<div class="row">





                        <div class="col-md-12">
	                        <div class="card card-plain">
	                            <div class="card-header" data-background-color="purple">
	                                <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search..">
                                     <i class="material-icons icon">search</i> 
                                     <h4 class="title">Enquiry Details</h4>

 
					        	</div>
	                        </div>
	                            <div class="card-content">
	                                <table class="table table-hover" >
	                                    <thead class="text-primary">
	                                        <th>Sr no.</th>
	                                    	<th>Token Number</th>
	                                    	<th>Name</th>
	                                    	<th>Email</th>
	                                    	<th>Contact</th>
	                                    	
                                            <th></th>
	                                    	<th></th>
	                                   </thead>
	                                    <tbody id="myTable">
	                                        <tr>
	                                        	<td>dfbmk</td>
	                                        	<td>dfbmk</td>
                                                <td>dfbmk</td>
                                                <td>dfbmk</td>
                                                <td>dfbmk</td>
                                                
                                     <form action="#" method="POST">
                                        <input value="" type="hidden" name="e_ID">
                                        <td style="width:20px!important;"><input  type="submit" class="btn btn-sm btn-warning" value="Edit">
                                         </td>
                                    </form>
                                                 
                                    
                                   
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
