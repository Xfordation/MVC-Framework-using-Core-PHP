<?php require APPLICATION_ROOT . "/View/Pages/inc/header.php"; ?>
<section class="container">
    <a href="<?php echo URL_ROOT; ?>/posts" class="btn btn-dark"><i class="fa fa-backward"></i>  Back</a>
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Edit Posts</h2>
            <form action="<?php echo URL_ROOT; ?>/posts/edit/<?php echo $data[
  "id"
]; ?>" method="post"> 
                <!-- TITLE -->
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="t1" class="form-control <?php if (
                      !empty($data["title_err"])
                    ) {
                      echo "is-invalid";
                    } ?>" value="<?php echo $data[
  "title"
]; ?>" placeholder="Enter post Title">
                <span class="invalid-feedback"><?php echo $data[
                  "title_err"
                ]; ?></span> 
                
                <!-- BODY -->
                <div class="form-group">
                    <label for="body">Body:</label>
                    <textarea type="text" name="body" id="t2" class="form-control <?php if (
                      !empty($data["body_err"])
                    ) {
                      echo "is-invalid";
                    } ?>" value="<?php echo $data[
  "body"
]; ?>" placeholder="Enter your Content"></textarea>
                <span class="invalid-feedback"><?php echo $data[
                  "body_err"
                ]; ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Upload" class="btn btn-success btn-block">
            </div>
            </form>    
        </div>
    </div>
</section>
<?php require APPLICATION_ROOT . "/View/Pages/inc/footer.php";
?>
