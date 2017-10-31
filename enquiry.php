<?php
// Start the session
session_start();
if(!empty($_SESSION)){
if(($_SESSION['permission']!='operator') && ($_SESSION['permission']!='user')){

?>
<?php include 'header.php'; ?>
<?php $page=7;include 'sidebar.php'; ?>
<?php $nav=6;include 'nav.php'; ?>
<div class="content">
<style>
    .color_style {
        color:red;
    }
    .selectpicker_style {
       width:250px;
       height:30px;
        }
    .selectpicker_style_1 {
       width:200px;
       height:30px;
        }
    .field_top{
        top:-27px!important;
    } 
     @media screen (min-width:320px) and (max-width:750px) {
    .selectpicker_style {
       width:50px;
       height:30px;
    }
    }
</style>    
<?php  
    include 'config.php';
    $sql = "SELECT max(`token_no`) FROM enquiry";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $lasttoken = $row['max(`token_no`)'];
    $newtoken = $lasttoken+1;
?>
<?php include 'config.php'; ?>
<div class="content">
    <div class="container-fluid">
        <div class="container-fluid">
             <div class="row">
                      <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="orange">
                            <i class="material-icons">sms</i>								
                        </div>
                        <div class="card-content">
                            <p class="category">Enquiry</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <a href="enquiry.php"><i class="material-icons">plus_one</i> Enquiry Information</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Enquiry</h4>
                            <p class="category">Fill up the enquiry Form</p>
                        </div>
                        <div class="card-content">
                            <form action="enquiry_table.php" method="post">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group label-floating">
                                        <label class="control-label field_top">Token Number </label>
                                        <input type="text" class="form-control validnumber" value="<?php echo $newtoken; ?>" name="e_token" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group label-floating">
                                            <label class="control-label field_top">Name <span class="required color_style"> * </span></label>         <input onkeyup="Latters(e_name, event)"     type="text" class="form-control validSurname" name="e_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group label-floating">
                                            <label class="control-label field_top">Surname <span class="required color_style"> * </span></label>
                                            <input onkeyup="Latters(surname, event)"     type="text" class="form-control validname" name="surname" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label field_top">Email <span class="required color_style"> * </span></label>        
                                            <input id="txtEmail"  type="email" class="form-control" name="e_mail" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                        <label class="control-label field_top">Contact No <span class="required color_style"> * </span></label><input id="phone" onkeypress="phoneno()" maxlength="10" type="text" class="form-control"   name="e_contact" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label field_top">Enquiry Date <span class="required color_style"> * </span></label>
                                            <input type="date" value="<?php echo date("Y-m-d"); ?>" class="form-control"   name="e_date" required>
                                        </div>
                                     </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label field_top">Followup Date <span class="required color_style"> * </span></label>
                                            <input type="date" value="<?php echo date("Y-m-d"); ?>" class="form-control"   name="followupdate" required>
                                        </div>
                                     </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label field_top">Followup Time </label>
                                            <input type="time" value="<?php echo time("hh:mm:ss"); ?>" class="form-control"   name="followuptime" required>
                                        </div>
                                     </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label field_top">Comment</label>
                                        <textarea rows="3" cols="30" name="e_message"  class="form-control"     required></textarea> 
                                    </div>
                                </div><br><br><br>

                                <button  id="refresh" type="submit" class="btn btn-primary pull-right" name="submit">Add</button>                               
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
} else{
    
echo '<script language="javascript">';
echo 'alert("Access denied");window.location = "enquiry_table.php" </script>';}
}
else {header('Location: index.php');}// echo "<h1>No User Logged In</h1>";
?>
