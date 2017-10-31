<?php
/*starting of seesion*/ 
session_start();
if(!empty($_SESSION)){
if(($_SESSION['permission']!='operator') && ($_SESSION['permission']!='user')){
/*sesion for user access control*/
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
    #inlist{
        overflow: hidden;
        word-wrap:normal |break-word;
    }
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

<?php $page=9;include 'sidebar.php'; ?>
<?php $nav=9;include 'nav.php'; ?>

<?php 
include 'config.php';
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, "http://yoga.classguru.in/view_income_api.php");
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$date_view = json_decode($content);
$in_date = $date_view->in_date;
 //print_r($date_view);
?>  
<?php 
$sql="SELECT * FROM income ORDER BY in_ID DESC LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$name=$row['balance'];
//print_r($name);
?>

<div class="content">
    <div class="container-fluid">
       <div class="row">
           <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Income</h4>
                        <p class="category">Fill up the Required detail</p>
                    </div>
                    <div class="card-content">
                <form action="add_income_api.php" method="post">
<!--start form here-->                    
                    <div class="row">
                        <div class="col-md-1">
                            <div class="form-group label-floating">
                                <label class="control-label field_top">Sr No <span class="required color_style"> * </span></label>
                                <input type="text" class="form-control" name="sr_no" >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label field_top">Name <span class="required color_style"> * </span></label>
                                <input type="text" class="form-control" name="in_name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                             <div class="form-group label-floating">
                                <label class="control-label field_top">Bank Name<span class="required color_style"> * </span></label>
                                <input type="text" class="form-control" name="bank_name" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                             <div class="form-group label-floating">
                                <label class="control-label field_top">Cheque No <span class="required color_style"> * </span></label>
                                <input type="text" class="form-control" name="cheque_no" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-3">
                            <div class="form-group label-floating">
                                <label class="control-label field_top">Amount<span class="required color_style"> * </span></label>
                                <input type="text" class="form-control"         name="amount" required>
                            </div>
                        </div>                        
                        <div class="col-md-3">
                             <div class="form-group label-floating">
                                <label class="control-label field_top">Date<span class="required color_style"> * </span></label>
                                <input style="margin-top:0px;" type="date" class="form-control" name="date" required>
                            </div>
                        </div>
                        
                        
                        <div class="col-md-3">
                            <div > 
                                C/D :
                                <select style="width:180px; height:38px;" name="c_d" required>
                                <option >Select C/D </option>
                                <option name="c_d" value="credit">Credit</option>
                                <option name="c_d"                           value="debit" >Debit</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="col-md-3">
                             <div class="form-group label-floating">
                                <label class="control-label field_top">Balance<span class="required color_style"> * </span></label>
                                <input type="text" class="form-control"         name="balance" value="<?php print_r($name);?>" readonly >
                            </div>
                        </div>
                    </div>
                            
                            <button type="submit" class="btn btn-primary pull-right" name="submit">Add Income</button>
                            <div class="clearfix"></div>
                      
                        </form>
<!--end of form-->                
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
                        <h4 class="title">Account Details</h4>
                    </div>
                    <div class="card-content table-responsive">
                    <table id="inlist" class="table table-hover table-striped">
                            <thead class="text-primary">
                                <th>Sr no.</th>
                                <th>Client name</th>
                                <th>Bank Name</th>
                                <th>Cheque No</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Credit/Debit</th>
                                <th>Balance</th>
                            </thead>
                        <tbody id="myTable"><?php $i=1; foreach($in_date as $value ):{?>
                                <tr>
                                    <td><?php echo $i;$i++; ?></td>
                                    <td><?php echo $value->in_name; ?></td>
                                    <td><?php echo $value->bank_name;?></td>
                                    <td><?php echo $value->cheque_no;?></td> 
                                    <td><?php echo $value->amount; ?></td>
                                    <td><?php echo $value->date;?></td>
                                    <td><?php echo $value->c_d;?></td>
                                    <td><?php echo $value->balance;?></td>
                                </tr><?php } endforeach;?>
                            </tbody>
                        </table>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<?php include 'tablesearch_script.php'; ?>
<?php include 'script_include.php'; ?>
<?php
} else{
    
echo '<script language="javascript">';
echo 'alert("Access denied");window.location = "home.php" </script>';}
}
else {header('Location: index.php');}//echo "<h1>No User Logged In</h1>";
?>

