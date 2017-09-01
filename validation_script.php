<script>
    function allLatters(c_name)  
    {  
        var letters = /^[A-Za-z ]+$/;  
        if(c_name.value.match(letters))  
        {  
            return true;  
        }
        else if(c_name.which!=9){
            return true;
        }
        else  
        {  
            alert("Enter only alphabets");
            $(".validName").val('');
            return false;  
        }  
    }  
    function Latters(c_surname)  
    {  
        var letters = /^[A-Za-z ]+$/;  
        if(c_surname.value.match(letters))  
        {  
            return true;  
        }
        else if(c_surname.which!=9){
            return true;
        }
        else  
        {  
            alert("Enter only alphabets");
            $(".validSurname").val('');
            return false;  
        }  
    }  
    function allnumeric(c_fees)  
    {  
        var numbers = /^[0-9]+$/; 
        if(c_fees.value.match(numbers))  
        {  
            return true;  
        }
        else if(c_fees.which!=9){
            return true;
        } 
        else  
        {  
            alert("Enter only Digits");
            $(".validnumber").val('');
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
</script>
