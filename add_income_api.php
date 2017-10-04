<?php 
include 'config.php';   
  //connect to databasse

$bill_no = $_POST['bill_no'];
$in_name = $_POST['in_name'];
$Amount = $_POST['Amount'];
$Date = $_POST['Date'];

$n = count($_POST['bill_no']);
for($i=0;$i<$n;$i++){
    if(!empty($bill_no[$i])){
    $sql = "INSERT INTO `income` (`bill_no`, `date`, `name`, `amount`) VALUES ('$bill_no[$i]','$Date[$i]', '$in_name[$i]','$Amount[$i]')";          
    //insert into batch table if batch name and batch   time is set
     $conn->query($sql); 
        }
    header("location:money_income.php");
}



?>