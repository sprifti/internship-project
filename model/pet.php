<?php


	class Pet
	{

			public function createPet($name,$info,$breed,$id_animal,$owner)
			{

			$db = Db::getInstance();

			$result = $db->prepare("INSERT INTO pet(name,info,breed,id_animal,owner) VALUES (:name, :info,:breed,:id_animal,:owner)");

				
			$result->execute(array('name' => $name, 'info' => $info , 'breed' => $breed , 'id_animal'=>$id_animal, 'owner'=>$owner));
			
			

			return true;

		    }

		    public function findVaccine($pet_id,$age){
		    		$db = Db::getInstance();

		    	if($age == "zero"){
		    		  $age = 0;	

		    		  

		    		  $result = $db->prepare("SELECT id FROM vaccine WHERE month = ?");
		              $result->execute([$age]);
		              $user = $result->fetch();

		              $vaccine_id = $user["id"];

		              $result = $db->prepare("SELECT vaccine_id FROM pet_vaccine WHERE pet_id = ?");
		              $result->execute([$pet_id]);
		              $user = $result->fetch();

		              if($user["vaccine_id"] == $vaccine_id){
		              	return  $response = array("No","false");
              		  
		              }

		    		  $result = $db->prepare("INSERT INTO pet_vaccine(pet_id,vaccine_id) VALUES (:pet_id,:vaccine_id)");
              		  $result->execute(array(':pet_id' => $pet_id, ':vaccine_id' => $vaccine_id ));

              		  $result = $db->prepare("SELECT vaccine,description FROM vaccine WHERE id = ?");
		              $result->execute([$vaccine_id]);
		              $user = $result->fetch();
		              return  $response = array("Yes","true",$user["vaccine"],$user["description"] );
              		  

		    	}

		    	if($age == "three"){
		    		  $age = 3;
		    		  $result = $db->prepare("SELECT id FROM vaccine WHERE month = ?");
		              $result->execute([$age]);
		              $user = $result->fetch();

		              $vaccine_id = $user["id"];

		              $result = $db->prepare("SELECT vaccine_id FROM pet_vaccine WHERE pet_id = ?");
		              $result->execute([$pet_id]);
		              $user = $result->fetch();

		              if($user["vaccine_id"] == $vaccine_id){
		              	return  $response = array("No","false");
              		  
		              }
		    		  $result = $db->prepare("INSERT INTO pet_vaccine(pet_id,vaccine_id) VALUES (:pet_id,:vaccine_id)");
              		  $result->execute(array(':pet_id' => $pet_id, ':vaccine_id' => $vaccine_id ));

              		  $result = $db->prepare("SELECT vaccine,description FROM vaccine WHERE id = ?");
		              $result->execute([$vaccine_id]);
		              $user = $result->fetch();
		              return  $response = array("Yes","true",$user["vaccine"],$user["description"] );
              		  
		    	}

		    	if($age == "six"){
		    		  $age = 6;
		    		  $result = $db->prepare("SELECT id FROM vaccine WHERE month = ?");
		              $result->execute([$age]);
		              $user = $result->fetch();

		              $vaccine_id = $user["id"];

		              $result = $db->prepare("SELECT vaccine_id FROM pet_vaccine WHERE pet_id = ?");
		              $result->execute([$pet_id]);
		              $user = $result->fetch();

		              if($user["vaccine_id"] == $vaccine_id){
		              	return  $response = array("No","false");
              		  
		              }

		    		  $result = $db->prepare("INSERT INTO pet_vaccine(pet_id,vaccine_id) VALUES (:pet_id,:vaccine_id)");
              		  $result->execute(array(':pet_id' => $pet_id, ':vaccine_id' => $vaccine_id ));

              		  $result = $db->prepare("SELECT vaccine,description FROM vaccine WHERE id = ?");
		              $result->execute([$vaccine_id]);
		              $user = $result->fetch();
		              return  $response = array("Yes","true",$user["vaccine"],$user["description"] );
              		  return $response;
		    	}

		    	if($age == "nine"){
		    		  $age = 9;
		    		  $result = $db->prepare("SELECT id FROM vaccine WHERE month = ?");
		              $result->execute([$age]);
		              $user = $result->fetch();

		              $vaccine_id = $user["id"];

		              $result = $db->prepare("SELECT vaccine_id FROM pet_vaccine WHERE pet_id = ?");
		              $result->execute([$pet_id]);
		              $user = $result->fetch();

		              if($user["vaccine_id"] == $vaccine_id){
		              	return  $response = array("No","false");
              		  
		              }

		    		  $result = $db->prepare("INSERT INTO pet_vaccine(pet_id,vaccine_id) VALUES (:pet_id,:vaccine_id)");
              		  $result->execute(array(':pet_id' => $pet_id, ':vaccine_id' => $vaccine_id ));

              		  $result = $db->prepare("SELECT vaccine,description FROM vaccine WHERE id = ?");
		              $result->execute([$vaccine_id]);
		              $user = $result->fetch();
		              return  $response = array("Yes","true",$user["vaccine"],$user["description"] );
              		  
		    	}



		    }


	}



 ?>