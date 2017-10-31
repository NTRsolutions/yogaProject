<?php
if(isset($_POST['submit'])){
$sr_no=$_POST['sr_no'];
$e_id=$_POST['e_id'];
$e_name=$_POST['e_name'];
//$duration=$_POST['duration'];
$attendance=$_POST['attendance'];
$n = count($sr_no); 
    for($i=0;$i<$n;$i++){
        $data[] = 
        array("sr no" => $sr_no[$i], "ID no" => $e_id[$i], "Name" => $e_name[$i],/* "Duration" => $duration[$i],*/ "Attendance" => $attendance[$i]);
      
    }
    function filterData(&$str)
    {
       $str = preg_replace("/\t/", "\\t", $str);
       $str = preg_replace("/\r?\n/", "\\n", $str);
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
     
    }
  echo implode("\t", array_keys($data[0])) . "\n";
    foreach($data as $value){
        //print_r($value);echo "<br>";
     
    // file name for download
 $fileName = "codexworld_export_data" . date('Ymd') . ".xls";
    
    // headers for download
    header("Content-Disposition: attachment; filename=\"$fileName\"");
    header("Content-Type: application/vnd.ms-excel");
    
    $flag = false;
   /* foreach($value as $row) {*/
        if(!$flag) {
            // display column names as first row
          
            $flag = true;
        }
        // filter data
        array_walk($value, 'filterData');
        echo implode("\t", array_values($value)) . "\n";

    /*}*/
    }
}

    exit;
?>