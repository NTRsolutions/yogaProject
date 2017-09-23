<?php
// Start the session
session_start();

 
?>
<?php
if(isset($_POST['login'])&&!empty($_POST['username'])&&!empty($_POST['password'])){
    $username = $_POST['username']; 
    $password = $_POST['password'];
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;
}
    if(isset($_POST['login'])&&!empty($_POST['username'])&&!empty($_POST['password'])){
$username = $_POST['username'];
$password = $_POST['password'];
$data = array(
    'username' => $_POST['username'],
    'password' => $_POST['password'],
);  
# Create a connection
$url = 'http://yoga.classguru.in/select_user_api.php';
$ch = curl_init($url);
# Form data string
$postString = http_build_query($data, '', '&');
# Setting our options
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$response = curl_exec($ch);

if($response === "Notadmin"){
    
    echo "<script>alert('Not Valid Username or Password')</script>";
}
        else {
            echo "<script>debugger;window.location = 'home.php';</script>";
        }
curl_close($ch);
    }
?>
<?php include 'config.php'; ?>
<?php include 'header.php'; ?>
<style>
    .card{
        margin-top: 50px!important;
    }
    h1{
        text-align: center;
        color:#8e24aa;
        font-weight: 200;
    }
</style>
<div class="content">
    <h1>Yoga</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Login</h4>
                        <p class="category">Please Enter Your Username and Password</p>
                    </div>
                    <div class="card-content">
                        <form action="index.php" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">UserName </label>
                                        <input type="text" class="form-control" name="username">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Password</label>
                                        <input type="password" class="form-control"    name="password" >
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right" name="login">Login</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'script_include.php'; ?>