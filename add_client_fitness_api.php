<?php 
include 'config.php';
$sql="SELECT * FROM client ORDER BY c_ID DESC LIMIT 1";
      $result=$conn->query($sql);
    $client=array();
    if ($result->num_rows >0){
     // output data of each row
    while($row = $result->fetch_assoc()){
   array_push($client,array('c_ID'=>$row['c_ID']));
    }
        
    }  $c_ID=$client[0];
$c_ID1=$c_ID['c_ID'];
//print_r($c_ID1);


//connect to databasse
if(isset($_POST['date_before']) && isset($_POST['Diet_before']) && isset($_POST['Weight_before'])){               //if batch name and batch time is                                                                                  submited then go in if condition
    $date_before = $_POST['date_before'];
    $Diet_before = $_POST['Diet_before'];
    $Weight_before = $_POST['Weight_before'];
    $height_before = $_POST['height_before'];
 
    $sql = "INSERT INTO client_fitness (c_ID,date_before, Diet_before, Weight_before,height_before,bmi) 
        VALUES ('$c_ID1','$date_before','$Diet_before', '$Weight_before', '$height_before','22')";            // insert into batch table if batch name and batch                                                                 time is set
     if ($conn->query($sql) === TRUE){
        header('Location: client.php');                      // if query is connected then print as success and go                                                                     in next loop
        ?> 
<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria- hidden="true">&times;</span></button>
        <strong>Success!</strong> client fitness information added successfully!
</div>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 1000)
</script>
    <?php
        //echo "<script>alert('Client created successfully')</script>";
    } else {                    // if query is not connected to databassse successfully print as unsuccessful
         
        ?> 
<div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria- hidden="true">&times;</span></button>
        <strong>Success!</strong> Sorry! unsuccessful entry
</div>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 1000);
</script>
    <?php

        
//        echo "While adding Client <br> Error: " . $sql . "<br>" . $conn->error;
    }
}
else {                                      //if query is connected but no value in it then print as NO value found 
    echo "<script> alert('no Value Found while adding client fitness ') </script>";
}
?>