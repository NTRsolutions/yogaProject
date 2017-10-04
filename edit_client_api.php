<?php 
/*
loc no 10-- //connect to database
loc no 21-- // query to database for UPDATE in client table
loc no 18--//  connect query ? if it connected then execute alert record UPDATE successfully go to client.php                                                       
loc no 20---  // else record not UPDATE
*/


include 'config.php';
if(isset($_POST['c_ID']) /*&& isset($_POST['c_surname']) && isset($_POST['gender'])&& isset($_POST['DOB']) && isset($_POST['Anniversary'])&& isset($_POST['Age'])&& isset($_POST['c_address'])&& isset($_POST['c_contact'])&& isset($_POST['c_fees'])&& isset($_POST['received'])&& isset($_POST['Register_ID'])&& isset($_POST['Lead_By'])&& isset($_POST['photo']) && isset($_POST['Comments']) && isset($_POST['status_payment']) && isset($_POST['batch'])*/){

    $c_id = $_POST["c_ID"];
     $c_name = $_POST['c_name'];
     $c_surname = $_POST['c_surname'];
     $gender = $_POST['gender'];
     $DOB = $_POST['DOB'];
     $Anniversary = $_POST['Anniversary'];
     $Age = $_POST['Age'];
     $c_address = $_POST['address'];
     $c_contact = $_POST['contact'];
     $c_fees = $_POST['fees'];
     //$received = $_POST['received'];
    // $Register_ID = $_POST['Register_ID'];
     //$Lead_By= $_POST['Lead_By'];
    // $photo= $_POST['photo'];
     $Comments= $_POST['Comments'];
     //$status_payment= $_POST['status_payment'];
     $batch_id = $_POST['batch'];
    
    $sql = "UPDATE `client` SET `c_name` = '$c_name', `c_surname` = '$c_surname', `gender` = '$gender', `DOB` = '$DOB',`Anniversary` = '$Anniversary', `Age` = '$Age', `address` = '$c_address', `contact` = '$c_contact', `fees` = '$c_fees', `Comments` = '$Comments', `status_payment` = 'unpaid' ,`batch_id` = '$batch_id' WHERE `c_ID` = '$c_id'";
    /* `received` = '$received',`Lead_By` = '$Lead_By',`photo` = '$photo' ";*/
    
   
    if ($conn->query($sql) === TRUE) {
        header('Location: client.php');
    }
    else{
      echo "Code Not Updated";
    }
}
?>