
<?php 
/*
loc no 7-- //connect to database
loc no 11-- // query to database for SELECT in batch_ID table
loc no 18--//  0 result
*/
include 'config.php';
   $sql = "SELECT * FROM `income` ORDER BY in_ID DESC";
    $result=$conn->query($sql);
    $in_date=array();
    if ($result->num_rows >0){
     // output data of each row
    while($row = $result->fetch_assoc()){
   array_push($in_date,array('in_name'=>$row['in_name'],'bank_name'=>$row['bank_name'],'cheque_no'=>$row['cheque_no'],'amount'=>$row['amount'],'date'=>$row['date'],'c_d'=>$row['c_d'],'balance'=>$row['balance']));
    }
      $date_view = array('in_date'=>$in_date);
        echo json_encode($date_view);
    } else {
    echo "0 results";
}

?>