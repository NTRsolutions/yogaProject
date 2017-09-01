<?php 
/*
loc no 7-- //connect to database
loc no 11-- // query to database for SELECT in batch_ID table
loc no 18--//  0 result
*/
include 'config.php';
   $sql = "SELECT * from  Batch ORDER BY batch_ID DESC ";
    $result=$conn->query($sql);
    $batch=array();
    if ($result->num_rows >0){
     // output data of each row
    while($row = $result->fetch_assoc()){
   array_push($batch,array('batch_id'=>$row['batch_id'],'batch_name'=>$row['batch_name'],'batch_timing'=>$row['batch_timing']));
    }
        $batch_view = array('batch_view'=>$batch);
        echo json_encode($batch_view);
    } else {
    echo "0 results";
}
?>
