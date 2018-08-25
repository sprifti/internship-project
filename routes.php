	<?php

	  function call($controller, $action) 

	{
	    
	    require_once('controller/' . $controller . 'controller.php');

	     switch($controller) 
	    {
	      case 'pages':
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

	    
	    }

	     $controller->{ $action }();


	}

			 $controllers = array(
			 					  'pages' => ['home', 'error','welcome','profile','subscribeMessage'],
								  'user' => ['signup','signupVet','signupStore','login', 'logout', 'showNormalUser', 'welcome','showVet','showStore','showLogin', 'home', 'subscribe']);


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