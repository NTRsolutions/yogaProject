<?php 

/*
loc no 10-- //connect to database
loc no 19-- // query to database for UPDATE in employee table
loc no 20--//  connect query ? if it connected then execute alert record UPDATE successfully go to employee.php                                                       
loc no 24---  // else record not UPDATE
*/

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