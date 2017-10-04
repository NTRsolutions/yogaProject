<?php 
/*
loc no 7-- //connect to database
loc no 8- // query to database for SELECT in enquiry table
loc no 18--//  0 result
*/
include 'config.php';
$sql = "SELECT * FROM enquiry ORDER BY token_no DESC";
$result = $conn->query($sql);
$enquiry = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($enquiry,array('token_no'=>$row['token_no'],'name'=>$row['name'],'surname'=>$row['surname'],'email'=>$row['email'],'contact'=>$row['contact'],'date'=>$row['date'],'followupdate'=>$row['followupdate'],'followuptime'=>$row['followuptime'],'message'=>$row['message'],'status'=>$row['status']));
    }
    $enquiry_view = array('enquiry_view'=>$enquiry);
    echo json_encode($enquiry_view);
} else {
    echo "0 results";
}
?>
