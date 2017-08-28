<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://localhost/yogaproject/view_batch_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$batch = json_decode($content);
$batch_view = $batch->batch_view;

//$batch_view = $batch->batch_view;
?>

<?php include 'config.php'; ?>
<?php include 'header.php'; ?>
<?php $page=2;include 'sidebar.php'; ?>
<?php include 'nav.php'; ?>
    <div class="content">
        <div class="container-fluid">
            <?php 
            if(isset($_POST['submit'])){ 
                if(isset($_POST['c_name']) && isset($_POST['c_surname']) &&isset($_POST['c_fees']) &&isset($_POST['c_contact']) &&isset($_POST['c_address']) &&isset($_POST['batch'])){
                    $data = array(
                        'c_name' => $_POST['c_name'],
                        'c_surname' => $_POST['c_surname'],
                        'c_fees' => $_POST['c_fees'],
                        'c_contact' => $_POST['c_contact'],
                        'c_address' => $_POST['c_address'],
                        'batch' => $_POST['batch']
                    );
                    # Create a connection
                    $url = 'http://localhost/yogaProject/add_client_api.php';
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
                    }
                     ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Add Client</h4>
                            <p class="category">Fill up the Client Form</p>
                        </div>
                        <div class="card-content">
                            <form action="add_client.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Name </label>
                                            <input onkeyup="allLatters(c_name)" type="text" value="<?php if(isset($_POST['c_name'])){echo $_POST['c_name']; } ?>" class="form-control" name="c_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Surname </label>
                                            <input onkeyup="validation(c_surname)" type="text" value="<?php if(isset($_POST['c_surname'])){echo $_POST['c_surname']; } ?>" class="form-control" name="c_surname" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Fees</label>
                                            <input onkeyup="allnumeric(c_fees)"  type="text" value="<?php if(isset($_POST['c_fees'])){echo $_POST['c_fees']; } ?>" class="form-control" name="c_fees" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Contact</label>
                                            <input onkeyup="contactnumeric(c_contact)" type="text" value="<?php if(isset($_POST['c_contact'])){echo $_POST['c_contact']; } ?>" class="form-control" name="c_contact" required>
                                        </div>
                                    </div>
	                            </div>
                                
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Address</label>
                                            <textarea rows="3" cols="30" name="c_address"  class="form-control" required><?php if(isset($_POST['c_address'])){echo $_POST['c_address']; } ?></textarea> 
                                        </div>
                                    </div>
                                    
                     
                     <div class="col-md-6">
                         <div class="dropdown">
                                        
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                 <p class="hidden-lg hidden-md">Notifications</p>
								</a>

                             <label for="business">Select Batch:</label>

                             
                             <select name="batch" required><option value="">Select Batch</option>

                                 <?php foreach($batch_view as $value): ?>
                                                                 
                                 <li>
                                            <option value="<?php echo $value->batch_id;?>"><?php echo $value->batch_name;?></option>
                                 </li>

									<?php endforeach; ?>
                             </select>
                                    
								                                        
                         </div>
                     </div>        
                                </div>

                                
                                <button type="submit" name="submit"class="btn btn-primary pull-right">Add</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php include 'footer.php'; ?>

<script>

     function allLatters(c_name)  
  {  
   var letters = /^[A-Za-z ]+$/;  
   if(c_name.value.match(letters))  
     {  
      return true;  
     }  
   else  
     {  
     alert("wrong");
     return false;  
     }  
  }  

    function validation(c_surname)  
  {  
   var letter = /^[A-Za-z ]+$/;  
   if(c_surname.value.match(letter))  
     {  
      return true;  
     }  
   else  
     {  
     alert("wrong");
     return false;  
     }  
  }  
    
     function allnumeric(c_fees)  
  {  
   var numbers = /^[0-9]+$/; 
   if(c_fees.value.match(numbers))  
     {  
      return true;  
     }  
   else  
     {  
     alert("wrong");
     return false;  
     }  
  }  
   
     function contactnumeric(c_contact)  
  {  
   var number = /^[0-9]+$/;
   if(c_contact.value.match(number))  
     {  
      return true;  
     }  
   else  
     {  
     alert("wrong");
     return false;  
     }  
  }  
   

</script>

<?php include 'script_include.php'; ?>
