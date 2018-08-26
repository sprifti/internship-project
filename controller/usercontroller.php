<?php 
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;




class UserController{	


	public function signup(){

		if (isset($_POST["username"]))
		{
			$name = $_POST["username"];
		}




		if (isset($_POST["email"]))
		{
			$email = $_POST["email"];

		} 



		if (isset($_POST["password"]))
		{
			$password= $_POST["password"];

		}

		if( User::exists($email) == true || $name == '' ||  $email == '' || $password == '' || !filter_var($email, FILTER_VALIDATE_EMAIL)  ){
			Header('location: index.php?controller=user&action=showNormalUser');
		}
		else {

			$created = User::createNormalUser($name,$email,$password);
			if($created){
				
				$mail = new PHPMailer(true);                              
				try {
			    //Server settings
					$mail->SMTPDebug = 0;                                 
					$mail->isSMTP();                                      
					$mail->Host = 'smtp.gmail.com';  
					$mail->SMTPAuth = true;                               
					$mail->Username = 'petprojecttaleas@gmail.com';                
					$mail->Password = 'Serena1234';                           
					$mail->SMTPSecure = 'tls';                            
					$mail->Port = 587;                                    


					$mail->setFrom('petprojecttaleas@gmail.com', '4 Paw Friends');
					$mail->addAddress($email);    


					$mail->isHTML(true);                                  
					$mail->Subject = 'Confirmation email';
					$mail->Body    = "Please click on the link below to confirm your email <a href='http://localhost/taleas/index.php?controller=user&action=confirmEmail&email=$email&confirm_code=$created'  >Click here</a>";

					$mail->send();
					echo 'Message has been sent';
header('location: index.php?controller=user&action=login');					exit();

				}

				catch (Exception $e) {
					echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
				}

			}
		}

	}


	public function signupStore(){

		if (isset($_POST["fname"]))
		{
			$fname = $_POST["fname"];
		}



		if (isset($_POST["lname"]))
		{
			$lname = $_POST["lname"];
		}


		if (isset($_POST["username"]))
		{
			$username = $_POST["username"];
		}


		if (isset($_POST["phone"]))
		{
			$phone = $_POST["phone"];
		}


		if (isset($_POST["location"]))
		{
			$location = $_POST["location"];
		}


		if (isset($_POST["email"]))
		{
			$email = $_POST["email"];

		} 



		if (isset($_POST["password"]))
		{
			$password= $_POST["password"];

		}

		if(User::exists($email) == true || $fname == '' ||  $email == '' || $password == '' || $lname == '' || $username == '' || $location == '' || !filter_var($email, FILTER_VALIDATE_EMAIL)  ){
			Header('location: index.php?controller=user&action=showStoreUser');
		}

		else {
			$created = User::createStoreUser($fname,$lname,$username,$phone,$location,$email,$password);
			if($created){
				$mail = new PHPMailer(true);                              
				try {
						    //Server settings
					$mail->SMTPDebug = 0;                                 
					$mail->isSMTP();                                      
					$mail->Host = 'smtp.gmail.com';  
					$mail->SMTPAuth = true;                               
					$mail->Username = 'petprojecttaleas@gmail.com';                
					$mail->Password = 'Serena1234';                           
					$mail->SMTPSecure = 'tls';                            
					$mail->Port = 587;                                    


					$mail->setFrom('petprojecttaleas@gmail.com', '4 Paw Friends');
					$mail->addAddress($email);    


					$mail->isHTML(true);                                  
					$mail->Subject = 'Confirmation email';
					$mail->Body    = "Please click on the link below to confirm your email <a href='http://localhost/taleas/index.php?controller=user&action=confirmEmail&email=$email&confirm_code=$created'  >Click here</a>";

					$mail->send();
					echo 'Message has been sent';
header('location: index.php?controller=user&action=login');					exit();

				}

				catch (Exception $e) {
					echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
				}

			}

		}
	}

	public function signupVet(){

		if (isset($_POST["fname"]))
		{
			$fname = $_POST["fname"];
		}



		if (isset($_POST["lname"]))
		{
			$lname = $_POST["lname"];
		}


		if (isset($_POST["username"]))
		{
			$username = $_POST["username"];
		}


		if (isset($_POST["phone"]))
		{
			$phone = $_POST["phone"];
		}


		if (isset($_POST["location"]))
		{
			$location = $_POST["location"];
		}


		if (isset($_POST["email"]))
		{
			$email = $_POST["email"];

		} 


		if (isset($_POST["password"]))
		{
			$password= $_POST["password"];

		}

		if( User::exists($email) == true || $fname == '' ||  $email == '' || $password == '' || $lname == '' || $username == '' || $location == '' || !filter_var($email, FILTER_VALIDATE_EMAIL)  ){
			Header('location: index.php?controller=user&action=showStoreUser');
		}
		else {
			$created = User::createVetUser($fname,$lname,$username,$phone,$location,$email,$password);
			if($created==true){
				$mail = new PHPMailer(true);                              
				try {
				    //Server settings
					$mail->SMTPDebug = 0;                                 
					$mail->isSMTP();                                      
					$mail->Host = 'smtp.gmail.com';  
					$mail->SMTPAuth = true;                               
					$mail->Username = 'petprojecttaleas@gmail.com';                
					$mail->Password = 'Serena1234';                           
					$mail->SMTPSecure = 'tls';                            
					$mail->Port = 587;                                    


					$mail->setFrom('petprojecttaleas@gmail.com', '4 Paw Friends');
					$mail->addAddress($email);    


					$mail->isHTML(true);                                  
					$mail->Subject = 'Confirmation email';
					$mail->Body    = "Please click on the link below to confirm your email <a href='http://localhost/taleas/index.php?controller=user&action=confirmEmail&email=$email&confirm_code=$created'  >Click here</a>";

					$mail->send();
					echo 'Message has been sent';
header('location: index.php?controller=user&action=login');					exit();

				}

				catch (Exception $e) {
					echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
				}
			}
		}

	}





	public function login()
	{

		if (isset($_POST["email"]))
		{
			$email = $_POST["email"];
		} 



		if (isset($_POST["password"]))
		{
			$password= $_POST["password"];

		}

		if ($_POST["password"] == '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || $_POST["email"] == '' ){

			Header('location: index.php?controller=user&action=showLogin');
		}

		else{

			$found = User::findUser($email,$password);

			if($found == '1')

			{
				$db = Db::getInstance();

				$result = $db->prepare("SELECT id FROM user WHERE email = ?");
				$result->execute([$email]);
				$user = $result->fetch();

				
				
				if($user != ''){
					$_SESSION["id"]=$user["id"];
					Header('location: index.php?controller=user&action=welcome');
				}

				
				else   header('location: index.php?controller=user&action=login');


			}

		}
}
		public function welcome() {

			require_once('view/user/welcome.php');

		} 







		public function logout(){

			session_destroy();
			header('Location: index.php?controller=user&action=showLogin');
		}



		public function showNormalUser(){	 if(isset($_SESSION["id"])){  
         
          header('location: index.php?controller=user&action=welcome');
          exit();
        }
			require_once('view/user/signup.php');
		}



		public function showLogin(){
			if(isset($_SESSION["id"])){  
         
          header('location: index.php?controller=user&action=welcome');
          exit();
        }
			require_once('view/user/login.php');

		}

		public function showVet(){
			if(isset($_SESSION["id"])){  
         
          header('location: index.php?controller=user&action=welcome');
          exit();
        }
			require_once('view/user/signupVet.php');
		}

		public function showStore(){
			if(isset($_SESSION["id"])){  
         
          header('location: index.php?controller=user&action=welcome');
          exit();
        }
			require_once('view/user/signupStore.php');
		}

		public function home(){
			if(isset($_SESSION["id"])){  
         
          header('location: index.php?controller=user&action=welcome');
          exit();
        }
			require_once('view/user/home.php');
		}

		



		

		public function subscribe(){

			if(isset($_POST["name"])){
				$name = $_POST["name"];
			}

			if(isset($_POST["email"])){
				$email = $_POST["email"];
			}

			if($name == '' || $email == '' || !filter_var($email, FILTER_VALIDATE_EMAIL) ){
				header('location: index.php?controller=user&action=home');
			}

			$created = User::createSubscribeUser($name,$email);

			if($created == true){
				header('location: index.php?controller=pages&action=subscribeMessage');
			}


		}




	}


	?>