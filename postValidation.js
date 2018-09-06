
function like(){

		var postId = document.getElementById('idPost').value;
		var userId = document.getElementById('idUser').value;
        
        
		

                $.post("index.php?controller=posts&action=like&response=json",
                    {post: postId, user: userId}
                    ,function (response) {
                     response = JSON.parse(response);

                        if(response[0] == "Yes" ){ 

                            document.getElementById('like').innerHTML="Liked";
                            document.getElementById('likeNo').innerHTML=response[2];


                        }
                        else {
                            document.getElementById('like').innerHTML="Like";
                            document.getElementById('likeNo').innerHTML=response[2];
                        }



                });
}
        



function favorite(){

        var postId = document.getElementById('idPost').value;
        var userId = document.getElementById('idUser').value;
            

                $.post("index.php?controller=posts&action=favorite&response=json",
                    {post: postId, user: userId}
                    ,function (response) {
                           response = JSON.parse(response);
                           response[0] = response[0].trim();
                        if(response[0] == "Yes" ){ 

                            document.getElementById('favorite').innerHTML="Favorited";

                        }
                        else{
                            document.getElementById('favorite').innerHTML="Favorite";
                        }



                });

}
    
function readComments(){

        var postId = document.getElementById('idPost').value;
      
            

                $.post("index.php?controller=posts&action=showComments&response=json",
                    {post: postId}
                    ,function (response) {
                        response = JSON.parse(response);

                        var html = '';
                        for(var i = 0; i < response.length; i++){
                            html += '<span>'+response[i].name+' : '+response[i].content+'<br />'+'</span>'
                        }
                        



                        if(response != '' ){ 

                            document.getElementById('komente').innerHTML=html;

                        }
                        else{
                            document.getElementById('favorite');
                        }



                });

}


function comment(){

        var postId = document.getElementById('idPost').value;
        var userId = document.getElementById('idUser').value;
        var content = document.getElementById('content').value;
        
        
        

                $.post("index.php?controller=posts&action=comment&response=json",
                    {post: postId, user: userId, content:content}
                    ,function (response) {

                     response = response.trim();
                        if(response == "Yes" ){ 
                            document.getElementById('content').value=" ";
                            $("#lexo").click();
                            $("#comment").click();
                            $("#lexo").hide();
                        }
                       



                });
}


function vaccine(){

        var age = document.getElementById('age').value;
        var pet_id = document.getElementById('pet_id').value;
        
                $.post("index.php?controller=pet&action=showVaccine&response=json",
                    {age: age, pet_id: pet_id}
                    ,function (response) {
                     response = JSON.parse(response);

                        if(response[0] == "Yes" ){ 

                           
                            document.getElementById('description').innerHTML=response[2] + '<br />' + response[3];
                             $(".animalVaccine").hide();

                        } 
                        else{

                            document.getElementById('description').innerHTML="Miku juaj eshte regjistruar per kete vaksine";
                             $(".animalVaccine").hide();

                    }



                });
                        
}