
<?php 
/*
loc no 7-- //connect to database
loc no 11-- // query to database for SELECT in batch_ID table
loc no 18--//  0 result
*/
include 'config.php';
   $sql = "SELECT  DISTINCT * FROM `income` ORDER By In_ID DESC";
    $result=$conn->query($sql);
    $in_date=array();
    if ($result->num_rows >0){
     // output data of each row
    while($row = $result->fetch_assoc()){
   array_push($in_date,array('In_ID'=>$row['In_ID'],'bill_no'=>$row['bill_no'],'date'=>$row['date'],'name'=>$row['name'],'amount'=>$row['amount']));
    }
      $date_view = array('in_date'=>$in_date);
        echo json_encode($date_view);
    } else {
    echo "0 results";
}



?>