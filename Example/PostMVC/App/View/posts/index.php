<?php require APPLICATION_ROOT . "/View/Pages/inc/header.php"; ?>
<div class="row">
    <div class="col-md-6">
    <h1 class="display-3">Posts</h1>
    </div>
    <div class="col-md-6">
    <a href="<?php echo URL_ROOT; ?>/posts/add" class="btn btn-info pull-right">
        <i class="fa fa-pencil"></i> Add Posts
    </a>
    </div>
</div>
<div class="container">
    <?php flash_msg("post_added"); ?>    
    <?php flash_msg("post_delete"); ?>

                 <?php foreach ($data["posts"] as $i): ?>
                
                <?php if ($_SESSION["user_ID"] == $i->user_id): ?>
                     <?php break; ?>
                <?php else: ?>     
                <div class="jumbotron text-center">
                    <p class="font-weight-light text-monospace">
                        <i class="fa fa-exclamation-triangle" style="color: #ffcc00;"></i>
                    You Have'nt Uploaded any post yet? Share Your Thoughts with us.
                    </p>
                </div>      
                <?php endif; ?>
                <?php endforeach; ?>

    
    <?php foreach ($data["posts"] as $i): ?>
    <div class="card mb-5">
        <div class="card-body">
            <div class="card-title"><h3><?php echo $i->title; ?></h3></div>
            <div class="bg-light p-2 mb-3 card-subtitle text-muted">
                Written By: <?php echo $i->name; ?>
            <p>Created at: <?php echo $i->postCreated; ?></p>
            </div>
            <p class="card-text mb-2"><?php echo $i->body; ?></p>
            <a class="card-link" href="<?php echo URL_ROOT; ?>/posts/show/<?php echo $i->postId; ?>" >Read More</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>

       
            
           
<?php require APPLICATION_ROOT . "/View/Pages/inc/footer.php";
?>
