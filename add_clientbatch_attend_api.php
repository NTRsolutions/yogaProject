<?php 
include 'config.php';

if(isset($_POST['batch_id']) && isset($_POST['date']) && isset($_POST['timing']) ){ 
    $batch_id = $_POST['batch_id'];
    $date = $_POST['date'];
    $timing = $_POST['timing'];
    $sql = "INSERT INTO c_attend (batch_id, date,	timing)
        VALUES ('$batch_id', '$date', '$timing')";
    
     if ($conn->query($sql) === TRUE) {  
         $last_id = $conn->insert_id;
         //$last_id = array('last_id'=>$last_id);
          
        ?> 
<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria- hidden="true">&times;</span></button>
        <strong>Success!</strong> <?php echo "Last inserted Id is ".$last_id;  ?>
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
    echo "<script> alert('no Value Found while adding Client') </script>";
}
?>