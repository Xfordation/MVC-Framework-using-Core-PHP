<?php require APPLICATION_ROOT . "/View/Pages/inc/header.php"; ?>
<section class="container">
    <a href="<?php echo URL_ROOT; ?>/posts" class="btn btn-dark mb-5"><i class="fa fa-backward"></i>  Back</a>
   <div class="card border-dark mb-3" style="max-width:100%;">
  <div class="card-header">Written By: <strong><?php echo $data["user"]
    ->name; ?></strong></div>
  <div class="card-body text-dark">
    <h5 class="card-title"><?php echo $data["post"]->title; ?></h5>
    <p class="card-text"><?php echo $data["post"]->body; ?></p>
  </div>
   <div class="card-footer bg-transparent border-dark">Posted at: <strong><?php echo $data[
     "post"
   ]->created_at; ?></strong>
   <!-- This Check if the only the user Who has Uploaded the post is allowed To Edit it  -->
    <?php if ($data["post"]->user_id == $_SESSION["user_ID"]): ?>
        <button type="button" class="btn border-danger text-danger dropdown-toggle float-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Post Settings
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="<?php echo URL_ROOT; ?>/posts/edit/<?php echo $data[
  "post"
]->id; ?>">Edit/Update Post</a>
    <div class="dropdown-divider"></div>
    <form action="<?php echo URL_ROOT; ?>/posts/delete/<?php echo $data["post"]
  ->id; ?>" method="post">
        <input type="submit" value="Delete Post" class="dropdown-item">
    </form>
</div>
    <?php endif; ?>    
</div>
</div>

</section>
<?php require APPLICATION_ROOT . "/View/Pages/inc/footer.php";
?>
