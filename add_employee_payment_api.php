
    <?php 
    include 'config.php';
    if(isset($_POST['e_id']) && isset($_POST['payment_date']) && isset($_POST['paymentmode'])&& isset($_POST['checkbox'])){

         $e_id = $_POST['e_id'];
         $payment_date = $_POST['payment_date'];
         $payment_mode = $_POST['paymentmode'];
         $checkbox = $_POST['checkbox'];

        foreach($checkbox as $value){
             $index = array_search($value,$e_id);
             $date = $payment_date[$index];
             $mode = $payment_mode[$index];
            $sql = "INSERT INTO `employee_payment` (`e_id`, `payment_date`, `payment_mode`) VALUES ( '$value', '$date', '$mode')";
            $conn->query($sql);
            mysqli_query($conn,"UPDATE employee SET status = 'paid' WHERE e_ID = '$value'");
            
        }
        

        if ($conn->query($sql) === TRUE)
        
         //$sql = "UPDATE `employee` SET `status` = 'paid' WHERE `employee`.`e_ID` = 1;
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