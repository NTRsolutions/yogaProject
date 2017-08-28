<script>

    function allLatters(c_name)  
  {  
   var letters = /^[A-Za-z ]+$/;  
   if(c_name.value.match(letters))  
     {  
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
   else  
     {  
     alert("Enter only Digits");
          $(".validnumber").val('');
     return false;  
     }  
  }  
    
    
   function checkEmail() 
    {

    var email = $("#txtEmail");
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
    alert("Please provide a valid email address");
     $(".validEmail").val(" ");
    email.focus;
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
