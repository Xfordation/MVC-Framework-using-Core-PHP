<?php require APPLICATION_ROOT . "/View/Pages/inc/header.php"; ?>

<section class="p-4 bg-light w-75 m-auto">
  <?php flash_msg("register_success"); ?>
  <div class="mb-2 float-right">
    <a class="btn btn-outline-warning" id="restraunt" href="<?php echo URL_ROOT; ?>/Restraunts/login">Login as Restruant</a>
  </div>

  <!-- User Form -->
  <form action="<?php echo URL_ROOT; ?>/Users/login" method="post" class="form-group" id="coustomerDisp">
    <h3>Login as User</h3>

    <div class="form-group">
      <label for="coustomeremail">Enter Your Email</label>
      <input type="email" name="email" id="cousEmail" class="form-control mb-2 <?php if (
        !empty($data["email_err"])
      ) {
        echo "is-invalid";
      } ?>" placeholder="Enter Email">
      <!-- Error Message -->
      <span class="invalid-feedback"><?php echo $data["email_err"]; ?></span>
    </div>

    <div class="form-group">
      <label for="coustomerpass">Enter Your Password</label>
      <input type="password" name="password" id="cousPassword" class="form-control mb-2 <?php if (
        !empty($data["password_err"])
      ) {
        echo "is-invalid";
      } ?>" placeholder="Enter Password">
      <!-- Error Message -->
      <span class="invalid-feedback"><?php echo $data["password_err"]; ?></span>
    </div>

    <input type="submit" name="cousSubmit" id="cousSubmit" class="btn btn-primary btn-block mt-3" value="Login">

  </form>
  <p class="text-muted float-right p2">Dont Have an Account ?<a href="<?php echo URL_ROOT; ?>/Users/register" class=" text-info">Register</a></p>
</section>


<?php require APPLICATION_ROOT . "/View/Pages/inc/footer.php";
?>
