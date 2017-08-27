<?php 
include 'config.php';
if(isset($_POST["batch_id"])){
  $id = $_POST["batch_id"];

     
    $sql = "SELECT * FROM `batch` WHERE `batch_id`='$id'";
    $result = $conn->query($sql);
    $batch = array();
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc(); 
        
     array_push($batch,array('batch_id'=>$row['batch_id'],'batch_name'=>$row['batch_name'],'batch_timing'=>$row['batch_timing']));
        
        $batch_view = array('batch_view'=>$batch);
         json_encode($batch_view);
    } else {
        echo "0 results";
    }
}
?>