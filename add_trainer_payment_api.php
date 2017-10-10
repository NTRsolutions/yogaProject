<?php 
include 'config.php';

/*
loc no 3-- //connect to database
loc no 25-- // query to database for insert data in employee_payment table
loc no 27-- // query to database for UPDATE data in employee table
loc no 32--// checked does query connect ? if it connected then execute                                                             next loop and print successfull
loc no 50--  // if query is not connected to databse then execute next loop and print as                                             unsuccessfull
loc no 71--   // if Query is empty then print as no value fount
*/

    if(isset($_POST['e_id']) && isset($_POST['payment_date']) && isset($_POST['paymentmode'])&& isset($_POST['checkbox'])){

         $e_id = $_POST['e_id'];
         $payment_date = $_POST['payment_date'];
         $payment_mode = $_POST['paymentmode'];
         $checkbox = $_POST['checkbox'];

        foreach($checkbox as $value){
             $index = array_search($value,$e_id);
             $date = $payment_date[$index];
             $mode = $payment_mode[$index];
            $sql = "INSERT INTO `trainer_payment` (`e_id`, `payment_date`, `payment_mode`) VALUES ( '$value', '$date', '$mode')";
            $conn->query($sql);
            mysqli_query($conn,"UPDATE trainer SET status = 'paid' WHERE e_ID = '$value'");
            
        }
        

        if ($conn->query($sql) === TRUE)
        
         //$sql = "UPDATE `employee` SET `status` = 'paid' WHERE `employee`.`e_ID` = 1;
        {
            ?> 
    <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria- hidden="true">&times;</span></button>
            <strong>Success!</strong> Employee payment added successfully!
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


    //        echo "While adding Client <br> Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else {
        echo "<script> alert('no Value Found while adding employee payment') </script>";
    }
    ?>