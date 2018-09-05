    <?php
    class PostsController {

      public function index() {
       if(!isset($_SESSION["id"])){  

        header('location: index.php?controller=user&action=showLogin');
        exit();
      }
      $posts = Post::all();
      require_once('view/posts/postime.php');
    }
    public function indexh() {
      $posts = Post::alllostAnimals();
      require_once('view/posts/postimehumb.php');
    }

    public function addPost() {
      require_once('controller/usercontroller.php');

      if(isset($_POST["title"])){
        $title = $_POST["title"];
      }

      if(isset($_POST["content"])){
        $content = $_POST["content"];
      } 

      if($title == '' || $content == ''){
        $_SESSION["error"] = "Please fill all the fields";
        header('location: index.php?controller=posts&action=show'); die;
      }
        

        $file = $_FILES["file"];
      
        $fileName = $file['name']; 
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        $fileExt = explode('.', $fileName);
        $fileType = strtolower(end($fileExt));

        $type = array('jpg', 'jpeg', 'png');

        if(in_array($fileType, $type))
        { 
          if($fileError === 0)
          { 
           
              $fileNewName = uniqid().".".$fileType;
              $fileDestination = 'uploads/'.$fileNewName;
              move_uploaded_file($fileTmpName, $fileDestination);
          
          }
          else
          {
            $_SESSION["error"] = "there was an error uploading this file";
            header('location: index.php?controller=posts&action=show'); die;
          }

        }
        else
        {
          $_SESSION["error"] = "you can't upload this type of file";
           header('location: index.php?controller=posts&action=show'); die;
        }

        


      $id = $_SESSION["id"];

      $added = Post::add($title,$content, $id, $fileNewName);

      if($added === true) {

        Post::sendSubscribeMail();

        $posts = Post::all();
      header('location: index.php?controller=posts&action=index');
        exit();

      }

    }


    public function showPost() {

      if(isset($_GET["id"])){

        $id = $_GET["id"]; 
      }

      $posts = Post::lastPost($id);
      require_once('view/posts/postimeSubscribe.php');
    }


      public function comment(){
         if(isset($_POST["post"])){
          $post = $_POST["post"];
        }

        if(isset($_POST["user"])){
          $user = $_POST["user"];
        }

        if(isset($_POST["content"])){
          $content = $_POST["content"];
        }



        $commented = Post::commentOnPost($content,$post,$user);

        if($commented == true){
          echo "Yes";
        }
      }

      public function like()
      {

        if(isset($_POST["post"])){
          $post = $_POST["post"];
        }

        if(isset($_POST["user"])){
          $user = $_POST["user"];
        }
        
        
       
        $liked = Post::likeAndUpdate($post,$user);

        if($liked[1] == true)
        {  
          $liked = json_encode($liked);
          echo $liked;
          
        }
        else
        {
          $liked = json_encode($liked);
          echo $liked;
          
        } 


      }


      public function delete(){

        if(isset($_GET["idPost"])){
          $idPost = $_GET["idPost"];
        }
        


        $deleted = Post::deletePost($idPost);
        
        if($deleted == true){

          header('Location: index.php?controller=posts&action=index');
        }
      }
   //  public function subscribeUser() {
   //   $id = $_SESSION["id"];

   //   $subscribed = Post::findAndSubscribe($id);
   // }

      public function favorite(){

         if(isset($_POST["post"])){
          $post = $_POST["post"];
        }

        if(isset($_POST["user"])){
          $user = $_POST["user"];
        } 
       

        $favorited = Post::addFavorite($post,$user);
        if($favorited[1] == true){
          $favorited = json_encode($favorited);
          echo $favorited;
        }
        else{
          $favorited = json_encode($favorited);
          echo $favorited;
        }
      }

      public function showComments(){

        if(isset($_POST["post"])){
          $post = $_POST["post"];
        }

            $db = Db::getInstance();
            $result = $db->prepare('SELECT * FROM comment c inner join user u on c.userId = u.id  WHERE postId = ?');
            $result->execute([$post]);
            $comments = $result->fetchAll();
            $comments = json_encode($comments);
            echo $comments;

      }

   public function show() {


     if(!isset($_SESSION["id"])){  
      header('Location: index.php?controller=user&action=showLogin');
      exit();
    } 

    require_once('view/posts/show.php');
  }

  public function myFavorite(){

    $id = $_SESSION["id"];

    $posts = Post::showFavorites($id);

     require_once('view/posts/favorite.php');


  }


    // public function unLike(){

    //     if(isset($_POST["post"])){
    //       $post = $_POST["post"];
    //     }

    //     if(isset($_POST["user"])){
    //       $user = $_POST["user"];
    //     } 

    //     $unliked = Post::unlikePost($post,$user);
    //     if($unliked == true){
    //       echo "Yes";
    //     }
    //     else {
    //       "No";
    //     }
    // }

}
?>