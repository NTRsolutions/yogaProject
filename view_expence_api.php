<?php
include 'config.php';

$sql = "SELECT DISTINCT * FROM `expence` ORDER By Out_ID DESC";
    $result=$conn->query($sql);
    $exp_date=array();
    if ($result->num_rows >0){
     // output data of each row
    while($row = $result->fetch_assoc()){
   array_push($exp_date,array('Out_ID'=>$row['Out_ID'],'bill_no'=>$row['bill_no'],'date'=>$row['date'],'name'=>$row['name'],'amount'=>$row['amount']));
    }
     $exp_date_view = array('exp_date'=>$exp_date);
        echo json_encode($exp_date_view);
      //  print_r($exp_date_view);
    } else {
    echo "0 results";
}
?>