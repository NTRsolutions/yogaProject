<?php 
include 'config.php';           //connect to database
if(isset($_POST['c_name'])){

     $c_name = $_POST['c_name'];
     $c_surname = $_POST['c_surname'];
     $gender = $_POST['gender'];
     $DOB = $_POST['DOB'];
     $anniversary = $_POST['Anniversary'];
     $age = $_POST['Age'];
     $c_address = $_POST['c_address'];
     $c_contact = $_POST['c_contact'];
     $c_fees = $_POST['c_fees'];
     $received = $_POST['received'];
     $c_balance = $_POST['balance'];
     $Register_ID = $_POST['Register_ID'];
     $Lead_By = $_POST['Lead_By'];
     $photo = $_POST['photo'];
     $Comments = $_POST['Comments'];
     //$status_payment = $_POST['status_payment'];
     $c_batch = $_POST['batch'];
     $package = $_POST['package'];
     $startdate = $_POST['startdate'];
     $enddate = $_POST['enddate'];
    
    $sql = "INSERT INTO `client` ( `c_name`, `c_surname`, `gender`, `DOB`, `Anniversary`, `Age`, `address`, `contact`, `fees`, `received`, `balance`, `package`, `Lead_By`, `photo`, `Comments`, `status_payment`, `batch_id`, `startdate`, `enddate`) VALUES ( '$c_name','$c_surname','$gender', '$DOB', '$anniversary', '$age', '$c_address' , '$c_contact', '$c_fees', '$received', '$c_balance', '$package', '$Lead_By', '$photo', '$Comments', 'unpaid', '$c_batch', '$startdate', '$enddate')";
                                                           // query to database for insert data in      client table
    if ($conn->query($sql) === TRUE) {              // checked does query connect ? if it connected then execute                                                        next loop and print successfull
        ?> 
<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria- hidden="true">&times;</span></button>
        <strong>Success!</strong> Client information added successfully!
</div>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 1000)
</script>
    <?php
       //echo "<script>alert('Client created successfully')</script>";
    } else {                            // if query is not connected to databse then execute next loop and print as                                             unsuccessfull
         
        ?> 
<div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria- hidden="true">&times;</span></button>
        <strong>Success!</strong> Sorry! unsuccessful entry
</div>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 1000);
</script>
    <?php

        
        echo "While adding Client <br> Error: " . $sql . "<br>" . $conn->error;
    }
}
else {                                                      // if Query is empty then print as no value fount
    echo "<script> alert('no Value Found while adding Client') </script>";
}
?>