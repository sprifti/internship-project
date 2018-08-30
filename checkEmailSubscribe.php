
<?php 
	require_once('model/connect.php');
	$db = Db::getInstance();
	if(isset($_POST["id"])){
		$id = $_POST["id"];
	}
	$result = $db->prepare("SELECT email FROM user WHERE id = ?");
	$result->execute([$id]);
	$user = $result->fetch();

	$email = $user["email"];

	$result = $db->prepare("SELECT id FROM subscribe WHERE email = ?");
	$result->execute([$email]);
	$user = $result->fetch();

	$id = $user["id"];

	if($id != ''){
		echo 'Yes';
	}
	else {
		echo 'No';
	}










?>