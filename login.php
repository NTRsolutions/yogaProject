
<?php include 'header.php'; ?>
<?php include 'config.php'; ?>
<style>
.main-panel > .content
      {
      	margin:70px 50px 50px 150px!important;
      	width:60%!important;
        
          
      }
    @media screen and (min-width:320px) and (max-width:780px){
    

.main-panel > .content
      {
      	margin:50px 50px 50px 77px!important;
      	width:60%!important;
        
          
      }
}

</style>
<div class="wrapper">
 <div class="main-panel">
     <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-8">
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
													<input type="password" class="form-control" name="password" >
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