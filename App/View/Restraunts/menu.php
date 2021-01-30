<?php require APPLICATION_ROOT . "/View/Pages/inc/header.php"; ?>

<!-- This page should only be accecable to the Users Accesed as RESTRAUNT OWNERS -->
<div class="d-flex justify-content-around text-center mt-5 mb-3">
    <h2 class="font-weight-bold">Menu</h2>
    <button class="btn btn-info " id="menu-open"><i class="far fa-edit"></i> Create Menu</button>
    <button class="btn btn-danger " id="menu-close" style="display:none"><i class="far fa-times fa-xl"></i> Cancel</button>
</div>
<!-- Form to Upload your Menu That is to be displayed -->
<section class="card p-4 bg-light" id="formContainer" style="display:none">
    <form action="<?php echo URL_ROOT; ?>/Restraunts/menu" method="post">
        <div class="form-group">
            <label for="food-name">Enter Name of Food</label>
            <input type="text" name="dish" id="dish" class="form-control mb-2 <?php echo !empty(
              $data["dish_err"]
            )
              ? "is-invalid"
              : ""; ?>" placeholder="Name of food">
            <!-- Error Message -->
            <span class="invalid-feedback"><?php echo $data[
              "dish_err"
            ]; ?></span>    
        </div>

        <div class="form-group">
            <label for="prefrence">Enter the Category</label>
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1" name="category" class="custom-control-input" value="veg" checked=""> 
                <label class="custom-control-label" for="customRadio1">Vegitarian</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2" name="category" class="custom-control-input" value="nonveg">
                <label class="custom-control-label" for="customRadio2">Non-Vegitarian</label>
            </div>
        </div>
        <div class="form-group">
            <label for="dishtype">Type of Dish</label>
            <input type="text" name="dish_type" id="dish_type" class="form-control  mb-2 <?php echo !empty(
              $data["dish_type_err"]
            )
              ? "is-invalid"
              : ""; ?>" placeholder="eg: Indian/Mexican/Chinese">
            <!-- Error Message -->
            <span class="invalid-feedback"><?php echo $data[
              "dish_type_err"
            ]; ?></span>
        </div>
        <div class="form-group">
            <label for="main items">Enter 3 Main Items of Your Dish</label>
            <input type="text" name="main_item1" id="main_item1" class="form-control mb-2 <?php echo !empty(
              $data["main_item_err"]
            )
              ? "is-invalid"
              : ""; ?>" placeholder="eg: Cheese">
            <input type="text" name="main_item2" id="main_item2" class="form-control  mb-2 <?php echo !empty(
              $data["main_item_err"]
            )
              ? "is-invalid"
              : ""; ?>" placeholder="eg: Jalapeňo">
            <input type="text" name="main_item3" id="main_item3" class="form-control  mb-2 <?php echo !empty(
              $data["main_item_err"]
            )
              ? "is-invalid"
              : ""; ?>" placeholder="eg: Olives">
              <!-- Error Message -->
            <span class="invalid-feedback"><?php echo $data[
              "main_item_err"
            ]; ?></span>
        </div>
        <div class="form-group">
            <label for="price">Enter the Amount of your Dish</label>
            <input type="number" name="amount" id="price" class="form-control mb-2 <?php echo !empty(
              $data["amount_err"]
            )
              ? "is-invalid"
              : ""; ?>" placeholder="Amount in ₹">
              <!-- Error Message -->
            <span class="invalid-feedback"><?php echo $data[
              "main_item_err"
            ]; ?></span>
        </div>
        <!-- Hidden Value of which consists the name of the user/Restraunt Owner -->
         <?php if (isset($_SESSION["user_NAME"])): ?>  
        <input type="hidden" name="uploaded_by" value="<?php echo $_SESSION[
          "user_NAME"
        ]; ?>">
          <?php else: ?>
          <?php die("you are not logged in as the owner"); ?>
          <?php endif; ?>  
        <input type="submit" value="Upload" class="btn btn-info">
    </form>
</section>
<!-- Script for Opening and closing the Menu -->
<script src="<?php echo URL_ROOT; ?>/Public/JS/menu.js"></script>

<?php require APPLICATION_ROOT . "/View/Pages/inc/footer.php";
?>
