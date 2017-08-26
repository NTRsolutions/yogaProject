<?php
include 'config.php';

isset($_POST['delete'] && $_POST['c_ID'])
    $id = $_POST['c_ID'];

$row=mysql_fetch_array($result);
//$id=$row[0];



$sql = "DELETE * FROM client WHERE c_ID='$id'";
$result = $conn->query($sql);

 if ($result) { 
 echo "Record deleted successfully";
 } else {
 echo "Error deleting record: " .$conn->query($sql);
 }

?>
