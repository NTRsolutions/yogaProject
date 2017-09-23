<script>
function date() {
   var firstdate = document.getElementById("date1").value;
    var splitdate = firstdate.split("-");
    var day = splitdate[2];
    var month = splitdate[1];
    var year = splitdate[0];
    var time = document.getElementById("timeunit").value;
    if(time == 'Monthly'){
        
        if(month >= '12'){
            alert(month);
                month=1;
        }
        else {
            month++;
        }
        if(month<10){ 
            month = '0'+month ;
        }
    }
    else if(time == 'Quartely'){
        for(var i=1;i<4;i++){
            month++;
            if(month > '12'){
                month = 1;
            }
        }
        if(month<10){ 
            month = '0'+month ;
        }
    }
    else if(time == 'half_yearly'){
        for(var i=1;i<6;i++){
            month++;
            if(month > '12'){
                month = 1;
            }
            if(month<10){ 
                month = '0'+month ;
            }
        }
    }
    else year++;
    result = year +"-"+month+"-"+day;
    document.getElementById("resultDate").value = result;
}
</script>