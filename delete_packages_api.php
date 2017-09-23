<?php
/*
loc no 12-- //connect to database
loc no 16-- // query to database for DELETE batch_id in batch table
loc no 18--//  connect query ? if it connected then execute alert record delete successfully go to batch.php                                                       
loc no 20---  // else record not delteing
*/



include 'config.php';

if(isset($_GET['Cat_ID'])){
    $cat_id = $_GET['Cat_ID'];
    $sql = "DELETE FROM `packages` WHERE `Cat_ID` ='$cat_id'";
    $result = $conn->query($sql);

     if ($result) { 
         echo "<script>alert('Record deleted successfully');location='packages.php'</script>";
     } else {
     echo "Error deleting record: " .$conn->query($sql);
     }
    }

?>

