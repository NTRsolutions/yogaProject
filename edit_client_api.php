<?php 
/*
loc no 10-- //connect to database
loc no 21-- // query to database for UPDATE in client table
loc no 18--//  connect query ? if it connected then execute alert record UPDATE successfully go to client.php                                                       
loc no 20---  // else record not UPDATE
*/


include 'config.php';
if(isset($_POST['c_name']) && isset($_POST['c_surname']) && isset($_POST['c_fees']) && isset($_POST['c_contact']) && isset($_POST['c_address']) && isset($_POST['batch'])){

    $c_id = $_POST["c_id"];
     $c_name = $_POST['c_name'];
     $c_surname = $_POST['c_surname'];
     $c_fees = $_POST['c_fees'];
     $c_contact = $_POST['c_contact'];
     $c_address = $_POST['c_address'];

     $batch_id = $_POST['batch'];
    $sql = "UPDATE `client` SET `c_name` = '$c_name', `c_surname` = '$c_surname', `address` = '$c_address', `contact` = '$c_contact', `fees` = '$c_fees', `batch_id` = '$batch_id' WHERE `client`.`c_ID` = '$c_id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: client.php');
    }
    else{
      echo "Code Not Updated";
    }
}
?>