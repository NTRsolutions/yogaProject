<?php 
/*
loc no 7-- //connect to database
loc no 12-- // query to database for SELECT in batch_id table
loc no 24--//  0 result
Catogary
Active
Name_of_plan
Time_unit
batch
Description
*/
include 'config.php';
if(isset($_POST["Cat_ID"])){
  $id = $_POST["Cat_ID"];

     
    $sql = "SELECT * FROM `packages` WHERE `Cat_ID`='$id'";
    $result = $conn->query($sql);
    $packages = array();
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc(); 
        
     array_push($packages,array('Cat_ID'=>$row['Cat_ID'],'Catogary'=>$row['Catogary'],'Active'=>$row['Active'],'Name_of_plan'=>$row['Name_of_plan'],'Time_unit'=>$row['Time_unit'],'batch'=>$row['batch'],'Description'=>$row['Description']));
        
        $packages_view = array('packages_view'=>$packages);
        echo json_encode($packages_view);
    } else {
        echo "0 results";
    }
}
?>