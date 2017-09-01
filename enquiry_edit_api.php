<?php 
/*
loc no 8-- //connect to database
loc no 17-- // query to database for UPDATE in enquiry table
loc no 18--//  connect query ? if it connected then execute alert record UPDATE successfully go to enquiry_table.php                                                       
loc no 21---  // else record not UPDATE
*/
include 'config.php';
if(isset($_POST['e_token']) && isset($_POST['e_name']) && isset($_POST['e_mail'])&& isset($_POST['e_contact'])&& isset($_POST['e_message'])&& isset($_POST['e_date'])&& isset($_POST['followupdate'])){
    $e_token= $_POST["e_token"];
     $e_name = $_POST['e_name'];
     $e_mail = $_POST['e_mail'];
     $e_contact = $_POST['e_contact'];
     $e_message = $_POST['e_message'];
     $e_date = $_POST['e_date'];
     $status = $_POST['status'];
     $followupdate = $_POST['followupdate'];
    $sql = "UPDATE `enquiry` SET `token_no` = '$e_token', `name` = '$e_name', `status` = '$status', `contact` = '$e_contact', `message` = '$e_message', `message` = '$e_message', `followupdate` = '$followupdate', `date` = '$e_date' WHERE `enquiry`.`token_no` = '$e_token';";
    if ($conn->query($sql) === TRUE) {
        header('Location: enquiry_table.php');
    }
    else{
      echo "Code Not Updated";
    }
}
?>