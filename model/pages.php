<?php 
	
	class Pages{


		public function getEmail(){

			$db = Db::getInstance();

			$id = $_SESSION["id"];

			$result = $db->prepare("SELECT email FROM user WHERE id = ?");
          	$result->execute([$id]);
          	$user = $result->fetch();
          	
          	return $user["email"];
		}

		public function searchPage(){

			if(isset($_GET["type"])){
				$type = $_GET["type"];
			}
			
			$type = strip_tags($type);

			$db = Db::getInstance();

			$result = $db->prepare("SELECT * FROM pet WHERE breed = ?");
          	$result->execute([$type]);
          	$user = $result->fetchAll();

          	return $user;

		}


	}


?>