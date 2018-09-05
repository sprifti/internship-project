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
					$mail->Body    = "Please click on the link below to confirm your email <a href='http://localhost/project/work/index.php?controller=user&action=confirmEmail&email=$email&confirm_code=$created'  >Click here</a>";

					$mail->send();
					echo 'Message has been sent';
					header('location: view/pages/confirm.php');
					exit();

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
					$mail->Body    = "Faleminderit qe u regjistruat. Meqenese ju zgjodhet opsionin profesional, na duhen kredencialet tuaja per verifikim autorizimi. Vetem pasi te na i dergoni mund tju lejojme akses ne accountin tuaj";

					$mail->send();
					echo 'Message has been sent';
					header('location: view/pages/confirm.php');
					exit();

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
					$mail->Body    = "Please click on the link below to confirm your email <a href='http://localhost/project/work/index.php?controller=user&action=confirmEmail&email=$email&confirm_code=$created'  >Click here</a>";

					$mail->send();
					echo 'Message has been sent';
					header('location: view/pages/confirm.php');
					exit();

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

					if($found['confirm'] == '1')

					{	
						

						
							$_SESSION["id"]=$found["id"];
							Header('location: index.php?controller=user&action=welcome');

							if(isset($_POST["remember"]))
							{	 
								
								setcookie("id", $found["id"], time() + (86400 * 356));
								// setcookie("password", $_POST["password"], time() + (86400 * 356) );

								// setcookie("email", $_POST["email"], time() -3600);
								// setcookie("password", $_POST["password"], time()-3600);

							}

				
					}	else   header('location: index.php?controller=user&action=confirm');


				   
				}

			
		}

		public function welcome() {

			require_once('view/user/welcome.php');

		} 
		public function artikuj() {

			require_once('view/pages/artikuj.php');

		} 
		public function kontakte() {

			require_once('view/pages/kontakte.php');


		} 



		public function confirm(){
			/*echo "<script> alert('Ju lutem konfirmoni te dhenat tuaja! ');</script>"; */
			
			$_SESSION["errors"] = "Wrong password!";
			Header('location: index.php?controller=user&action=showLogin');
		}




		public function logout(){
			setcookie("id", $_COOKIE["id"],time() - 3600);
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

		



		public function confirmEmail(){

			$email=$_GET["email"];
			$confirm_code=$_GET["confirm_code"];

			$confirmed = User::confirmation($email, $confirm_code);
			if($confirmed == true){

				header('location: index.php?controller=user&action=showLogin');
			} 
			else header('location: index.php?controller=pages&action=error');

		}

		public function profile(){
			 if(!isset($_SESSION["id"])){  
         
          header('location: index.php?controller=user&action=showLogin');
          exit();
        }
			require_once('view/pages/profile.php');
		}



		public function sendMailPassword(){

			if(isset($_POST["email"])){
				$email = $_POST["email"];
			} 


			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				header('location: index.php?controller=user&action=showResetPassword');
			}	
			else
			{
				$token = User::updateToken($email);

				if($token != '')
				{

			

					$_SESSION["email"] = $email;

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
						$mail->Subject = 'Forgot password';

						$mail->Body    = "Hello there! Click here to be able to change your password <a href='http://localhost/project/work/index.php?controller=user&action=showChangePassword&token=$token'  >Click here</a>";



						$mail->send();
						echo 'Message has been sent';
						header('location: view/pages/resetMessage.php');
						exit();

					}

					catch (Exception $e) {
						echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
					}

				}

		}

	}



		public function resetPassword(){

		
			if(isset($_POST["token"])){
				$token = $_POST["token"];
			}
			
			if(isset($_POST["password"])){
				$_SESSION["password"] = $password = $_POST["password"];
			}

			if(isset($_POST["password1"])){
				$_SESSION["password1"] = $password1 = $_POST["password1"];
			}

			if($password != $password1) {

				$_SESSION["error"] = "The passwords don't match";
				header('location: index.php?controller=user&action=showChangePassword');			
			}
			else {

				$_SESSION["error"] = "";

				$reset = User::reset($password,$token);

				if($reset == true){
					echo "Yes";	
					
				}

			}

		}

		public function info(){
			require_once('view/pages/info.php');
		}


		public function showResetPassword(){
			require_once('view/user/resetPassword.php');
		}


		public function showChangePassword(){

			require_once('view/user/changePassword.php');
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

			public function subscribeWhenRegister()
		{
			$id = $_SESSION['id'];

			$db = Db::getInstance();
			$result = $db->prepare("SELECT email, name FROM user WHERE id = ?");
			$result->execute(array($id));
			$user = $result->fetch();

			$email = $user['email'];
			$name = $user['name'];
				
			
			$created = User::createSubscribeUser($name, $email);

			if($created == true){	

				header('location: index.php?controller=user&action=welcome');
			}

		} 


		public function subscribed(){

			$db = Db::getInstance();

			$id = $_SESSION["id"];
			$result = $db->prepare("SELECT email FROM subscribe WHERE id = ?");
			$result->execute(array($id));
			$user = $result->fetch();

			if($user["email"] != ''){
				return true;
			} 
			else {
				return false;
			}
		}

		public function deleteSubscribe(){

			$db = Db::getInstance();
			$id = $_SESSION['id'];

			$result = $db->prepare("SELECT email FROM user WHERE id = ?");
			$result->execute(array($id));
			$user = $result->fetch();

			$email = $user["email"];

			$db = Db::getInstance();
			$result = $db->prepare("DELETE FROM subscribe WHERE email = ?");
			$result->execute(array($email));
			header('location: index.php?controller=user&action=welcome');

		}

	}


	?>