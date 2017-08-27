<?php 
include 'config.php';
if(isset($_POST['batch_id']) && isset($_POST['batch_name']) && isset($_POST['batch_timing'])){
    $id = $_POST["batch_id"];
     $batch_name = $_POST['batch_name'];
     $batch_timing = $_POST['batch_timing'];
    $sql = "UPDATE `batch` SET `batch_name` = '$batch_name', `batch_timing` = '$batch_timing' WHERE `batch`.`batch_id` = '$id'";
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
        //echo "<script>alert('batch created successfully')</script>";
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

        
//        echo "While adding Client <br> Error: " . $sql . "<br>" . $conn->error;
    }
}
else {
    echo "<script> alert('no Value Found while adding batch') </script>";
}
?>