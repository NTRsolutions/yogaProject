<?php 
include 'config.php';
  //connect to databasse

$in_name = $_POST['in_name'];
$bank_name = $_POST['bank_name'];
$cheque_no = $_POST['cheque_no'];
$amount = $_POST['amount'];
$date = $_POST['date'];
$c_d = $_POST['c_d'];
$balance = $_POST['balance'];
if($c_d=='credit'){
   $balance_1= $balance-$amount;
}else{
    $balance_1=$amount+$balance;
}
/*$n = count($_POST['bill_no']);
for($i=0;$i<$n;$i++){
    if(!empty($bill_no[$i])){*/
    $sql = "INSERT INTO `income` (`in_name`, `bank_name`, `cheque_no`, `amount`, `date`, `c_d`, `balance`) VALUES ('$in_name','$bank_name', '$cheque_no','$amount','$date', '$c_d','$balance_1')";          
    //insert into batch table if batch name and batch   time is set
     $conn->query($sql); 
        /*}*/
    header("location:money_income.php");
/*}*/



?>