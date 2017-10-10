
<script>
function searchTable() {
    var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                found = true;
            }
        }
        if (found) {
            tr[i].style.display = "";
            found = false;
        } else {
            tr[i].style.display = "none";
        }
    }
}
</script>

<script language="JavaScript">
<!--
function calculateBmi() {
var Weight_latest = document.bmiForm.Weight_latest.value
var height_latest = document.bmiForm.height_latest.value
if(Weight_latest > 0 && height_latest > 0){	
var finalBmi = Weight_latest/(height_latest/100*height_latest/100)
document.bmiForm.bmi.value = finalBmi
if(finalBmi < 18.5){
document.bmiForm.meaning.value = "That you are too thin."
}
if(finalBmi > 18.5 && finalBmi < 25){
document.bmiForm.meaning.value = "That you are healthy."
}
if(finalBmi > 25){
document.bmiForm.meaning.value = "That you have overweight."
}
}
else{
alert("Please Fill in everything correctly")
}
}
//-->
</script>