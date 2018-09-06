  <?php

     require 'vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


      class Post {
        // we define 3 attributes
        // they are public so that we can access them using $post->author directly
        public $id;
        public $name;
        public $content;
        public $titull;
        public $data;
        public $image;
        public $likes;
        public $userId;

        public function __construct($id, $name,$image ,$content, $titull, $data, $likes,$userId,$userIdF) {
          $this->id      = $id;
          $this->name  = $name;
          $this->content = $content;
          $this->titull = $titull;
          $this->data = $data;
          $this->image = $image;
          $this->likes = $likes;
          $this->userId = $userId;
          $this->userIdF = $userIdF;
        }

        public static function all() {
          $list = [];
          $db = Db::getInstance();
          $id_session = $_SESSION["id"];
          $result = $db->query("
              SELECT p.id, name, image, content, titull,data,likes, pL.userId,f.userId as userIdF 
              FROM favorite f 
              right join post p on f.postId = p.id and f.userId = $id_session 
              left join postLikes pL on p.id = pL.postId and pL.userId = $id_session 
              group by p.id 
              ORDER BY p.id DESC
            ");
         // $result-execute(array($_SESSION["id"]));
          foreach($result->fetchAll() as $post) {
            $list[] = new Post($post['id'], $post['name'], $post['image'], $post['content'], $post['titull'], $post['data'],$post['likes'],$post['userId'], $post['userIdF'] );
          }

          return $list;
        }

        public function allLostAnimals(){
          $list = [];
          $db = Db::getInstance();
          $result = $db->query('SELECT p.id, name, image, content, titull,data,likes,userId FROM post p left join postLikes pL on p.id = pL.postId WHERE type != " " ORDER BY p.id DESC');

          
          foreach($result->fetchAll() as $post) {
            $list[] = new Post($post['id'], $post['name'], $post['image'], $post['content'], $post['titull'], $post['data'], $post['likes'], $post['userId'] );
          }

          return $list;
        }


         public static function showYourPost($email) {
          $list = [];
          $db = Db::getInstance();
          $result = $db->prepare('SELECT id, name, image, content, titull,data,likes FROM post WHERE email = ? ORDER BY id DESC ');
          $result ->execute([$email]);

          
          foreach($result->fetchAll() as $post) {
            $list[] = new Post($post['id'], $post['name'], $post['image'], $post['content'], $post['titull'], $post['data'],$post['likes'],'','');
          }

          return $list;
        }

    


        public function add($title,$content,$id,$fileNewName){
           $db = Db::getInstance();

          $result = $db->prepare("SELECT email,name FROM user WHERE id = ?");
          $result->execute([$id]);
          $user = $result->fetch();

          

          if($user != ''){

          $email = $user["email"];
          $name = $user["name"];

          } 
         

        $image = $fileNewName;

        $title = strip_tags($title);
        $content = strip_tags($content);

         $title =  htmlspecialchars($title);
        $content =  htmlspecialchars($content);

        date_default_timezone_set("Tirana/Albania");
          $data =  date("Y-m-d h:i:sa");

            $result = $db->prepare("INSERT INTO post(titull,image,content,email,name,data) VALUES (:title,:image, :content, :email, :name, :data)");

              $result->execute(array('title' => $title, 'image' => $image,'content' => $content , 'email' => $email , 'name' =>$name ,'data'=> $data ));

             

          return true;



        }


        public function sendSubscribeMail(){

          $db = Db::getInstance();

          $result = $db->prepare("SELECT email FROM subscribe");
          $result->execute();
          $user = $result->fetchAll();
        
          foreach ($user as $key => $email) {

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
                    $mail->addAddress($email['email']);    

                  
                    $mail->isHTML(true);                                  
                    $mail->Subject = 'New post';
                    $mail->Body    = "Hey there! Look at this amazing new post <a href='http://localhost/project/work/index.php?controller=posts&action=showPost&id=$id' >Click here</a>";
                    $mail->send();
                  
                   
                 
                }

                catch (Exception $e) {
                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }
                      
                return true;
            }

          


        }

        public static function lastPost($id){

            $list = [];
            $db = Db::getInstance();
            $result = $db->query('SELECT id, name, image, content, titull,data FROM post ORDER BY id DESC');

          
          foreach($result->fetchAll() as $post) {

              $list[] = new Post($post['id'], $post['name'], $post['image'], $post['content'], $post['titull'], $post['data']);
          }

              return $list;
          
          

        }

       public function addFavorite($post,$user){

              $db = Db::getInstance();  

              $result = $db->prepare("SELECT * FROM favorite WHERE userId = :user AND postId = :post");
              $result->execute(array(':user' => $user, ':post' => $post ));
              $posts = $result->fetch();
             if($posts == ''){

              $result = $db->prepare("INSERT INTO favorite(userId,postId) VALUES (:user,:post)");
              $result->execute(array(':user' => $user, ':post' => $post ));
              $response = array("Yes","true");
              return $response;
            }
            else{
              $result = $db->prepare("DELETE FROM favorite WHERE postId = :idPost AND userId = :idUser ");
              $result->execute(array(':idPost' => $post, ':idUser' => $user));
              $response = array("No","false");
              return $response;
            }

       }

        public static function likeAndUpdate($idPost,$idUser)
        { 
            $db = Db::getInstance();  

            
              $result = $db->prepare("SELECT * FROM postLikes WHERE userId = :idUser AND postId = :idPost");
              $result->execute(array(':idUser' => $idUser, ':idPost' => $idPost ));
              $posts = $result->fetch();
             if($posts == ''){

              $result = $db->prepare("INSERT INTO postLikes(userId,postId) VALUES (:idUser,:idPost)");

              $result->execute(array(':idUser' => $idUser, ':idPost' => $idPost ));

              $result = $db->prepare("SELECT likes FROM post WHERE id = ?");
              $result->execute([$idPost]);
              $user = $result->fetch();
              $likes = $user["likes"] + 1;

              $id = $idPost;

              $result = $db->prepare("UPDATE post SET likes = :likes WHERE id = :id");
              $result->execute(array(':likes' => $likes, ':id' => $id ));

              $result = $db->prepare("SELECT likes FROM post WHERE id = ?");
              $result->execute([$idPost]);
              $user = $result->fetch();

              $response = array("Yes","true",$user["likes"] );
              return $response;
              }
              else
              {
              
              $result = $db->prepare("DELETE FROM postLikes WHERE postId = :idPost AND userId = :idUser ");
              $result->execute(array(':idPost' => $idPost, ':idUser' => $idUser));

              $result = $db->prepare("SELECT likes FROM post WHERE id = ?");
              $result->execute([$idPost]);
              $user = $result->fetch();
              $likes = $user["likes"] - 1;

              $id = $idPost;

              $result = $db->prepare("UPDATE post SET likes = :likes WHERE id = :id");
              $result->execute(array(':likes' => $likes, ':id' => $id ));

              $result = $db->prepare("SELECT likes FROM post WHERE id = ?");
              $result->execute([$idPost]);
              $user = $result->fetch();

               $response = array("No","false",$user["likes"] );
              return $response;
            }
            
            
          
        }


      public function deletePost($idPost)
      {

            $db = Db::getInstance();

            $result = $db->prepare("DELETE FROM postLikes WHERE postId = ?");
            $result->execute([$idPost]);

            $result = $db->prepare("DELETE FROM favorite WHERE postId = ?");
            $result->execute([$idPost]);

            $result = $db->prepare("DELETE FROM post WHERE id = ?");
            $result->execute([$idPost]);
            return true;
      }

     


      public function commentOnPost($content,$idPost,$idUser)
      {


        $db = Db::getInstance();
        $result = $db->prepare("INSERT INTO comment(content,userId,postId) VALUES (:content,:idUser,:idPost)");

        $result->execute(array(':content'=> $content, ':idUser' => $idUser, ':idPost' => $idPost ));
        return true;
      }

      public function showFavorites($id){

          $db = Db::getInstance();
          $result = $db->prepare('SELECT * FROM post p inner join favorite f on p.id = f.postId WHERE userId = ?');
          $result ->execute([$id]);
          $name = $result->fetchAll();
          return $name;
      }

 }
    ?>