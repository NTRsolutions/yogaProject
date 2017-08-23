<?php 
include 'config.php';
if(isset($_POST['e_name']) && isset($_POST['e_surname']) && isset($_POST['e_address']) && isset($_POST['e_contact']) && isset($_POST['salary'])){
     $id = $_GET["e_ID"];
     $e_name = $_POST['e_name'];
     $e_surname = $_POST['e_surname'];
     $e_address = $_POST['e_address'];
     $e_contact = $_POST['e_contact'];
     $salary = $_POST['salary'];
     
    $sql = "UPDATE `employee` SET `e_name` = '$e_name', `e_surname` = '$e_surname', `address` = '$e_address',`contact` = '$e_contact', `salary` = '$salary'  WHERE `employee`.`e_ID` = '$id'";
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