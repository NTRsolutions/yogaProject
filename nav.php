<div class="main-panel">
<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<?php if($nav==1):?>
                            <a class="navbar-brand" href="#"><?php echo "Home"; ?></a>
					    <?php endif;?>
                        <?php if($nav==2):?>
                            <a class="navbar-brand" href="#">Client</a>
					    <?php endif;?>
                        <?php if($nav==3):?>
                            <a class="navbar-brand" href="#">Employee</a>
					    <?php endif;?>
                        <?php if($nav==4):?>
                            <a class="navbar-brand" href="#">Client Attendance</a>
					    <?php endif;?>
                        <?php if($nav==7):?>
                            <a class="navbar-brand" href="#">Employee Attendance</a>
					    <?php endif;?>
                        <?php if($nav==5):?>
                            <a class="navbar-brand" href="#">Batch</a>
					    <?php endif;?>
                        <?php if($nav==6):?>
                            <a class="navbar-brand" href="#">Enquiry</a>
					    <?php endif;?>
                    </div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="material-icons">notifications</i>
									<span class="notification">5</span>
									<p class="hidden-lg hidden-md">Notifications</p>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Mike John responded to your email</a></li>
									<li><a href="#">You have 5 new tasks</a></li>
									<li><a href="#">You're now friend with Andrew</a></li>
									<li><a href="#">Another Notification</a></li>
									<li><a href="#">Another One</a></li>
								</ul>
							</li>

							<li>
								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
	 							   <i class="material-icons">person</i>
	 							   <p class="hidden-lg hidden-md">Profile</p>
		 						</a>
							</li>
						</ul>

				</div>
			</nav>
    