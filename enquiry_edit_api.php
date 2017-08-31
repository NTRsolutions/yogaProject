<?php 
include 'config.php';
if(isset($_POST['e_token']) && isset($_POST['e_name']) && isset($_POST['e_mail'])&& isset($_POST['e_contact'])&& isset($_POST['e_message'])&& isset($_POST['e_date'])){
    $e_token= $_POST["e_token"];
     $e_name = $_POST['e_name'];
     $e_mail = $_POST['e_mail'];
     $e_contact = $_POST['e_contact'];
     $e_message = $_POST['e_message'];
     $e_date = $_POST['e_date'];
    $sql = "UPDATE `enquiry` SET `token_no` = '$e_token', `name` = '$e_name', `email` = '$e_mail', `contact` = '$e_contact', `message` = '$e_message', `date` = '$e_date' WHERE `enquiry`.`token_no` = '$e_token';";
    if ($conn->query($sql) === TRUE) {
        header('Location: enquiry_table.php');
    }
    else{
      echo "Code Not Updated";
    }
}
?>