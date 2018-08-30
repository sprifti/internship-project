<?php

require_once('model/connect.php');

if(isset($_POST["emailS"])){

	$email = $_POST["emailS"]; 

	$db = Db::getInstance();

	$result = $db->prepare("SELECT * FROM subscribe WHERE email = ?");
			$result->execute([$email]);
			$user = $result->fetch();


			
	if ($user["id"] >'0' ) {

   		echo "yes";
	}
	else { 
		echo "no";
		}

}
	


 ?>