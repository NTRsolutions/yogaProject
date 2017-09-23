<?php 
include 'config.php';
if(isset($_POST['Catogary']) && isset($_POST['Active']) && isset($_POST['Name_of_plan']) && isset($_POST['Time_unit']) && isset($_POST['batch']) && isset($_POST['Description']))  {             //connect to databasse
               //if packages name and packages time is  submited then go in condition
    $Catogary = $_POST['Catogary'];
    $Active = $_POST['Active'];
    $Name_of_plan = $_POST['Name_of_plan'];
    $Time_unit = $_POST['Time_unit'];
    $batch = $_POST['batch'];
    $Description = $_POST['Description'];
    
    $sql = "INSERT INTO `packages` (`Catogary`, `Active`, `Name_of_plan`, `Time_unit`, `batch`, `Description`) VALUES ('$Catogary', '$Active', '$Name_of_plan', '$Time_unit' ,'$batch','$Description')";            // insert into packages table                                             if packages name and batch time is set                                                                
     if ($conn->query($sql) === TRUE) {                       // if query is connected then print as success and go                                                                     in next loop
        ?> 
<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria- hidden="true">&times;</span></button>
        <strong>Success!</strong> packages information added successfully!
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
    echo "<script> alert('no Value Found while adding packages') </script>";
}
?>