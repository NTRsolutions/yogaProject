<?php 
include 'config.php';
if(isset($_POST['c_name']) && isset($_POST['c_surname']) && isset($_POST['c_fees']) && isset($_POST['c_contact']) && isset($_POST['c_address']) && isset($_POST['batch'])){

    $c_id = $_POST["c_id"];
     $c_name = $_POST['c_name'];
     $c_surname = $_POST['c_surname'];
     $c_fees = $_POST['c_fees'];
     $c_contact = $_POST['c_contact'];
     $c_address = $_POST['c_address'];

     $batch_id = $_POST['batch'];
    $sql = "UPDATE `client` SET `c_name` = '$c_name', `c_surname` = '$c_surname', `address` = '$c_address', `contact` = '$c_contact', `fees` = '$c_fees', `batch_id` = '$batch_id' WHERE `client`.`c_ID` = '$c_id'";
    if ($conn->query($sql) === TRUE) {
        ?> 
<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria- hidden="true">&times;</span></button>
        <strong>Success!</strong> You have been signed in successfully!
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
    } else {
         
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
else {
    echo "<script> alert('no Value Found while adding Client') </script>";
}
//header('Location: client.php');
?>