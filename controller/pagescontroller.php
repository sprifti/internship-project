  <?php
  require_once('model/post.php');
 
  class PagesController {

    public function home() {
      require_once('view/user/home.php');
    }

    public function confirm() {
      require_once('view/pages/confirm.php');
    }

    public function profile(){  
      if(!isset($_SESSION["id"])){  
       
        header('location: index.php?controller=user&action=showLogin');
        
      } 
       $db = Db::getInstance();
      $email = Pages::getEmail();
      $posts = Post::showYourPost($email);
      
     

      $id = $_SESSION["id"];
      $result = $db->prepare('SELECT name FROM user WHERE id = ?');
      $result ->execute([$id]);
      $name = $result->fetch();

      $result = $db->prepare('SELECT id,name,info,breed FROM pet WHERE owner = ?');
      $result ->execute([$id]);
      $pet = $result->fetch();

      require_once('view/pages/profile.php');
    }

    public function error() {
      require_once('view/user/error.php');
    }

    public function subscribeMessage(){
      require_once('view/pages/subscribeMessage.php');
    }

    public function search(){
        
        $found = Pages::searchPage();
        require_once("view/pages/search.php");
    }

  }
  ?>