<?php 
include 'config.php';   
  //connect to databasse

$bill_no = $_POST['bill_no'];
$Date = $_POST['date'];
$exp_name = $_POST['exp_name'];
$Amount= $_POST['amount'];
//print_r($bill_no);
$n = count($_POST['bill_no']);
for($i=0;$i<$n;$i++){
    if(!empty($bill_no[$i])){
    $sql = "INSERT INTO `expence` ( `bill_no`, `date`, `name`, `amount`) VALUES  ('$bill_no[$i]','$Date[$i]' ,'$exp_name[$i]','$Amount[$i]')";          
    //insert into batch table if batch name and batch   time is set
     if($conn->query($sql)==TRUE){
         echo "success.<br>";
     }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
    header("location:money_expence.php");
}


?>

