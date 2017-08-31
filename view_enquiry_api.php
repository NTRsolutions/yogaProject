<?php 
include 'config.php';
$sql = "SELECT * FROM enquiry ORDER BY token_no DESC";
$result = $conn->query($sql);
$enquiry = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($enquiry,array('token_no'=>$row['token_no'],'name'=>$row['name'],'email'=>$row['email'],'contact'=>$row['contact'],'message'=>$row['message'],'date'=>$row['date']));
    }
    $enquiry_view = array('enquiry_view'=>$enquiry);
    echo json_encode($enquiry_view);
} else {
    echo "0 results";
}
?>
