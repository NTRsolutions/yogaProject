<?php 
include 'config.php';
/*
loc no 2-- //connect to database
 loc no 25-- // query to database for insert data in e_attend table
 loc no 30-- // query to database for insert data in e_attend_pa table
  loc no 31--// checked does query connect ? if it connected then execute                                                        next loop and print successfull
 loc no 46--  // if query is not connected to databse then execute next loop and print as                                             unsuccessfull
 loc no 66--   // if Query is empty then print as no value fount
*/

if(isset($_POST['date']) /*&& isset($_POST['timing'])*/ && isset($_POST['eid']) ){ 
    $date = $_POST['date'];
    $in_time = $_POST['in_time'];
    $out_time = $_POST['out_time'];
    $eid = $_POST['eid'];
    $eid = implode(",",$eid);
    if(!isset($_POST['checkbox'])){
        $checkbox=NULL;
        $absent_id=NULL;
    }else{
        $checkbox = $_POST['checkbox'];
        $absent_id = implode(",",$checkbox);
    }
    
    
    $sql = "INSERT INTO `t_attend` (`date`, `in_time`, `out_time`) VALUES ('$date', '$in_time', '$out_time')";
     if ($conn->query($sql) === TRUE) {
         $last_id = $conn->insert_id;
     }
         $sql = "INSERT INTO `t_attend_pa`(`e_attend_id`, `e_id`, `attendance`) VALUES ('$last_id','$eid','$absent_id')";
     if ($conn->query($sql) === TRUE) {
        ?> 
<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria- hidden="true">&times;</span></button>
        <strong>Success!</strong> Employee attendance added successfully!
</div>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 1000)
</script>
    <?php
        //echo "<script>alert('employee created successfully')</script>";
    } else {
         
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

        
//        echo "While adding employee <br> Error: " . $sql . "<br>" . $conn->error;
    }
}
else {
    echo "<script> alert('no Value Found while adding Employee') </script>";
}
?>