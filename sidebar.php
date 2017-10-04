<div class="wrapper">
<div class="sidebar" data-color="blue" data-image="../assets/img/sidebar-1.jpg">
    <div class="logo">
        <a href="#" class="simple-text">
            Yoga
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
                <a href="batch.php">
                    <i class="material-icons">group_add</i>	                
                    <p>Batch</p>
                </a>
            </li>
           
            <li  <?php if($page==7){echo "class='active'";} ?>>
                <a href="enquiry_table.php">
                    <i class="material-icons">sms</i>
                    <p>Enquiry</p>
                </a>
            </li>
             <li  <?php if($page==8){echo "class='active'";} ?>>
                <a href="packages.php">
                    <i class="material-icons">local_offer</i>	             
                    <p>packages</p>
                </a>
            </li>
             <li  <?php if($page==9){echo "class='active'";} ?>>
                <a href="money_income.php">
                   <i class="material-icons">attach_money</i>	             
                    <p>Transaction</p>
                </a>
            </li>
        </ul>
    </div>
    </div>