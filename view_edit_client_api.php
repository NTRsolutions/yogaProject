<?php 
/*
loc no 7-- //connect to database
loc no 12-- // query to database for SELECT in client table
loc no 21-- // query to database for SELECT in batch table
loc no 27--//  0 result
*/
include 'config.php';
if(isset($_POST["c_ID"]) ){
    $_POST["c_ID"];
    $id = $_POST["c_ID"];
    $sql = "SELECT * FROM `client` WHERE `c_ID`='$id'";
    $result = $conn->query($sql);
    $client = array();
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc(); 
        
        $id1 = $row['batch_id']."<br>"; 
        $sql1 = "SELECT * FROM `batch` WHERE `batch_id`='$id1'";
        $result1 = $conn->query($sql1); 
        $row1 = $result1->fetch_assoc();
        array_push($client,array('c_ID'=>$row['c_ID'],'c_name'=>$row['c_name'],'c_surname'=>$row['c_surname'],'gender'=>$row['gender'],'DOB'=>$row['DOB'],'Anniversary'=>$row['Anniversary'],'Age'=>$row['Age'],'address'=>$row['address'],'contact'=>$row['contact'],'fees'=>$row['fees'],'Lead_By'=>$row['Lead_By'],'photo'=>$row['photo'],'Comments'=>$row['Comments'],'status_payment'=>$row['status_payment'],'batch_name'=>$row1['batch_name']));
        
        $client_view = array('client_view'=>$client);
        //print_r($client_view);
        echo json_encode($client_view);
    } else {
        echo "0 results";
    }
}
?>


