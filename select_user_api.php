<?php  
include 'config.php';
if(isset($_POST['username']) && isset($_POST['password'])){
    
     $username = $_POST['username'];
     $password = $_POST['password'];
     $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password' ";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) >0) {
        
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
        echo "Notadmin";
    }
}
else {
    echo "<script> alert('no Value Found while adding Client') </script>";
    
}
?>
