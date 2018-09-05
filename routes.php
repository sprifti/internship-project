	<?php

	  function call($controller, $action) 

	{
	    
	    require_once('controller/' . $controller . 'controller.php');

	     switch($controller) 
	    {
	     	case 'pages':
	     	require_once('model/pages.php');
	        $controller = new PagesController();
	      	break;
	      
	        case 'posts':
	        require_once('model/post.php');
	        $controller = new PostsController();
	      	break;

	      	case 'user':
	      	require_once('model/user.php');
	      	$controller = new UserController;
	      	break;

	        case 'forum':
	        require_once('model/forum.php');
	        $controller = new ForumController;
	        break;

	        case 'pet':
	      	require_once('model/pet.php');
	      	$controller = new PetController;
	      	break;


	    
	    }

	     $controller->{ $action }();


	}



			 $controllers = array('posts' => ['index','show', 'addPost', 'showPost', 'indexh','showYourPost','like','delete','comment','favorite','showComments','unLike','myFavorite',],
			 					  'pages' => ['home', 'error','welcome','profile','subscribeMessage', 'search'],
								  'user' => ['signup','signupVet','signupStore','login','subscribe', 'logout', 'showNormalUser', 'welcome','showVet','showStore','showLogin','confirm', 'home', 'confirmEmail','facebook', 'sendMailPassword','resetPassword', 'showResetPassword', 'changePassword', 'showChangePassword', 'subscribe','subscribeWhenRegister', 'artikuj', 'kontakte', 'info','deleteSubscribe'],
								  'forum'=>['index','show', 'addPost', 'showPost'],
								   'pet' => ['showPetRegister', 'signupPet','showVaccine'],




								);


			 if (array_key_exists($controller, $controllers)) 
			 	
			 {

		    if (in_array($action, $controllers[$controller])) {

			      call($controller, $action);
			    } else {
			      call('pages', 'error');
			    }
			  } else {
			    call('pages', 'error');
			  }









	 ?>