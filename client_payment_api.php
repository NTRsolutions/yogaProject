<?php 

/*
loc no 13-- //connect to database
loc no 23-- // query to database for UPDATE data in client table
loc no 24-- // query to database for insert data in client_payment table
loc no 26--//  connect query ? if it connected then execute                                                             next loop to client.php
loc no 31---  // else client is not update
*/


                      
include 'config.php';
if(isset($_POST['c_id']) && isset($_POST['date']) && isset($_POST['paymode']) && isset($_POST['c_amount']) && isset($_POST['c_balance'])&& isset($_POST['pay'])){

    $c_id = $_POST['c_id'];
    $date = $_POST['date'];
    $paymode = $_POST['paymode'];
    $c_amount = $_POST['c_amount'];
    $c_balance = $_POST['c_balance'];
    $c_pay = $_POST['pay'];
    $final_balance = $c_balance - $c_pay;
    $sql = "UPDATE `client` SET  `balance` = '$final_balance',`status_payment` = 'Active' WHERE `client`.`c_ID` = '$c_id'";
    $sql1 = "INSERT INTO `client_payment` (`c_id`, `payment_date`, `payment_mode`) VALUES ( '$c_id', '$date', '$paymode');";
    $conn->query($sql);
        
    if ($conn->query($sql1) === TRUE) {
        header('Location: client.php');
    }
    else{
      echo "Code Not Updated";
    }
}
?>