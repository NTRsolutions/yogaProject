<?php
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://localhost/yogaproject/view_enquiry_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$enquiry = json_decode($content);
$date1 = date('Y-m-d', strtotime("-1 days"));
$date2 = date('Y-m-d', strtotime("+2 days"));
$enquiry_view = $enquiry->enquiry_view;
$i=0;
foreach($enquiry_view as $value){
     $eurydate = $value->followupdate;
    if($eurydate >= $date1 && $eurydate <= $date2){
        $i++;
    }
    
}
?>
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
							<li class="dropdown" >
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="material-icons">notifications</i>
									<span class="notification"><?php echo $i; ?></span>
									<p class="hidden-lg hidden-md">Notifications</p>
								</a>
								<ul class="dropdown-menu" style="width:200px">
                                    
                                    <table class="table table-borderless">
                                        <thead>
                                           <th> <strong>Token_no</strong> </th>
                                         <th>   <strong>Name</strong> </th>
                                           <th> <strong> Date </strong></th>
	                                    </thead>
	                                    <tbody>
                                                <?php foreach($enquiry_view as $value){ ?>

	                                        <tr>
                                                <?php 
                                                $eurydate = $value->followupdate;
                                                if($eurydate >= $date1 && $eurydate <= $date2){
                                                ?>
                                                <td><a href="enquiry_profile.php?enq_id=<?php echo $value->token_no; ?>"><?php echo $value->token_no; ?></a></td>
                                                
                                                <td><a href="enquiry_profile.php?enq_id=<?php echo $value->token_no; ?>"><?php echo $value->name;?></a></td>
                                                
                                                <td><a href="enquiry_profile.php?enq_id=<?php echo $value->token_no; ?>"><?php $dm = explode("-",$value->followupdate); echo $dm[2]."-".$dm[1];?></a></td>
                                                <?php
                                                }
                                                ?> 
	                                        	
	                                        </tr><?php }?>
                                        </tbody>
                                    </table>
                                    
                                    
                                    
                                    
								</ul>
							</li>

							<li class="dropdown">
								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
	 							   <i class="material-icons">person</i>
	 							   <p class="hidden-lg hidden-md">Profile</p>
		 						</a>
                                <ul class="dropdown-menu">
									<li><a href="#"><?php echo $_SESSION['username']; ?></a></li>
									<li><a href="login.php">Sign Out</a></li>
									
								</ul>
							</li>
						</ul>

				</div>
			</nav>

    