<?php require_once('controller/usercontroller.php');

 ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="view/pages/kontakte.css">
<link rel="stylesheet" type="text/css" href="view/posts/poste.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>

<script>
  $(document).ready(function(){
    $("#comment").click(function(){
      $("span").slideToggle();
    });
   $("#lexo").click(function(){
      $("#komente").slideToggle();
    });

});
</script>


</head>

<body>
<div class="container">
<div class="row">
  <div class="col-md-8">
    <h2 class="page-header">Postime</h2>
    <section class="comment-list">
      <!-- First Comment -->
      <?php foreach($posts as $post) { ?>
        <article class="row"> 
          <div class="col-md-2 col-sm-2 hidden-xs">
            <figure class="thumbnail">
              <img class="img-responsive" width="100px" height="100px" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />
              <figcaption class="text-center"><?php echo $post->name; ?></figcaption>
            </figure>
          </div>
          <div class="col-md-10 col-sm-10">
            <div class="panel panel-default arrow left">
              <div class="panel-body">
                <header class="text-left">
                  <div class="comment-user"><i class="fa fa-user"></i> <?php echo $post->titull; ?></div>
                  <button id="favorite" onclick="favorite()" ><?php if($post->userIdF == "" || $post->userIdF != $_SESSION["id"] ){ echo 'Favorite'; } else { echo 'Favorited';}?></button>
                </header><br />
                <?php if($post->content != ''): ?>
                  <div class="comment-post">

                    <textarea style="border: none; text-align: center;" rows="5" cols="60" readonly>
                      <?php echo $post->content; ?>
                    </textarea>

                  </div>
                  <br />
                <?php endif ?>

                <?php if($post->image != ''): ?>

                  <div class="imazh">
                    <img width="200px" height="200px" src="uploads/<?php echo $post->image; ?>">
                  <?php endif ?>
                  <br />

                 

                      <input type="hidden" name="idPost" id="idPost" value="<?php echo $post->id; ?>">
                      <input type="hidden" name="idUser" id="idUser" value="<?php echo $_SESSION["id"]; ?>">

                      <span id="likeNo"><?php echo $post->likes; ?> </span><button class="btn btn-primary" type="button" id="like" style="margin-right: 60%"  onclick="like()"> <?php if($post->userId == "" || $post->userId != $_SESSION["id"] ){ echo 'Like'; } else { echo 'Liked';}?> </button>  
                      
                 


                  <button class="btn btn-primary"  name="comment" id="comment">Leave a comment</button>
                    <span style="display: none">
                      <input type="hidden" name="idPost" id="idPost" value="<?php echo $post->id; ?>">
                      <input type="hidden" name="idUser" id="idUser" value="<?php echo $_SESSION["id"]; ?>">
                      <textarea id="content" name="content"  maxlength="255"></textarea>
                      <input type="button" onclick="comment()"  name="send" value="Comment">
                    </span>
                    <br />
                  
                  <br />


                  
                  <a id="lexo" onclick="readComments()">Lexo komentet</a>
                  <p style="display: none" id="komente"></p>
                  
                   
                  <br />
                
                  <time class="comment-date" ><i class="fa fa-clock-o"></i>Postuar: <?php echo $post->data; ?></time> 
                </div>
              </div>
            </div>
          </article>
        <?php } ?>
        <script src="postValidation.js"></script>
      </body>
      </html>