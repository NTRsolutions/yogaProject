<script>
    function allLatters(c_name, e)  
    {  
       
        var letters = /^[A-Za-z ]+$/;  
        if(c_name.value.match(letters))  
        {  
            return true;  
        }
        else if(e.keyCode===9){
            return true;
        }
        else  
        {  
            alert("Enter only alphabets");
            $(".validName").val('');
            return false;  
        }  
    }  
    function Latters(c_surname, e)  
    { debugger;
        var letters = /^[A-Za-z ]+$/;  
        if(c_surname.value.match(letters))  
        {  
            return true;  
        }
        else if(e.keyCode===9){
            return true;
        }
        else  
        {  
            alert("Enter only alphabets");
            $(".validSurname").val('');
            return false;  
        }  
    }  
    function allnumeric(c_fees, e)  
    {   debugger;
        var numbers = /^[0-9]+$/; 
        if(c_fees.value.match(numbers))  
        {  
            return true;  
        }
       else if(e.keyCode===9){
           return true;
        } 
        else  
        {  
            alert("Enter only Digits");
            $(".validnumber").val('');
            return false;  
        }  
    }  
    
    function allnumerics(c_recieved, e)  
    {   debugger;
        var numbers = /^[0-9]+$/; 
        if(c_recieved.value.match(numbers))  
        {  
            return true;  
        }
       else if(e.keyCode===9){
           return true;
        } 
        else  
        {  
            alert("Enter only Digits");
            $(".validnumbers").val('');
            return false;  
        }  
    }  
    
    function phoneno(){          
        $('#phone').keypress(function(e) {
            var a = [];
            var k = e.which;
            for (i = 48; i < 58; i++)
                a.push(i);
            if (!(a.indexOf(k)>=0))
                e.preventDefault();
            });
    }
    
    /* validation for employee*/
    function allLatters(e_name, e)  
    {  
       
        var letters = /^[A-Za-z ]+$/;  
        if(e_name.value.match(letters))  
        {  
            return true;  
        }
        else if(e.keyCode===9){
            return true;
        }
        else  
        {  
            alert("Enter only alphabets");
            $(".validName").val('');
            return false;  
        }  
    } 
    function Latters(e_surname, e)  
    { debugger;
        var letters = /^[A-Za-z ]+$/;  
        if(e_surname.value.match(letters))  
        {  
            return true;  
        }
        else if(e.keyCode===9){
            return true;
        }
        else  
        {  
            alert("Enter only alphabets");
            $(".validSurname").val('');
            return false;  
        }  
    } 
    
    
     function calc_balance() {

            var first_number = parseInt(document.getElementById("Text1").value);
            var second_number = parseInt(document.getElementById("Text2").value);
            var result = first_number - second_number;

            document.getElementById("txtresult").value = result;
        }
    
    
        

    
</script>
