<?php 
                      
include 'config.php';
if(isset($_POST['c_id']) && isset($_POST['date']) && isset($_POST['paymode']) && isset($_POST['c_amount']) && isset($_POST['c_balance'])&& isset($_POST['pay'])){

    $c_id = $_POST['c_id'];
    $date = $_POST['date'];
    $paymode = $_POST['paymode'];
    $c_amount = $_POST['c_amount'];
    $c_balance = $_POST['c_balance'];
    $c_pay = $_POST['pay'];
    $final_balance = $c_balance - $c_pay;
    $sql = "UPDATE `client` SET  `balance` = '$final_balance',`status_payment` = 'paid' WHERE `client`.`c_ID` = '$c_id'";
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