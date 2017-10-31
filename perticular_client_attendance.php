<?php 
include 'config.php';

$c_id = $_GET['cid'];
$c_name = $_GET['cname'];
$c_surname = $_GET['csurname'];
if(isset($_POST['Selectdate'])){
    $monthYear = $_POST['date'];
    $montharray = explode("-",$monthYear);
    $month = $montharray['1'];
}
else{
    $month = date('m');
}
$sql1 = "SELECT * FROM c_attend";
$data =array();
$result1 = $conn->query($sql1);
 while($row1 = $result1->fetch_assoc()) {
        $date = explode("-",$row1['date']);
     if($date[1] == $month){
         $id = $row1['c_attend_ID'];
         $sql2 = "SELECT * FROM c_attend_pa WHERE c_attend_id = '$id' AND c_id LIKE '%$c_id%'";
         $result2 = $conn->query($sql2);
         while($row2 = $result2->fetch_assoc()) {
array_push($data,array('date'=>$row1['date'],'present'=>$row2['c_id'],'absent'=>$row2['attendance']));
         }
     }
 }
?>
<?php
// Start the session
/*session_start();
if(!empty($_SESSION)){*/
?>
<?php include 'header.php'; ?>
<style>
    #myInput{
        width:20%;
        float:right;
        color:white;
    }
    .form-group{
        padding-bottom: 0px!important;
        margin: 0 0 0 0!important;
    }
    .icon{
        float:right;
    }
</style>
<?php $page=2;include 'sidebar.php'; ?>
<?php $nav=5;include 'nav.php'; ?>
<div class="content">
    <div class="container-fluid">

        <div class="row">
              <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Select Date</h4>
                    </div>
                    <div class="card-content">
                        <form action="perticular_client_attendance.php" method="post">            
                                 <div class="col-md-4">
                                    <div  style="margin:18px 0 0 0" class="form-group label-floating">
                                        <label for="business"></label>
                                        <select style="width:300px; height:38px;" name="date" <?php if(isset($_POST['Selectdate'])){ echo 'disabled';}?> >
                                        <?php
                                            if(isset($_POST['Selectdate'])){
                                                ?>
                                            <option value="<?php echo $_POST['date'];?>" ><?php echo $_POST['date'];?></option>
                                            <?php
                                            }
                                            else{
                                              for ($i = 0; $i <= 12; ++$i) {
                                                $time = strtotime(sprintf('-%d months', $i));
                                                $value = date('Y-m', $time);
                                                $label = date('F Y', $time);
                                                printf('<option value="%s">%s</option>', $value, $label);
                                              }
                                            }
                                          ?>
                                        </select>
                                    </div>
                                </div>
                                <button style="margin-top:8px; margin-left:46px;" type="submit" class="btn btn-primary" name="Selectdate" <?php if(isset($_POST['Selectdate'])){ echo 'disabled';}?>>Select date</button>
                                <div class="clearfix"></div>
                            </form>
                    </div>
                  </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header" data-background-color="purple">
                        <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search..">
                        <i class="material-icons icon">search</i> 
                        <h4 class="title">Client attendance Details</h4>
                        <p>Client Id : <?php echo $c_id; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   Name : <?php echo $c_name; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Surname : <?php echo $c_surname; ?></p>
                    </div>
                </div>
                <div class="card-content">
                    <table class="table table-hover" >
                        <thead class="text-primary">
                            <th>Sr no.</th>
                            <th>Date</th>
                            <th>Attendance</th>
                        </thead>
                        <tbody id="myTable">
                          <?php $i=1;$absentc=0;$presentc=0;foreach($data as $value): ?>  <tr>
                                <td><?php echo $i;$i++; ?></td>
                                <td><?php echo $value['date'];?></td>
                                <td>
                                    <?php $absent = explode(",",$value['absent']);
                                    $ab = in_array("$c_id",$absent);
                                    if($ab >0){ $absentc++; echo "<font color='red'>absent</font>";}
                                    else { $presentc++;echo "<font color='green'>present</font";} 
                                    ?>
                                </td>
                            </tr><?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                    <br>
                    <br>
                    <br>
                <div class="card-content">
                    <table  class="table table-hover" style="width:50%">
                        <col align="left">
                            <thead class="text-primary">
                            <th>Total Attendance</th>
                            <th>Present</th>
                            <th>Absent</th>
                            </thead>
                    
                         <tbody id="myTable">
                        <tr>
                            <td><strong>Total</strong></td>
                            <td><?php echo $presentc;?></td>
                            <td><?php echo $absentc; ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<?php include 'tablesearch_script.php'; ?>
<?php include 'script_include.php'; ?>
<?php
/*}
else echo "<h1>No User Logged In</h1>";*/
?>
