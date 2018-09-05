<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="view/pages/profile.css">
    <link rel="stylesheet" type="text/css" href="view/pages/kontakte.css">
<link rel="stylesheet" type="text/css" href="view/posts/poste.css">
</head>
<script>
  $(document).ready(function(){
    $("#vaccine").click(function(){
      $("#animalVaccine").slideToggle();
    });
   

});
</script>
<body>
<div class="container">
  <div class="avatar-flip">
    <img src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" height="150" width="150">
    <img src="http://i1112.photobucket.com/albums/k497/animalsbeingdicks/abd-3-12-2015.gif~original" height="150" width="150">
  </div>
  <h2 style="font-family: gabriel; font-size: 50px">Profili im</h2>
  
  <h3><?php echo $name["name"]; ?></h3>
  <a  id="myFavorites" href="index.php?controller=posts&action=myFavorite" >My favorites</a>
  <h4 style="font-size: 20px">Te dhenat e mia dhe te mikut tim</h4>
  <p><h5 style="font-size: 15px">Miku im quhet <?php echo $pet["name"]; ?></h5> </p>
  <p><h5 style="font-size: 15px"><?php echo $pet["name"]; ?> eshte <?php echo $pet["breed"]; ?></h5></p>
 <!--  <p>Nje pershkrim i shkurter per mikun tim</p> -->
  <p><h5><?php echo $pet["info"]; ?></h5></p>
  *Nqs <?php echo $pet["name"]; ?> eshte 0-12 muajsh ateher mund te merrni info mbi
  <a type="button" id="vaccine">Vaksinat</a>*

  <form id="animalVaccine" style="display: none" method="POST" action="index.php?controller=pet&action=showVaccine">
   <?php echo $pet["name"]; ?> eshte <select>
      <option value="zero">0-3 muajsh</option>
      <option value="three">3-6 muajsh</option>
      <option value="six">6-9 muajsh</option>
      <option value="nine">9-12 muajsh</option>
    </select>
  </form>
</div>	

	<div class="row">
    <div class="col-md-11">
	 <h2 class="page-header">Postimet e mia</h2>
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

                  </header><br />
                  <?php if($post->content != ''): ?>
                    <div class="comment-post">

                      <textarea style="border: solid; text-align: left;" rows="5" cols="70" readonly>
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
                       <a type="button" class="btn btn-primary" name="delete" id="delete" data-toggle="modal" href='#modal-id'>Delete</a>
                        <div class="modal fade" id="modal-id">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Delete post?</h4>
                              </div>
                              <div class="modal-body">
                                Hey there! We're about to delete your post.
                              </div>
                              <div class="modal-footer">
                                <a type="button" href="index.php?controller=posts&action=delete&idPost=<?php echo $post->id; ?>" class="btn btn-primary">Okay</a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Anullo</button>
                                
                              </div>
                            </div>
                          </div>
                        </div>
                      <!-- <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p> -->
                  <time class="comment-date" ><i class="fa fa-clock-o"></i>Postuar: <?php echo $post->data; ?></time> 
                    </div>
                  </div>
                </div>
              </article>
            <?php } ?>
        </section>
    </div>
</div>


</body>
</html>