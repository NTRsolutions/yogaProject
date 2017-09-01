<?php 
include 'config.php';                                   //connect to databasse
if(isset($_POST['batch_name']) && isset($_POST['batch_timing']) ){               //if batch name and batch time is                                                                                  submited then go in if condition
    $batch_name = $_POST['batch_name'];
    $batch_timing = $_POST['batch_timing'];
    $sql = "INSERT INTO Batch (batch_name, batch_timing) 
        VALUES ('$batch_name', '$batch_timing')";            // insert into batch table if batch name and batch                                                                 time is set
     if ($conn->query($sql) === TRUE) {                       // if query is connected then print as success and go                                                                     in next loop
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
    } else {                    // if query is not connected to databassse successfully print as unsuccessful
         
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
else {                                      //if query is connected but no value in it then print as NO value found 
    echo "<script> alert('no Value Found while adding Client') </script>";
}
?>