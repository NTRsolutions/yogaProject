<?php
// Start the session
session_start();
if(!empty($_SESSION)){
if(($_SESSION['permission']!='operator') && ($_SESSION['permission']!='user')){
/*user access contrl by session*/
?>
<?php include 'header.php'; ?>
<?php $page=3;include 'sidebar.php'; ?>
<?php $nav=3;include 'nav.php'; ?>
<div class="content">
    <div class="container-fluid">
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
$sql="SELECT * FROM employee ORDER BY e_ID DESC LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$id=$row['e_ID'];
$img=$id+1;                    
//print_r($img);
?>        
        
<?php 
if(isset($_POST['submit'])){
    if(isset($_POST['e_name']) && isset($_POST['e_surname']) /* && isset($_POST['Gender'])&& isset($_POST['DOB'])&& isset($_POST['Age']) &&isset($_POST['Title']) && isset($_POST['Salary']) && isset($_POST['Register_ID'])&& isset($_POST['address'])&& isset($_POST['contact'])&& isset($_POST['Email'])*/){
$Name = $_POST['e_name'] . $img;
$url = "assets/empl_image/$Name.jpg";
    $data = array( 
        'e_name' => $_POST['e_name'],
        'e_surname' => $_POST['e_surname'],
        'Gender' => $_POST['Gender'],
        'DOB' => $_POST['DOB'],
        'Age' => $_POST['Age'],
        'Title' => $_POST['Title'],
        'Salary' => $_POST['Salary'] ,
        'Register_ID' => $_POST['Register_ID'],
        'address' => $_POST['address'],
        'contact' => $_POST['contact'],
        'Email' => $_POST['Email'],
        'id_name' => $_POST['id_name'],
        'id_no' => $_POST['id_no'],
        'photo' => $url
        
        );
    # Create a connection
    $url = 'http://yoga.classguru.in/add_employee_api.php';
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
    <!--start card form here for add employee,attendace,payment-->
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="orange">
                <i class="material-icons">people</i>
            </div>
            <div class="card-content">
                <p class="category">Employee<p>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="add_employee.php">
                        <i class="material-icons">plus_one</i> Add New Employee
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="green">
                <i class="material-icons">touch_app</i>
            </div>
            <div class="card-content">
                <p class="category">Attendance</p>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="employee_attendance.php">
                        <i class="material-icons">plus_one</i> Mark Attendance
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="red">
                <i class="material-icons">payment</i>
            </div>
            <div class="card-content">
                <p class="category">Payment</p>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="employee_payment.php"><i class="material-icons">plus_one</i> Add Payment</a>
                </div>
            </div>
        </div>
    </div>
</div>  
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Add Employee</h4>
                        <p class="category">Fill up the employee Form</p>
                    </div>
                    <div class="card-content">
                        <form action="add_employee.php" method="post" enctype="multipart/form-data">
<!-- form for add new employee-->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                <label class="control-label field_top">Name <span class="required color_style"> * </span></label>
                                <input  onkeyup="allLatters(e_name, event)" type="text" 
                                class="form-control validName" name="e_name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                <label class="control-label field_top">Surname <span class="required color_style"> * </span></label>
                                <input  onkeyup="Latters(e_surname, event)" type="text" 
                                 class="form-control validSurname" name="e_surname" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                   <div style="padding:5px 0px 0px 0px;"> 
                                    <label class="control-label">Gender <span class="required color_style"> * </span></label>
                                    <select class="selectpicker_style_1" name="Gender" required>
                                    <option >Select Gender </option>
                                    <option name="Gender" value="male">Male</option>
                                    <option name="Gender" value="female">Female</option>
                                    </select>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                            
                        <div class="row">                               
                            <div class="col-md-4">
                                <div class="form-group label">
                                    <label class="control-label">Date of Birth</label>
                                    <input   type="date" class="form-control validnumbers" name="DOB" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                               <div class="form-group label-floating">
                                    <label class="control-label field_top">Contact <span class="required color_style"> * </span></label>
                                    <input type="text" class="form-control" name="contact" id="phone" onkeypress="phoneno()" maxlength="10" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label field_top">Email</label>
                                    <input type="Email" class="form-control" name="Email" >
                                </div>
                            </div>
                        </div>
                                
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                <label class="control-label">Title</label>
                                <input   type="text" class="form-control" name="Title" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Salary<span class="required color_style"> * </span></label>
                                    <input  onkeyup="allnumeric(Salary, event)"   type="numbers" class="form-control validnumber" name="Salary" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Age <span class="required color_style"> * </span></label>
                                    <input type="numbers" class="form-control validnumber" name="Age" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">                               
                               <div class="col-md-4">
                                   <div class="form-group label-floating">
                                        <label class="control-label">Identity Proof Name<span class="required color_style"> * </span></label>
                                        <input  type="Text" class="form-control" name="id_name" required >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                   <div class="form-group label-floating">
                                        <label class="control-label">Identity No<span class="required color_style"> * </span></label>
                                        <input  type="text" class="form-control" name="id_no" required >
                                    </div>                                
                                </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Register ID <span class="required color_style"> * </span></label>
                                    <input  type="text" 
                                    class="form-control" name="Register_ID" required>
                                </div>
                            </div>
                                
                        </div>    
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group label-floating">
                                    <label class="control-label">Address<span class="required color_style"> * </span></label>
                                    <textarea rows="1" cols="30" name="address" class="form-control" required></textarea> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <?php 
                                        if(isset($_POST['submit']))
                                        { file_put_contents("assets/empl_image/$Name.jpg",file_get_contents($_FILES['img']['tmp_name']));
                                        }
                                    ?>
                                    Select image :<br><br>
                                    <input type="file" name="img" accept="image/*"/>
                                    
                                </div>
                            </div> 
                            
                            <button type="submit" name="submit"class="btn btn-primary pull- right">Submit</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--included file of footer,table serch script and session end here-->
<?php include 'footer.php'; ?>
<?php include 'validation_script.php'; ?>
<?php include 'script_include.php'; ?>
<?php
} 
  else{  
echo '<script language="javascript">';
echo 'alert("Access denied");window.location = "employee.php" </script>';
  }
}
else 
    header('Location: index.php');//echo "<h1>No User Logged In</h1>";
?>
