<?php require APPLICATION_ROOT . "/View/Pages/inc/header.php"; ?>
<section class="container">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <?php flash_msg("register_success"); ?>
            <h2>Login</h2>
            <form action="<?php echo URL_ROOT; ?>/users/login" method="post">
                <!-- EMAIL -->
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="t1" class="form-control <?php if (
                      !empty($data["email_err"])
                    ) {
                      echo "is-invalid";
                    } ?>" value="<?php echo $data[
  "email"
]; ?>" placeholder="Enter Email">
                <span class="invalid-feedback"><?php echo $data[
                  "email_err"
                ]; ?></span>
                </div>
                  <!--PASSWORD-->
                 <div class="form-group">
                    <label for="pass">Password:</label>
                    <input type="password" name="password" id="t2" class="form-control <?php if (
                      !empty($data["password_err"])
                    ) {
                      echo "is-invalid";
                    } ?>" value="<?php echo $data[
  "password"
]; ?>" placeholder="Enter Password">
                    <span class="invalid-feedback"><?php echo $data[
                      "password_err"
                    ]; ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URL_ROOT; ?>/users/register" class="btn btn-light btn-block">New User? Register now</a>
                    </div>
                </div>
            </form>
        </div>
    </div>    
</section>
<?php require APPLICATION_ROOT . "/View/Pages/inc/footer.php";
?>
