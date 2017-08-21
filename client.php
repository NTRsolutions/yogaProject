<?php include 'header.php'; ?>
  <?php include 'sidebar.php'; ?>
   <?php include 'nav.php'; ?>
	   
           <div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="orange">
								   <i class="material-icons">people</i>
								</div>
								<div class="card-content">
									<p class="category">Client<p>
								</div>
								<div class="card-footer">
									<div class="stats">
                                         <a href="add_client.php">
                                             <i class="material-icons">plus_one</i> Add New Client
                                        </a>
								
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="green">
                                      <i class="material-icons">people</i>
								</div>
								<div class="card-content">
									<p class="category">Attendance</p>
<!--									<h3 class="title">50</h3>-->
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">plus_one</i> Mark Attendance
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="red">
									<i class="material-icons">info_outline</i>
								</div>
								<div class="card-content">
									<p class="category">Performance</p>
<!--									<h3 class="title">75</h3>-->
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">plus_one</i> Add Performance
									</div>
								</div>
							</div>
						</div>

                      <div class="col-md-12">
	                        <div class="card">
                                    
	                            <div class="card-header" data-background-color="purple">
                                    
	                                <h4 class="title">Client Detailes</h4>
                                        
                                    <div class="form-group navbar-form navbar-right is-empty" role="search">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <span class="material-input"></span>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
    								<i class="material-icons">search</i><div class="ripple-container"></div>
                                    </button>
	                            </div>
                                
                                
	                            <div class="card-content table-responsive">
	                                <table class="table">
	                                    <thead class="text-primary">
	                                    	<th>Sr No.</th>
	                                    	<th>Name</th>
	                                    	<th>Fees</th>
											<th>Payment Satus</th>
	                                    </thead>
	                                    <tbody>
	                                        <tr>
	                                        	<td>1</td>
	                                        	<td>Niger</td>
	                                        	<td>Oud-Turnhout</td>
												<td class="text-primary">$36,738</td>
	                                        </tr>
	                                        <tr>
	                                        	<td>2</td>
	                                        	<td>Curaçao</td>
	                                        	<td>Sinaai-Waas</td>
												<td class="text-primary">$23,789</td>
	                                        </tr>
	                                        <tr>
	                                        	<td>3</td>
	                                        	<td>Netherlands</td>
	                                        	<td>Baileux</td>
												<td class="text-primary">$56,142</td>
	                                        </tr>
	                                        <tr>
	                                        	<td>4</td>
	                                        	<td>Korea, South</td>
	                                        	<td>Overland Park</td>
												<td class="text-primary">$38,735</td>
	                                        </tr>
	                                        <tr>
	                                        	<td>5</td>
	                                        	<td>Malawi</td>
	                                        	<td>Feldkirchen in Kärnten</td>
												<td class="text-primary">$63,542</td>
	                                        </tr>
	                                        <tr>
	                                        	<td>6</td>
	                                        	<td>Chile</td>
	                                        	<td>Gloucester</td>
												<td class="text-primary">$78,615</td>
	                                        </tr>
	                                    </tbody>
	                                </table>

	                            </div>
	                        </div>
	                    </div>

           
	                 
	                </div>
	            </div>
	        </div>



					
			<?php include 'footer.php'; ?>

<?php include 'script_include.php'; ?>
