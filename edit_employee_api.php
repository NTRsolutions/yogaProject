<?php 
include 'config.php';
if(/*isset($_POST['e_ID']) &&*/ isset($_POST['e_name']) && isset($_POST['e_surname']) && isset($_POST['address']) && isset($_POST['contact']) ){
     $eid = $_POST['e_ID'];
     $e_name = $_POST['e_name'];
     $e_surname = $_POST['e_surname'];
     $address = $_POST['address'];
     $contact = $_POST['contact'];
     $salary = $_POST['salary'];
     
    $sql = "UPDATE `employee` SET `e_name` = '$e_name', `e_surname` = '$e_surname', `address` = '$address',`contact` = '$contact', `salary` = '$salary'  WHERE `employee`.`e_ID` = '$eid'";
    if ($conn->query($sql) === TRUE)
    {
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
        //echo "<script>alert('employee created successfully')</script>";
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

        
       echo "While adding employee <br> Error: " . $sql . "<br>" . $conn->error;
    }
}
else {
    echo "<script> alert('no Value Found while adding employee') </script>";
}
?>