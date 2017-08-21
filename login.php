<?php include 'header.php'; ?>
<?php include 'config.php'; ?>
<?php 
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];    
    $data = array(
        'username'=>$username,
        'password'=>$password
    );
    # Create a connection
    $url = 'http://localhost/yogaProject/login_api.php';
    $ch = curl_init($url);
    # Form data string
    $postString = http_build_query($data, '', '&');
    # Setting our options
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    # Get the response
    $response = curl_exec($ch);
    print_r($response);
    curl_close($ch);
}
?>
<div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-6 col-md-offset-6 ">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Login</h4>
									<p class="category">Please Enter Your Username and Password</p>
	                            </div>
	                            <div class="card-content">
	                                <form action="login.php" method="post">
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
													<input type="text" class="form-control" name="password" >
												</div>
	                                        </div>
	                                    </div>
                                        <button type="submit" class="btn btn-primary pull-right">Login</button>
	                                    <div class="clearfix"></div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
                    </div>
	            </div>
	        </div>
     </div>
 </div>
<?php include 'script_include.php'; ?>