<?php require APPLICATION_ROOT . "/View/Pages/inc/header.php"; ?>

<section class="p-4 bg-light mt-5">

  <div class="mb-2 float-right">
    <a class="btn btn-outline-warning" id="restraunt" href="<?php echo URL_ROOT; ?>/Restraunts/register">Register as Restruant</a>
  </div>

  <!-- User Form -->
  <form action="<?php echo URL_ROOT; ?>/Users/register" method="post">
    <h3>User Registeration Form</h3>

    <!-- Hidden Value to Identify the type of user -->
    <input type="hidden" name="user_type" value="coustomer">

    <div class="form-group">
      <label for="coustomername">Enter Your Name</label>
      <input type="text" name="name" id="cname" class=" form-control mb-2 <?php echo !empty(
        $data["name_err"]
      )
        ? "is-invalid"
        : ""; ?>"  placeholder="Enter name">
      <!-- Error Message -->
      <span class="invalid-feedback"><?php echo $data["name_err"]; ?></span>    
    </div>

    <div class="form-group">
      <label for="coustomeremail">Enter Your Email</label>
      <input type="email" name="email" id="cemail" class=" form-control mb-2 <?php echo !empty(
        $data["email_err"]
      )
        ? "is-invalid"
        : ""; ?>" placeholder="Enter Email">
      <!-- Error Message -->
      <span class="invalid-feedback"><?php echo $data["name_err"]; ?></span>    
    </div>

    <div class="form-group">
      <label for="coustomerpass">Enter Your Password</label>
      <input type="password" name="password" id="password" class=" form-control mb-2 <?php echo !empty(
        $data["password_err"]
      )
        ? "is-invalid"
        : ""; ?>" placeholder="Enter Password">
      <!-- Error Message -->  
      <span class="invalid-feedback"><?php echo $data[
        "password_err"
      ]; ?></span>    
    </div>

    <div class="form-group">
      <label for="coustomerrepass">Re-Enter Your Password</label>
      <input type="password" name="confirm_password" id="confirm_password" class=" form-control mb-2 <?php echo !empty(
        $data["confirm_password_err"]
      )
        ? "is-invalid"
        : ""; ?>" placeholder="Re-Enter Password">
      <span class="invalid-feedback"><?php echo $data[
        "confirm_password_err"
      ]; ?></span>    
    </div>

    <div class="form-group">
      <label for="coustomerAddr">Enter Your Address</label>
      <input type="text" name="addr" id="caddr" class=" form-control mb-2 <?php echo !empty(
        $data["addr_err"]
      )
        ? "is-invalid"
        : ""; ?>" placeholder="Enter Address">
      <!-- Error Message -->  
      <span class="invalid-feedback"><?php echo $data["addr_err"]; ?></span>
    </div>

    <div class="form-group">
      <label for="prefrence">What Are your Prefrence's ?</label>
        <div class="custom-control custom-radio">
          <input type="radio" id="customRadio1" name="prefrences" class="custom-control-input" value="veg" checked=""> 
          <label class="custom-control-label" for="customRadio1">Vegitarian</label>
        </div>
        <div class="custom-control custom-radio">
        <input type="radio" id="customRadio2" name="prefrences" class="custom-control-input" value="nonveg">
          <label class="custom-control-label" for="customRadio2">Non-Vegitarian</label>
        </div>
          <div class="custom-control custom-radio">
        <input type="radio" id="customRadio3" name="prefrences" class="custom-control-input" value="both">
          <label class="custom-control-label" for="customRadio3">Both (Veg/non-Veg)</label>
        </div>
        </div>

    <input type="submit" name="submit_creg" id="submit" class="btn btn-primary btn-block mt-3" value="Register">
  </form>
  <p class="text-muted float-right p2">Already Have an Account ?<a href="<?php echo URL_ROOT; ?>/Users/login" class=" text-info">Login</a></p>
</section>
<!-- Script for Validation -->
<script src="<?php echo URL_ROOT; ?>/Public/JS/register.js"></script>

<?php require APPLICATION_ROOT . "/View/Pages/inc/footer.php";
?>
