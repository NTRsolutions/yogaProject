<?php
// Start the session
session_start();
session_unset(); 
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
	                                <form action="home.php" method="post">
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
													<input type="password" class="form-control" name="password" >
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