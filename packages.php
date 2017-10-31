<?php
// Start the session
session_start();
if(!empty($_SESSION)){
?>
<?php  
# Create a connection
$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, 'http://yoga.classguru.in/view_packages_api.php');
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
# Get the response
$content = curl_exec($ch);
$packages = json_decode($content);
$packages_view = $packages->packages_view;
   // print_r($packages_view);
   
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
    //print_r($batch_view);
   
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

<?php $page=8;include 'sidebar.php'; ?>
<?php $nav=8;include 'nav.php'; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">local_offer</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Packages<p>
                    </div>  
                    <div class="card-footer">
                        <div class="stats">
                            <a href="add_packages.php">
                                <i class="material-icons">plus_one</i> Add New Packages
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
        </div>
            <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header" data-background-color="purple">
                        <input type="text" class="form-control" id="myInput" onkeyup="searchTable()" placeholder="Search..">
                        <i class="material-icons icon">search</i> 
                        <h4 class="title">Packages Details</h4>
                    </div>
                </div>
               
                <div class="card-content table-responsive">
                    <table id="inlist" class="table table-hover table-striped">
                        <thead class="text-primary">
                            <th>Sr No</th>
                            <!--<th>Catogary No</th>-->
                            <th>category</th>
                            <th>Name of plan </th>
                            <th>Active </th>
                            <th>Time unit</th>
                            <th> batch id</th>
                           <!-- <th>Description</th>-->
                        </thead>
                        <tbody id="myTable"><?php $i=1;foreach($packages_view as $value): ?><?php foreach($batch_view as $value1 ): if ($value->batch == $value1->batch_id){ ?>
                            <tr>
                                <td><?php echo $i; $i++; ?></td>
                              <!--  <td><?php echo $value->Cat_ID; ?></td>-->
                                <!--<td><a href='view_packages_profile.php?Cat_ID=<?php echo $cat_id;?>'><?php echo $cat_id = $value->Cat_ID; ?></a></td>-->
                                <td><a href='view_packages_profile.php?Cat_ID=<?php echo $cat_id;?>'><?php echo $cat_id = $value->Catogary; ?></a></td>
                                <!--<td><?php echo $cat_id = $value->Cat_ID; ?></td>
                                <td><?php echo $value->Catogary; ?></td>-->
                                <td><?php echo $value->Name_of_plan; ?></td>
                                <td><?php echo $value->Active; ?></td>
                                <td><?php echo $value->Time_unit; ?></td> 
                                <td><?php  echo $value1->batch_name;  ?></td>
                                <!--<td><?php echo $value->Description; ?></td>-->
                                            
                   <form action="edit_packages.php" method="POST">
                        <td style="width:20px!important;">
<!--user access control for edit button-->                            
                            <?php if((($_SESSION['permission']== 'admin' ||'superadmin') || ($_SESSION['permission']== 'operator'))&&($_SESSION['permission'] != 'user' )){?>
                                <input value="<?php echo $value->Cat_ID;?>" type="hidden" name="Cat_ID">
                               <input style="width:50px; height:28px;" src="assets/img/edit.png" class="btn btn-xs btn-warning" type="image" alt="submit" value=""><?php }?>
                        </td>
                  </form>
<!--user access control for delete button-->                                
                        <?php  if(($_SESSION['permission'] == 'admin' || 'superadmin' )&&(($_SESSION['permission']!='operator')&&($_SESSION['permission']!= 'user'))){?> 
                        <td>      
                            <div class="dropdown">
                             <button  class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle_1" type="button" data-toggle="dropdown">
                                    <i class="material-icons">delete</i>
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-menu_1" id="drop_style">
                                    <li><a tabindex="-1" href='delete_packages_api.php?Cat_ID=<?php echo $cat_id;?>'>Yes</a></li>
                                    <li><a tabindex="-1" href="#">No</a></li>
                                </ul>
                            </div>
                        </td>  <?php } ?>                               
                        </tr>
                            <?php } endforeach; ?><?php endforeach; ?>
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
else {header('Location: index.php');}//echo "<h1>No User Logged In</h1>";
?>
