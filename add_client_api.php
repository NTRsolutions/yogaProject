<?php 
include 'config.php';           //connect to database
if(isset($_POST['c_name']) && isset($_POST['c_surname']) && isset($_POST['c_fees'])&& isset($_POST['balance']) && isset($_POST['c_contact']) && isset($_POST['c_address']) && isset($_POST['batch'])){

     $c_name = $_POST['c_name'];
     $c_surname = $_POST['c_surname'];
     $c_fees = $_POST['c_fees'];
     $c_balance = $_POST['balance'];
     $c_contact = $_POST['c_contact'];
     $c_address = $_POST['c_address'];
     $c_batch = $_POST['batch'];
    $sql = "INSERT INTO Client (c_name, c_surname, fees, balance, contact, address, status_payment,batch_id)
    VALUES ('$c_name', '$c_surname', '$c_fees','$c_balance','$c_contact','$c_address','unpaid','$c_batch')";                                                            // query to database for insert data in client table
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

        
//        echo "While adding Client <br> Error: " . $sql . "<br>" . $conn->error;
    }
}
else {                                                      // if Query is empty then print as no value fount
    echo "<script> alert('no Value Found while adding Client') </script>";
}
?>