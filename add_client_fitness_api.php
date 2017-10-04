<?php 
include 'config.php';                                   //connect to databasse
if(isset($_POST['date_before']) && isset($_POST['Diet_before']) && isset($_POST['Weight_before'])/* && isset($_POST['date_after']) && isset($_POST['Diet_after']) && isset($_POST['Weight_after'])*/){               //if batch name and batch time is                                                                                  submited then go in if condition
    $date_before = $_POST['date_before'];
    $Diet_before = $_POST['Diet_before'];
    $Weight_before = $_POST['Weight_before'];
 /*   $date_after = $_POST['date_after'];
    $Diet_after = $_POST['Diet_after'];
    $Weight_after = $_POST['Weight_after'];*/
    $sql = "INSERT INTO client_fitness (date_before, Diet_before, Weight_before) 
        VALUES ('$date_before','$Diet_before', '$Weight_before')";            // insert into batch table if batch name and batch                                                                 time is set
     if ($conn->query($sql) === TRUE) {
        header('Location: client.php');                      // if query is connected then print as success and go                                                                     in next loop
        ?> 
<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria- hidden="true">&times;</span></button>
        <strong>Success!</strong> client fitness information added successfully!
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
    echo "<script> alert('no Value Found while adding client fitness ') </script>";
}
?>