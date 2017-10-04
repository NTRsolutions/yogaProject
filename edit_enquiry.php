<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>
<?php include 'header.php'; ?>
<?php $page=7;include 'sidebar.php'; ?>
<?php $nav=6;include 'nav.php'; ?>
<?php
if(isset($_POST['e_token'])){
    $id = $_POST['e_token'];
    $data = array('tokenid'=> $id);
    # Create a connection
    $url = 'http://yoga.classguru.in/view_edit_enquiry_api.php';
    $ch = curl_init($url);
    # Form data string
    $postString = http_build_query($data, '', '&');
    # Setting our options
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    # Get the response
    $content = curl_exec($ch);
    
    $enquiry_detail = json_decode($content);
    $enquiry_view = $enquiry_detail->enquiry_view[0];
    //print_r($enquiry_view);
}
?>
<div class="content">

        <div class="container-fluid">
                        
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title"> Edit Enquiry</h4>
                        <p class="category">Fill up the enquiry Form</p>
                    </div>
                    <div class="card-content">
                        <form action="enquiry_edit_api.php" method="post">
                            <div class="row">
                               <div class="col-md-12">
                                    <div class="form-group label-floating" align="center">
                                        <label for="business" style="left:280px!important;" class="control-label"><strong>Enquiry Status</strong></label>
                                        <select name="status" required>
                                             <option value="">-- Select Status --</option>
                                            <option value="<?php echo $enquiry_view->status;?>"><?php echo $enquiry_view->status;?></option>
                                            <option value="pending">Pending</option>
                                            <option value="done">Done</option>
                                            <option value="postponed">Postponed</option>
                                            <option value="missed">Missed</option>
                                        </select>
                                    </div>
                                </div> 
                            </div>
                         <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Token Number</label>
                                        <input type="text" class="form-control validnumber" value="<?php echo $enquiry_view->tokenid; ?>" name="e_token" required readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Name</label>
                                        <input type="text" class="form-control" value="<?php echo $enquiry_view->name; ?>" name="e_name" required>
                                    </div>
                                </div>
                             <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Surname</label>
                                        <input type="text" class="form-control" value="<?php echo $enquiry_view->surname; ?>" name="surname" required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Email</label>
                                        <input id="txtEmail"  type="email" class="form-control" name="e_mail"
                                        value="<?php echo $enquiry_view->email; ?>"required>
                                    </div>
                                 </div>

                                 <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Contact</label>
                                        <input id="phone" onkeypress="phoneno()" maxlength="10" type="text" class="form-control"  value="<?php echo $enquiry_view->contact; ?>"   name="e_contact" required>
                                    </div>
                                 </div>

                            </div>

                            <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Form Date</label>
                                        <input type="date" value="<?php echo $enquiry_view->date;?>" class="form-control"   name="e_date" required readonly>
                                    </div>
                                 </div>
                                <div class="col-md-4">
                                    <div class="form-group label">
                                        <label class="control-label">FollowUp Date</label>
                                        <input type="date" value="<?php echo $enquiry_view->followupdate;?>" class="form-control"   name="followupdate" required>
                                    </div>
                                 </div>
                                <div class="col-md-4">
                                    <div class="form-group label">
                                        <label class="control-label">FollowUp Time</label>
                                        <input type="time" value="<?php echo $enquiry_view->followuptime;?>" class="form-control"   name="followupdate" required>
                                    </div>
                                 </div>
                            </div>
                            <div class="col-md-12">
                                   <div class="form-group label-floating">
                                <label class="control-label">Message</label>
                                <textarea rows="3" cols="30" name="e_message"  class="form-control"     required><?php echo $enquiry_view->message; ?></textarea> 
                                   </div>
                                </div>
                            <button type="submit" class="btn btn-primary pull-right" name="submit">Edit</button>                               

                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
</div>
    </div>
</div>

<?php include 'footer.php'; ?>
<?php include 'validation_script.php'; ?>
<?php include 'script_include.php'; ?>
<?php
}
else echo "<h1>No User Logged In</h1>";
?>
