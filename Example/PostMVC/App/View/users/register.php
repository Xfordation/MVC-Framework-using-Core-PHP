<?php require APPLICATION_ROOT . "/View/Pages/inc/header.php"; ?>
<section class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-1 mb-5">
            <h2>Create an Account</h2>
            <p class="lead">Please fill the form to register with us.</p>
            <form action="<?php echo URL_ROOT; ?>/users/register" method="post">
                
                <!-- NAME -->
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="t1" class="form-control <?php echo !empty(
                      $data["name_err"]
                    )
                      ? "is-invalid"
                      : ""; ?>" value="<?php echo $data[
  "name"
]; ?>" placeholder="Enter Name">
                    <span class="invalid-feedback"><?php echo $data[
                      "name_err"
                    ]; ?></span>    
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="t2" class="form-control <?php echo !empty(
                      $data["email_err"]
                    )
                      ? "is-invalid"
                      : ""; ?>" value="<?php echo $data[
  "email"
]; ?>" placeholder="Enter Email">
                <span class="invalid-feedback"><?php echo $data[
                  "email_err"
                ]; ?></span>
                </div>

                <!-- PASSWORD -->
                <div class="form-group">
                    <label for="pass">Password:</label>
                    <input type="password" name="password" id="t3" class="form-control <?php echo !empty(
                      $data["password_err"]
                    )
                      ? "is-invalid"
                      : ""; ?>" value="<?php echo $data[
  "password"
]; ?>" placeholder="Enter Password">
                    <span class="invalid-feedback"><?php echo $data[
                      "password_err"
                    ]; ?></span>
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="pass">Confirm Password:</label>
                    <input type="password" name="confirm_password" id="t4" class="form-control <?php echo !empty(
                      $data["confirm_password_err"]
                    )
                      ? "is-invalid"
                      : ""; ?>" value="<?php echo $data[
  "confirm_password"
]; ?>" placeholder="Confirm Password">
                    <span class="invalid-feedback"><?php echo $data[
                      "confirm_password_err"
                    ]; ?></span>
                </div>

                <!-- SUBMIT BUTTON -->
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URL_ROOT; ?>/users/login" class="btn btn-light btn-block">Have an account ? Log-in</a>
                    </div>
                </div>
            </div>
         </form>
        </div>
    </div>  
</section>
<script src="<?php echo URL_ROOT; ?>/Public/JS/register.js"></script>
<?php require APPLICATION_ROOT . "/View/Pages/inc/footer.php";
?>
