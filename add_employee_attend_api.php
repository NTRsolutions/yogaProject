<?php 
include 'config.php';
if(isset($_POST['date']) && isset($_POST['timing']) && isset($_POST['eid'] )&& isset($_POST['checkbox']) ){ 
    $date = $_POST['date'];
    $timing = $_POST['timing'];
    $eid = $_POST['eid'];
    $eid = implode(",",$eid);
    $checkbox = $_POST['checkbox'];
    $absent_id = implode(",",$checkbox);
    $sql = "INSERT INTO `e_attend` (`date`, `time`) VALUES ('$date', '$timing')";
     if ($conn->query($sql) === TRUE) {
         $last_id = $conn->insert_id;
     }
         $sql = "INSERT INTO `e_attend_pa`(`e_attend_id`, `e_id`, `attendance`) VALUES ('$last_id','$eid','$absent_id')";
     if ($conn->query($sql) === TRUE) {
        ?> 
<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria- hidden="true">&times;</span></button>
        <strong>Success!</strong> You have been signed in successfully!
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

        
//        echo "While adding Client <br> Error: " . $sql . "<br>" . $conn->error;
    }
}
else {
    echo "<script> alert('no Value Found while adding Employee') </script>";
}
?>