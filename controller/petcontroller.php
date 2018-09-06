<?php
	
	class PetController{

		public function signupPet(){

		if (isset($_POST["type"]))
		{
			$type = $_POST["type"];
		}

		if (isset($_POST["name"]))
		{
			$name = $_POST["name"];
		}

		if (isset($_POST["info"]))
		{
			$info = $_POST["info"];
		}


		if (isset($_POST["breed"]))
		{
			$breed = $_POST["breed"];
		}	

		$info = strip_tags($info);

		if($name == '' || $info == '' || $type == '')
		{
			header('Location: index.php?controller=pet&action=showPetRegister');
		}

		$owner = $_SESSION["id"];
		
		$created = Pet::createPet($name,$info,$breed,$type,$owner);

		if($created == true)
		{
			header('Location: index.php?controller=pages&action=profile');
		}
		
	}


		public function showPetRegister()
		{
		
			if(!isset($_SESSION["id"]))
			{  
         
	          	header('location: index.php?controller=user&action=showLogin');
	          	exit();
	        }

	        $db = Db::getInstance();

	      	$result = $db->prepare("SELECT *  FROM animal_type");
	      	$result->execute();
			$pets = $result->fetchAll();
	        
			require_once('view/pet/showPetRegister.php');
		}


		public function showVaccine(){


			if(isset($_POST["pet_id"])){
				$pet_id = $_POST["pet_id"];
			}

			if(isset($_POST["age"])){
				$age = $_POST["age"];
			}
			
			$response = Pet::findVaccine($pet_id, $age);

			if($response[1] == true){
				$response = json_encode($response);
				echo $response;

			} 
			else{
				$response = json_encode($response);
				echo $response;
			}

		}

		
	}




?>