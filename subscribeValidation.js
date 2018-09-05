$('#abonohu').click(function(){

  idValidation();
})


function idValidation()
{
    var id = document.getElementById('id').value;  
   
                $.ajax({
                
                    url: "checkEmailSubscribe.php",
                    method: "POST",
                    data: {id: id},
                    success: function (response) {
                        response = response.trim();
                        if(response == "No" ){ 

                               document.getElementById('idError').innerHTML=" Doni te merrni njoftime mbi kafshet e humbura si dhe eventet me te fundit qe do te zhvillohen per ju dhe miqte me 4 putra? ";
                               document.getElementById('idError').style.color='black';
                              
                              
                        } else{document.getElementById("yes").style.display = "none";
                            document.getElementById('idError').innerHTML="Ju jeni te abonouar!";
                             document.getElementById('idError').style.color='black';
                             

                        }

                    }

                });

 }
 
      function nameValidate()
      {
          var nameS = $("#nameS").val();

          if(nameS == ''){
                  document.getElementById('nameSError').innerHTML="* Name cannot be empty";
                  document.getElementById('nameSError').style.color='black';
                
          } else
          if(!nameS.match(/^[a-zA-Z]+[a-z A-Z]+$/g))
              {
                 
                  document.getElementById('nameSError').innerHTML="* Name can contain only letters";
                  document.getElementById('nameSError').style.color='black';
                  return false;
              }
          else {
              document.getElementById('nameSError').innerHTML=" ";
          }
          
      
        
    }



function emailValidate()
{
    var emailS = $("#emailS").val();

      
    if(emailS == ''){

            document.getElementById('emailSErrors').innerHTML="* Email cannot be empty ";      
            document.getElementById('emailSErrors').style.color='black';
            
    } 
        
            else
    if(!emailS.match(/^[a-zA-Z0-9._]+@[a-zA-Z0-9]+\.(com|org|in|gov|info|yahoo|live|)$/))
        {
            document.getElementById('emailSErrors').innerHTML="* Invalid Email! Your email needs to be like someone@email.com ";
            document.getElementById('emailSErrors').style.color='black';
            return false;
        }else{  
                $.ajax({
                
                    url: "checkSubscribe.php",
                    method: "POST",
                    data: {emailS: emailS},
                    success: function (response) {
                        response = response.trim();
                        if(response == "Yes" ){ 

                               document.getElementById('emailSErrors').innerHTML="* Email already exists in our database";
                               document.getElementById('emailSErrors').style.color='black';
                              
                        }else{
                               document.getElementById('emailSErrors').innerHTML="Valid";
                               document.getElementById('emailSErrors').style.color='black';
                               
                            
                        }

                    }

                });
              


        }

}
 


        



