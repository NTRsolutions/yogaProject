<?php 
 
include 'config.php';
$id = $_POST["c_ID"];
$sql = "SELECT * FROM client WHERE c_ID = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
    $name=$row['c_name'];
    $surname=$row['c_surname'];
  //print_r($name);

 
/*
loc no 10-- //connect to database
loc no 21-- // query to database for UPDATE in client table
loc no 18--//  connect query ? if it connected then execute alert record UPDATE successfully go to client.php                                                       
loc no 20---  // else record not UPDATE
*/


if(isset($_POST['c_ID']) && isset($_POST['date_latest'])){

     $c_id = $_POST["c_ID"];
       $date_before = $_POST['date_before'];
    $Diet_before = $_POST['Diet_before'];
    $Weight_before = $_POST['Weight_before'];
    $height_before = $_POST['height_before'];

     $date_latest = $_POST['date_latest'];
     $Diet_latest = $_POST['Diet_latest'];
     $Weight_latest = $_POST['Weight_latest'];
     $height_latest = $_POST['height_latest'];
     $bmi = $_POST['bmi'];
    
   
     $sql = "INSERT INTO `client_fitness`( `c_ID`,`date_latest`, `Diet_latest`, `Weight_latest`,`height_latest`,`bmi`) VALUES ('$c_id','$date_latest','$Diet_latest','$Weight_latest','$height_latest','$bmi')";

    
   
    if ($conn->query($sql) === TRUE) {
        header("Location: client_fitness.php?cid=$id&cname=$name&csurname=$surname");
    }
    else{
      echo "Code Not Updated";
    }
}
else{
    echo "sorry code is not updated ";
}
?>
