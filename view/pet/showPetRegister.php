<!-- <!DOCTYPE html>
<html lang="en">
<head>  -->
	
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="view/user/main.css">

	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	
	<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

	<title>Register your pet</title>
</head>
<body>
	<div class="container">
		<div class="row main">
			<div class="panel-heading">
				<div class="panel-title text-center">
					<h1 class="title">4 Paw Friends</h1>
					<hr />
				</div>
			</div> 
			<div class="main-login main-center">
				<form id="mainForm" class="form-horizontal" method="post" action="index.php?controller=pet&action=signupPet" enctype="multipart/form-data"  required>

					<div class="form-group">
						<label for="fname" class="cols-sm-2 control-label">Une kam nje </label>
						<select name="type">
							<?php 
								print_r($pets);
								foreach ($pets as $key => $pet) {	echo $key . "    " . $pet;?>

									<option value="<?php echo $pets[$key]['id'] ?>"><?php echo $pets[$key]['animal'] ?></option>
								<?php }
							?>
						    
						</select>
					</div>
					
					<div class="form-group">
						<label for="name" class="cols-sm-2 control-label">Emri</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
								<input  type="text" class="form-control" name="name" id="name"  placeholder="Emri" required onfocusout="nameValidation()"/>
								
							</div><span id="nameError"></span>
						</div>
					</div>

					

					<div class="form-group">
						<label for="breed" class="cols-sm-2 control-label">Rraca</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
								<input  type="text" class="form-control" name="breed" id="breed"  placeholder="Rraca" />
								
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="info" class="cols-sm-2 control-label">Pershkrimi</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"></span>
								<textarea  rows="5" maxlength="250"  class="form-control" name="info" id="info"  placeholder="Pershkrimi" required onfocusout="infoValidation()"/></textarea>
							</div><span id="infoError"></span>
						</div>
					</div>
					

					<div class="form-group ">
						<button type="submit"  name="register" class="btn btn-primary btn-lg btn-block login-button">Regjistrohu</button>
					</div>
					
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="validationVet.js"></script>
</body>
</html>