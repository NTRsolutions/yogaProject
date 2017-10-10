<?php 

/*
loc no 10-- //connect to database
loc no 19-- // query to database for UPDATE in employee table
loc no 20--//  connect query ? if it connected then execute alert record UPDATE successfully go to employee.php                                                       
loc no 24---  // else record not UPDATE
*/

include 'config.php';
if(isset($_POST['e_ID'])/* && isset($_POST['e_name']) && isset($_POST['e_surname']) && isset($_POST['address']) && isset($_POST['contact'])*/ ){
     $eid = $_POST['e_ID'];
     $e_name = $_POST['e_name'];
     $e_surname = $_POST['e_surname'];
     $Gender = $_POST['Gender'];
     $DOB = $_POST['DOB'];
     $Age = $_POST['Age'];
     $Title = $_POST['Title'];
     $Salary = $_POST['Salary'];
     $Register_ID = $_POST['Register_ID'];
     $address = $_POST['address'];
     $contact = $_POST['contact'];
     $Email = $_POST['Email'];
     //unpaid = $_POST['status'];
   
    $sql = "UPDATE `trainer` SET `e_name` = '$e_name', `e_surname` = '$e_surname', `Gender` = '$Gender', `DOB` = '$DOB', `Age` = '$Age', `Title` = '$Title', `Salary` = '$Salary', `Register_ID` = '$Register_ID', `address` = '$address', `contact` = '$contact', `Email` = '$Email', `status` = 'unpaid' WHERE `trainer`.`e_ID` = $eid";
     
   
    if ($conn->query($sql) === TRUE)
    {
        header('Location: trainer.php');
    }
    else {
        echo "Code Not Updated";
    }
}
?>