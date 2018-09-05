  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>4 Paw Friends</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="view/pages/kontakte.css">
    <style>
    .form-popup {
      display: none;
      position: fixed;
      bottom: 10%;
      right: 15px;
      border: 3px solid #f1f1f1;
      z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
      max-width: 200px;
      padding: 10px;
      background-color: #e6e6ff;
    }

    /* Full-width input fields */
    .form-container input[type=text], .form-container input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
    }

    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus, .form-container input[type=text]:focus {
      background-color: #ddd;
      outline: none;
    }

    /* Set a style for the submit/login button */
    .form-container .btn {
      background-color: #b3b3ff;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom:10px;
      opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
      background-color: #6666ff;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover, .open-button:hover {
      opacity: 1;
    }
  </style>
  </head>
  <body>

    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">




          <?php 
          if( $action == 'welcome'  || $action == 'profile' || $action == 'index' ): ?>

           <li><a href="?controller=user&action=welcome"  <span class="glyphicon glyphicon-home "></span> Kryefaqja</a></li>

         <?php endif ?>

         <?php 
         $actions = array(
          'showNormalUser',
          'showVet',
          'showStore',
          'subscribeMessage',
          'showNormalUser',
          'showNormalUser',
          'home',
          'showLogin',
          'indexh',
          'show',
          'search',
          'info',
          'myFavorite',
        );

        ?>

        <?php 

        if( in_array($action, $actions) ): ?>

          <li><a href="?controller=user&action=home"  <span class="glyphicon glyphicon-home "></span> Kryefaqja</a></li>

        <?php endif ?> 



        <?php 

        if( $action == 'welcome' ): ?>
          <li ><a href="?controller=pages&action=profile"  <span class="glyphicon glyphicon-user "></span> Profili </a></li> 
        <?php endif ?> 
      </ul>


      <ul class="nav navbar-nav navbar-right">



        <?php if(($controller=='user' && $action!='welcome') || $action == 'showLogin' ||$action == 'subscribeMessage' ): ?>
          <li class="dropdown">
            <a class="dropdown-toggle"  data-toggle="dropdown" >
              <span class="glyphicon glyphicon-menu-down"></span> Regjistrohu 
            </a>

            <ul class="dropdown-menu">
              <li>
                <a href="?controller=user&action=showNormalUser">
                  <span class="glyphicon glyphicon-user">  </span>    Normal user
                </a>
              </li>
              <li>
                <a  href="?controller=user&action=showVet"> 
                  <span class="glyphicon glyphicon-user"> </span> Veteriner
                </a>
              </li>
              <li>
                <a href="?controller=user&action=showStore">
                  <span class="glyphicon glyphicon-user"> </span>  Dyqan Kafshesh
                </a>
              </li>
            </ul>
          </li> 
        <?php endif ?>
        <?php 
        $actions = array(
          'showNormalUser',
          'showVet',
          'showStore',
          'subscribeMessage',
          'showNormalUser',
          'showNormalUser',
          'home',
        );

        ?>
        <?php 
        if(in_array($action, $actions)  ): ?>
          <li><a href="?controller=user&action=showLogin">

            <?php if($controller=='user' && $action=='showNormalUser'): ?> Jeni te regjistruar? <?php endif ?>  <span class="glyphicon glyphicon-log-in"></span>  Log In</a></li>
          <?php endif ?>

          <?php 

          if( $action == 'profile'  || $action == 'welcome' || $action == 'search'):  ?>

            <li>
              <a href="?controller=posts&action=index">  
                <span class="glyphicon glyphicon-folder-open"></span>  Postime
              </a>
            </li>
          <?php  endif ?>

          <?php 

          if( $action == 'profile'  || $action == 'index' ):  ?>
            <li>
              <a href="?controller=posts&action=show">  
                <span class="glyphicon glyphicon-folder-open"></span>  Shto nje postim
              </a>
            </li>
          <?php  endif ?>


          <?php 
          if( $action == 'profile'): ?>
            <li>
              <a href="?controller=user&action=logout">  
                <span class="glyphicon glyphicon-log-out"></span>  Log Out</a>
              </li>
            <?php endif ?>

            <?php 
            $actions = array(
              'showNormalUser',
              'showVet',
              'showStore',
              'subscribeMessage',
              'showNormalUser',
              'showNormalUser',
              'showLogin',
              'home'
            );

            ?>

            <?php  if(in_array($action, $actions)): ?>
              <li><a type="button" class="open-button" onclick="openForm()"> <span class="glyphicon glyphicon-envelope" > </span>  Abonohu</a></li>
            <?php endif ?>



              <?php  if($action == 'welcome'): ?>
              <li><a type="button" class="open-button" href="index.php?controller=pet&action=showPetRegister"> <span class="glyphicon glyphicon-user" > </span>  Regjistroni kafshen tuaj</a></li>
            <?php endif ?>



            <?php 

            $actions = array(
              'welcome',
              'index',
              'profile',
              'search'
            );

          ?>

          <?php  if(in_array($action, $actions)): ?>
                <div >
                  <form method="GET" name="searchForm">
                    <input type="hidden" name="controller" id="controller" value="pages">
                    <input type="hidden" name="action" id="action" value="search">
                    <input type="text" name="type" id="type" placeholder="Kerko..."><input type="submit" name="go" value="Go">
                  </form>
                </div>
          <?php endif ?>


        </ul> 
      </div>



      </nav>
      

      <?php require_once('routes.php'); ?> 


      <?php if($action == 'welcome'): ?>
        
        <a style="margin-left: 47%" type="button" class="btn btn-default" id="abonohu" data-toggle="modal" href='#modal-id'>Abonohu</a>
          <div class="modal fade" id="modal-id">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Abonohu</h4>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="id" id="id" value="<?php echo $_SESSION["id"]; ?>" >
     
                </div>
                <span id="idError"></span>
                <div class="modal-footer">
                  <a style="margin-left: 40%" class="btn btn-primary" type="button" id="delete" href="index.php?controller=user&action=deleteSubscribe">Unsubscribe</a>

                  <a type="button" id="yes"  class="btn btn-primary" href="index.php?controller=user&action=subscribeWhenRegister">Abonohu</a>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Mbyll</button>
                  
                </div>
              </div>
            </div>
          </div>
       <?php endif ?>

      <div class="form-popup" id="myForm">
        <form method="POST" action="index.php?controller=user&action=subscribe" class="form-container">
          <h1 style="font-family: courier">Abonohu</h1>

           <div>
            <label for="nameS"><b>Emri</b></label>
              <input type="text" placeholder="  Emri" name="nameS" id="nameS" required onfocusout="nameValidate()">
            </div>
          <span id="nameSError"></span>

          

          <br />
            <label for="emailS"><b>Email</b></label>
            <input type="text" placeholder="  Email" name="emailS" id="emailS" required onfocusout="emailValidate()">
          
           <span id="emailSErrors"></span>


          <button type="submit" class="btn">Abonohu</button>
          <button class="btn cancel" onclick="closeForm()">Mbyll</button>
        </form>
      </div>

      <script>
        function openForm() {
          document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
          document.getElementById("myForm").style.display = "none";
        }
      </script>
  
<br />
   <?php 
            $actions = array(
              'showNormalUser',
              'showVet',
              'showStore',
              'subscribeMessage',
              'showNormalUser',
              'showNormalUser',
              'showLogin',
              'welcome',
              'home',
            );

            ?>
<br />
<br />
 <?php  if(in_array($action, $actions)): ?>
  <section>
    <?php  if($action != 'welcome'): ?>
  <p class="section-lead" style="font-size:20px;">Cfare ofron platforma jone online ne ndihme te miqve me 4 putra</p> <?php endif ?>
  <div class="services-grid">
    <div class="service service1">
      <i class="ti-gallery"></i>
      <h4>Evente dhe artikuj</h4>
      <p>Bashkohuni cdo eventi dhe lexoni te rejat me te fudnit.</p>
      <a href="#" class="cta">Lexo me shume <span class="ti-angle-right"></a>
    </div>

    <div class="service service2">
      <i class="ti-light-bulb"></i>
      <h4>Informacion</h4>
      <p>Mesoni si te trajtoni kafshet tuaja, nje guide per te qene nje pronar i mire.</p>
      <a href="index.php?controller=user&action=info" class="cta">Lexo me shume<span class="ti-angle-right"></a>
    </div>

    <div class="service service3">
      <i class="ti-target"></i>
      <h4>Ndihmoni miqte e humbur</h4>
      <p>Klikoni per te pare postimet mbi kafshet e humbura, kontaktoni pronarin</p>
      <a href="index.php?controller=posts&action=indexh" class="cta">Lexo me shume<span class="ti-angle-right"></span></a>
    </div>
  </div>
</section>
<?php endif ?>
    <script src="subscribeValidation.js"></script>

    </body>
    </html>












