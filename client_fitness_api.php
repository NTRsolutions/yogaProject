<?php 
/*
loc no 10-- //connect to database
loc no 21-- // query to database for UPDATE in client table
loc no 18--//  connect query ? if it connected then execute alert record UPDATE successfully go to client.php                                                       
loc no 20---  // else record not UPDATE
*/


include 'config.php';
if(isset($_POST['c_ID']) && isset($_POST['date_before'])){

     $c_id = $_POST["c_ID"];
     $date_before= $_POST['date_before'];
     $Diet_before = $_POST['Diet_before'];
     $Weight_before = $_POST['Weight_before'];
     $date_after = $_POST['date_after'];
     $Diet_after = $_POST['Diet_after'];
     $Weight_after = $_POST['Weight_after'];
     $date_latest = $_POST['date_latest'];
     $Diet_latest = $_POST['Diet_latest'];
     $Weight_latest = $_POST['Weight_latest'];
   
     $sql = "INSERT INTO `client_fitness`( `c_ID`, `date_before`, `Diet_before`, `Weight_before`, `date_after`, `Diet_after`, `Weight_after`, `date_latest`, `Diet_latest`, `Weight_latest`) VALUES ('$c_id','$date_before','$Diet_before','$Weight_before','$date_after','$Diet_after','$Weight_after','$date_latest','$Diet_latest','$Weight_latest')";
    
   
    if ($conn->query($sql) === TRUE) {
        header('Location: client.php');
    }
    else{
      echo "Code Not Updated";
    }
}
else{
    echo "sorry code is not updated ";
}
?>
<?php //
    /* $sql = "INSERT INTO `client_fitness`( `c_ID`, `date_before`, `Diet_before`, `Weight_before`, `date_after`, `Diet_after`, `Weight_after`, `date_latest`, `Diet_latest`, `Weight_latest`) VALUES ('$c_id','$date_before','$Diet_before','$Weight_before','$date_after','$Diet_after','$Weight_after','$date_latest','$Diet_latest','$Weight_latest')"*/
?>
