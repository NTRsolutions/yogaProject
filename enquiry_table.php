<?php 
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://localhost/yogaproject/view_enquiry_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$enquiry = json_decode($content);
$enquiry_view = $enquiry->enquiry_view;
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
	                                        <?php $i=1;foreach($enquiry_view as $value): ?><tr>
	                                        	<td><?php echo $i;$i++; ?></td>
	                                        	<td><?php echo $id=$value->token_no;?></td>
                                                <td><?php echo $value->name;?></td>
                                                <td><?php echo $value->email;?></td>
                                                <td><?php echo $value->contact;?></td>
                                                
                                     <form action="edit_enquiry.php" method="POST">
                                        <input value="" type="hidden" name="tokenid">
                                        <td style="width:20px!important;"><input  type="submit" class="btn btn-sm btn-warning" value="Edit">
                                         </td>
                                    </form>
                                                 
                                    
                                   
                                                <td style="width:20px!important;"> 
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Delete
                                                            <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="delete_enquiry_api.php?token_no=<?php echo $id;?>">Yes</a></li>
                                                            
                                                            <li><a href="#">No</a></li>
                                                        </ul>
                                                    </div>

                                                </td>                  
                                       
                                            </tr><?php endforeach; ?>
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
