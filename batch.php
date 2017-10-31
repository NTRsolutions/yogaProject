<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>
<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://yoga.classguru.in/view_batch_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$batch = json_decode($content);
$batch_view = $batch->batch_view;
//print_r($content);
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
    .dropdown-menu_1 {
  position: relative;
}
    
    #drop_style{
      min-width: 50px!important; 
    }
  
    .dropdown-toggle_1 {
       float:left;
       margin-top:20px;
}
</style>

<?php $page=6;include 'sidebar.php'; ?>
<?php $nav=5;include 'nav.php'; ?>
<div class="content">
<!--card for add batch,add trainer,view trainer-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Batch<p>
                    </div>  
                    <div class="card-footer">
                        <div class="stats">
                            <a href="add_batch.php">
                                <i class="material-icons">plus_one</i> Add New batch
                            </a>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="card-content">
                        <p class="category">View Trainer<p>
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
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Add Trainer<p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="add_trainer.php">
                                <i class="material-icons">plus_one</i> Add New Trainer
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
<!--tabluer form of batches information-->
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header" data-background-color="purple">
                        <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search..">
                        <i class="material-icons icon">search</i> 
                        <h4 class="title">Batch Details</h4>
                    </div>
                </div>
                <div class="card-content table-responsive">
                    <table id="inlist" class="table table-hover table-striped">
                        <thead class="text-primary">
                            <th>Sr no.</th>
                            <th>Batch id</th>
                            <th>Name</th>
                            <th>Timings</th>
                            <th>Trainer Name</th>
                        </thead>
                    <tbody id="myTable"><?php $i=1;foreach($batch_view as $value): ?>
                        <tr>
                            <td><?php echo $i; $i++; ?></td><?php  $id = $value->batch_id; ?>
                            <td><a href="batch_detail.php?batch_id=<?php echo $id;?>&batch_name=<?php echo $value->batch_name; ?>"><?php echo $id; ?></a></td>
                            <td><a href="batch_detail.php?batch_id=<?php echo $id;?>&batch_name=<?php echo $value->batch_name; ?>"><?php echo $value->batch_name; ?></a></td>
                            <td><?php echo $value->batch_timing; ?></td>
                            <td><?php echo $value->e_name; ?></td>
                                <!--<td style="width:20px!important;"><a    href="edit_batch.php" class="btn btn-sm btn-warning">Edit</a></td>
-->
<!--satrt of user access control to edit button-->
                              <?php if((($_SESSION['permission']== 'admin' ||'superadmin') || ($_SESSION['permission']== 'operator'))&&($_SESSION['permission'] != 'user' )){?> 
                            <form action="edit_batch.php" method="POST">
                                <td style="width:20px!important;">
                                    <input value="<?php echo $value->batch_id;?>" type="hidden" name="batch_id">
                                   <input style="width:50px; height:28px;" src="assets/img/edit.png" class="btn btn-xs btn-warning" type="image" alt="submit" value="">
                                </td>
                            </form><?php }?>
<!--satrt of user access control to delete button-->
                            <td>  <?php  if(($_SESSION['permission'] == 'admin' || 'superadmin' )&&(($_SESSION['permission']!='operator')&&($_SESSION['permission']!= 'user'))){?>     
                                <div class="dropdown">
                                    
                                    <button  class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle_1" type="button" data-toggle="dropdown">
                                        <i class="material-icons">delete</i>
                                        <span class="caret"></span></button>
                                  <ul class="dropdown-menu dropdown-menu_1" id="drop_style">
                                        <li><a tabindex="-1" href="delete_batch_api.php/?b_id=<?= $id?>">Yes </a></li>
                                        <li><a tabindex="-1" href="#">No</a></li>
                                    </ul>
                                </div><?php }?>
                            </td>                                       
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$('.dropdown-toggle_1').click(function() {
  dropDownFixPosition($('button'), $('.dropdown-menu_1'));
});

function dropDownFixPosition(button, dropdown) {
  var dropDownTop = button.offset().top + button.outerHeight();
  dropdown.css('top', dropDownTop + "px");
  dropdown.css('right', button.offset().right + "px");
}

</script>
<?php include 'footer.php'; ?>
<?php include 'tablesearch_script.php'; ?>
<?php include 'script_include.php'; ?>
<?php
}
header('Location: index.php');
//else echo "<h1>No User Logged In</h1>";
?>
