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


	}


?>