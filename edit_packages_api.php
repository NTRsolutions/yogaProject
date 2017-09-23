<?php 

/*
loc no 10-- //connect to database
loc no 14-- // query to database for UPDATE in batch table
loc no 18--//  connect query ? if it connected then execute alert record UPDATE successfully go to batch.php                                                       
loc no 20---  // else record not UPDATE
*/
include 'config.php';
if(isset($_POST['Cat_ID']) && isset($_POST['Catogary']) && isset($_POST['Active']) && isset($_POST['Name_of_plan']) && isset($_POST['Time_unit']) && isset($_POST['batch']) && isset($_POST['Description'])) {            //connect to databasse
               //if packages name and packages time is  submited then go in condition
    $Cat_ID=$_POST['Cat_ID'];
    $Catogary = $_POST['Catogary'];
    $Active = $_POST['Active'];
    $Name_of_plan = $_POST['Name_of_plan'];
    $Time_unit = $_POST['Time_unit'];
    $batch = $_POST['batch'];
    $Description = $_POST['Description'];
    
    $sql = "UPDATE `packages` SET `Catogary` = '$Catogary', `Active` = '$Active', `Name_of_plan` = '$Name_of_plan', `Time_unit` = '$Time_unit', `batch` = '$batch', `Description` = '$Description'  WHERE `packages`. `Cat_ID` = '$Cat_ID'";
    if ($conn->query($sql) === TRUE) {
        header('Location: packages.php');
    }
    else{
      echo "Code Not Updated";
    }
}
?>