<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>
<?php include 'header.php'; ?>
<?php $page=3;include 'sidebar.php'; ?>
<?php $nav=3;include 'nav.php'; ?>
<div class="content">
    <div class="container-fluid">
<?php 
$sql="SELECT * FROM trainer ORDER BY e_ID DESC LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$id=$row['e_ID'];
$img=$id+1;
                      
//print_r($img);
?>         
        
<?php 
if(isset($_POST['submit'])){
    if(isset($_POST['e_name']) && isset($_POST['e_surname']) && isset($_POST['Gender']) && isset($_POST['DOB']) && isset($_POST['Age']) && isset($_POST['Title']) && isset($_POST['Salary']) && isset($_POST['Register_ID']) && isset($_POST['address']) && isset($_POST['contact']) && isset($_POST['Email'])){
        $Name = $_POST['e_name'] . $img;
    $url = "trainer_image/$Name.jpg";
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
    $url = 'http://yoga.classguru.in/add_trainer_api.php';
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
  <div class="col-lg-3 col-md-4 col-sm-4">
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
  <div class="col-lg-3 col-md-4 col-sm-4">
    <div class="card card-stats">
        <div class="card-header" data-background-color="blue">
            <i class="material-icons">people</i>
        </div>
        <div class="card-content">
            <p class="category">Trainer<p>
        </div>
        <div class="card-footer">
            <div class="stats">
                <a href="trainer.php">
                    <i class="material-icons">plus_one</i> View Trainer
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-4 col-sm-4">
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
  <div class="col-lg-3 col-md-4 col-sm-4">
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
                        <h4 class="title">Add Trainer</h4>
                        <p class="category">Fill up the Trainer Form</p>
                    </div>
                    <div class="card-content">
                        <form action="add_trainer.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Name </label>
                                     <input  onkeyup="allLatters(e_name, event)"  type="text" class="form-control validName" name="e_name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Surname </label>
                                   <input onkeyup="Latters(e_surname, event)"  type="text" class="form-control validSurname" name="e_surname" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div >
                                        Gender :<select style="width:120px; height:40px;" name="Gender" required>
                                        <option >Select Gender</option>
                                        <option name="Gender" value="male">Male</option>
                                        <option name="Gender"  value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label">
                                        <label class="control-label">Date of Birth</label>
                                        <input   type="date" class="form-control validnumbers" name="DOB" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Age</label>
                                        <input   onkeyup="allnumeric(Age, event)" type="text" class="form-control" name="Age" required >
                                    </div>
                                </div>
                            </div>
                                
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                    <label class="control-label">Title</label>
                                    <input   type="text" class="form-control validnumber" name="Title" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Salary</label>
                                        <input  onkeyup="allnumeric(Salary, event)"   type="numbers" class="form-control validnumber" name="Salary" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Register ID </label>
                                        <input  type="text" 
                                        class="form-control validName" name="Register_ID" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                    <label class="control-label">Address</label>
                                    <textarea rows="3" cols="30" name="address" class="form-control" required></textarea> 
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div  class="form-group label-floating">
                                    <label class="control-label">Contact</label>
                                    <input type="text" class="form-control"    name="contact" id="phone" onkeypress="phoneno()" maxlength="10" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Email ID</label>
                                        <input  type="email" class="form-control validemail" name="Email" required >
                                    </div>
                                </div>
                            </div>
                           <div class="row">
                               <div class="col-md-3">
                                   <div class="form-group label-floating">
                                        <label class="control-label">Identity Proof Name</label>
                                        <input  type="Text" class="form-control validemail" name="id_name" required >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                   <div class="form-group label-floating">
                                        <label class="control-label">Identity No</label>
                                        <input  type="text" class="form-control validemail" name="id_no" required >
                                    </div>
                                </div>
                               <div class="col-md-6">
                                    <?php 
                                        if(isset($_POST['submit']))
                                        { file_put_contents("trainer_image/$Name.jpg",file_get_contents($_FILES['img']['tmp_name']));
                                        }
                                    ?>
                                    Select image :<br><br>
                                    <input type="file" name="img" accept="image/*"/>
                                </div>
                             
                            </div>
                            
                            <button type="submit" name="submit"class="btn btn-primary pull- right">Add</button>
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
