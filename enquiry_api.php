<?php 
/*
loc no 10-- //connect to database
loc no 22-- // query to database for insert data in enquiry table
loc no 31--// checked does query connect ? if it connected then execute                                                             next loop and print successfull
loc no 37--  // if query is not connected to databse then execute next loop and print as                                             unsuccessfull
loc no 58--   // if Query is empty then print as no value Found
*/

include 'config.php';
if(isset($_POST['token_no']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['message']) && isset($_POST['date']) && isset($_POST['followupdate'])){

     $token_no = $_POST['token_no'];
     $name = $_POST['name'];
     $email = $_POST['email'];
     $contact = $_POST['contact'];
     $message = $_POST['message'];
     $date = $_POST['date'];
     $followupdate = $_POST['followupdate'];
    
    $sql = "INSERT INTO `enquiry` (`token_no`, `name`, `email`, `contact`, `date`, `followupdate`, `message`, `status`) VALUES ('$token_no', '$name', '$email', '$contact', '$date', '$followupdate', '$message', 'pending');";
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
    echo "<script> alert('no Value Found while adding enquiry') </script>";
}
?>