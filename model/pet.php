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


	}



 ?>