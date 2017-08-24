<?php 
include 'config.php';
if(isset($_POST["c_id"]) ){
  $id = $_POST["c_id"];

     
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
        array_push($client,array('c_ID'=>$row['c_ID'],'c_name'=>$row['c_name'],'c_surname'=>$row['c_surname'],'address'=>$row['address'],'contact'=>$row['contact'],'fees'=>$row['fees'],'status_payment'=>$row['status_payment'],'batch_name'=>$row1['batch_name']));
        
        $client_view = array('client_view'=>$client);
        echo json_encode($client_view);
    } else {
        echo "0 results";
    }
}
?>