<?php require APPLICATION_ROOT . "/View/Pages/inc/header.php"; ?>

<section class="p-4 bg-light w-75 m-auto">

    <div class="mb-2 float-right">
        <a class="btn btn-outline-info" id="restraunt" href="<?php echo URL_ROOT; ?>/Users/login">Login as Coustomer</a>
    </div>
    <?php flash_msg("register_success"); ?>
    <!-- Restrunt Form -->
    <form action="" method="post" class="form-group">
        <h3>Login in as Restraunt</h3>
        
        <div class="form-group">
            <label for="coustomeremail">Enter Your Email</label>
            <input type="email" name="email" id="email" class=" form-control mb-2 <?php echo !empty(
              $data["name_err"]
            )
              ? "is-invalid"
              : ""; ?>" placeholder="Enter Restraunt Email">
                    <!-- Error Message -->
            <span class="invalid-feedback"><?php echo $data[
              "name_err"
            ]; ?></span>
        </div>    

        <div class="form-group">
            <label for="coustomerpass">Enter Your Password</label>
            <input type="password" name="password" id="Password" class=" form-control mb-2 <?php echo !empty(
              $data["password_err"]
            )
              ? "is-invalid"
              : ""; ?>" placeholder="Enter Password">
                    <!-- Error Message -->
                    <span class="invalid-feedback"><?php echo $data[
                      "password_err"
                    ]; ?></span>
        </div>

        <input type="submit" name="resSubmit" id="resSubmit" class="btn btn-primary btn-block mt-3" value="Login">
    </form>
    <p class="text-muted float-right p2">Dont Have an Account ?<a href="<?php echo URL_ROOT; ?>/Users/register" class=" text-info">Register</a></p>
</section>

<?php require APPLICATION_ROOT . "/View/Pages/inc/footer.php";
?>
