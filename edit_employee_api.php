<?php 
include 'config.php';
if(/*isset($_POST['e_ID']) &&*/ isset($_POST['e_name']) && isset($_POST['e_surname']) && isset($_POST['address']) && isset($_POST['contact']) ){
     $eid = $_POST['e_ID'];
     $e_name = $_POST['e_name'];
     $e_surname = $_POST['e_surname'];
     $address = $_POST['address'];
     $contact = $_POST['contact'];
     $salary = $_POST['salary'];
     
    $sql = "UPDATE `employee` SET `e_name` = '$e_name', `e_surname` = '$e_surname', `address` = '$address',`contact` = '$contact', `salary` = '$salary'  WHERE `employee`.`e_ID` = '$eid'";
    if ($conn->query($sql) === TRUE)
    {
        header('Location: employee.php');
    }
    else {
        echo "Code Not Updated";
    }
}
?>