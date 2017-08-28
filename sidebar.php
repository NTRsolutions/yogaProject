
<div class="wrapper">
<div class="sidebar" data-color="blue" data-image="../assets/img/sidebar-1.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

    <div class="logo">
				<a href="#" class="simple-text">
                    Yoga Site
				</a>
			</div>
	    	<div class="sidebar-wrapper">
                <ul class="nav">
	                <li <?php if($page==1){echo "class='active'";} ?>>
                        <a href="home.php">
                            <i class="material-icons">home</i>
	                        <p>Home</p>
	                    </a>
                    </li>
                    <li  <?php if($page==2){echo "class='active'";} ?>>
                        <a href="client.php">
	                        <i class="material-icons">person</i>
	                        <p>Client</p>
	                    </a>
	                </li>
                    <li  <?php if($page==3){echo "class='active'";} ?>>
	                    <a href="employee.php">
	                        <i class="material-icons">people</i>
	                        <p>Employees<p>
	                    </a>
	                </li>
                    
	                <li  style="margin: 0px 50px 0px 28px;">
	                   
                        <i class="material-icons">touch_app</i><div class="dropdown">
                        
                         <p class="dropdown-toggle" data-toggle="dropdown">Attendance<span  class="caret">  </span></p>
                                        
                            <ul class="dropdown-menu">
                                <li  <?php if($page==4){echo "class='active'";} ?>><a href="client_attendance.php">Client Attendance</a></li>
                                <li  <?php if($page==5){echo "class='active'";} ?>><a href="employee_attendance.php">Employee Attendance</a></li>
                        </ul>
                             </div>
	                    
                    </li>
                    <li  <?php if($page==6){echo "class='active'";} ?>>
                        <a href="add_batch.php">
	                        <i class="material-icons">group_add</i>	                
                            <p>Add Batch</p>
	                    </a>
	                </li>
                    <li  <?php if($page==7){echo "class='active'";} ?>>
	                    <a href="enquiry.php">
	                       <i class="material-icons">sms</i>
	                        <p>Enquiry</p>
	                    </a>
	                </li>
	               
	            </ul>
	    	</div>
	    </div>