<?php include 'config.php'; ?>
<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<?php include 'nav.php'; ?>
    <div class="content">
        <div class="container-fluid">
            <?php 
            if(isset($_POST['submit'])){ 
                if(isset($_POST['c_name']) && isset($_POST['c_surname']) &&isset($_POST['c_fees']) &&isset($_POST['c_contact']) &&isset($_POST['c_address'])){
                    $data = array(
                        'c_name' => $_POST['c_name'],
                        'c_surname' => $_POST['c_surname'],
                        'c_fees' => $_POST['c_fees'],
                        'c_contact' => $_POST['c_contact'],
                        'c_address' => $_POST['c_address']
                    );
                    # Create a connection
                    $url = 'http://localhost/yogaProject/add_client_api.php';
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
                    }
                    ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Add Client</h4>
                            <p class="category">Fill up the Client Form</p>
                        </div>
                        <div class="card-content">
                            <form action="add_client.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Name </label>
                                            <input type="text" class="form-control" name="c_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Surname </label>
                                            <input type="text" class="form-control" name="c_surname">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Fees</label>
                                            <input type="text" class="form-control" name="c_fees">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Contact</label>
                                            <input type="text" class="form-control" name="c_contact">
                                        </div>
                                    </div>
	                            </div>
                                
                                
                 <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Address</label>
                                            <textarea rows="3" cols="30" name="c_address"  class="form-control"></textarea> 
                                        </div>
                                    </div>
                                    
                     
                                  <div class="col-md-6">
                                    <div class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="material-icons">arrow_drop_down</i>
									<span class="notification">Select Batch</span>
									<p class="hidden-lg hidden-md">Notifications</p>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Mike John responded to your email</a></li>
									<li><a href="#">You have 5 new tasks</a></li>
									<li><a href="#">You're now friend with Andrew</a></li>
									<li><a href="#">Another Notification</a></li>
									<li><a href="#">Another One</a></li>
								</ul>
						          </div>
                              </div>        
                  </div>

                                
                                <button type="submit" name="submit"class="btn btn-primary pull-right">Add</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php include 'footer.php'; ?>
<?php include 'script_include.php'; ?>
