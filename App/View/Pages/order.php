<?php require APPLICATION_ROOT . "/View/Pages/inc/header.php"; ?>

<!-- This Page Should be Accessable to Guests and Users Loged n a Coustomers
 This page should not be Accessable to Restraunt Owners and order now button 
 should lead to Login Page if not Logged in -->

<?php foreach ($data["order"] as $i): ?>
<form action="<?php echo URL_ROOT; ?>/Pages/placeOrder" method="post">
  <div class="card mb-3 mt-2">
    <h3 class="card-header"><?php echo $i->uploaded_by; ?>
    </h3>
    <div class="card-body">
      <h5 class="card-title"><?php echo $i->dish; ?></h5>
      <h6 class="card-subtitle text-muted"><?php echo $i->category; ?></h6>
    </div>
    <div class="card-body">
      <p class="card-text"><span class="text-muted">Cuisines: </span><?php echo $i->dish_type; ?></p>
    </div>
    <ul class="list-group list-group-flush">
      <span class="text-muted">Ingredient 1:</span><li class="list-group-item"><?php echo $i->main_item1; ?></li>
      <span class="text-muted">Ingredient 2:</span><li class="list-group-item"><?php echo $i->main_item2; ?></li>
      <span class="text-muted">Ingredient 3:</span><li class="list-group-item"><?php echo $i->main_item3; ?></li>
    </ul>
    <div class="card-body">
      <a href="#" class="card-link">Amount: <?php echo $i->amount; ?> ₹</a>
      <?php if (!isLoggedIn()): ?>
      <a href="<?php echo URL_ROOT; ?>/Users/login" class="card-link btn btn-info float-right">Order Now</a>
        <?php else: ?>
      <input type="submit" class="card-link btn btn-info float-right" value="Order Now">    
        <?php endif; ?>
    </div>
    <div class="card-footer text-muted">
      Created at: <?php echo $i->created_at; ?>
    </div>
  </div>
  <input type="hidden" name="order_name" value="<?php echo $i->dish; ?>">
  <input type="hidden" name="delivered_from" value="<?php echo $i->uploaded_by; ?>">
</form>
<?php endforeach; ?>

<?php require APPLICATION_ROOT . "/View/Pages/inc/footer.php";
?>
