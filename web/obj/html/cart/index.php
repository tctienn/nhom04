<?php
  session_start();
  require_once ("../../classes/dbConnection.php");
  $dbConnection = new dbConnection();
  $conn = $dbConnection->getConnection();
  
  

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Responsive Shopping Cart</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<h1>Shopping Cart</h1>

<div class="shopping-cart">

  <div class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>


  <?php

  for($i=0;$i<count($_SESSION['cart']);$i++)
  {
    $sql = "SELECT * FROM `sanpham` WHERE id=".$_SESSION['cart'][$i]->id;
    $getdanhmuc = $conn->query($sql);
    if ($getdanhmuc->num_rows > 0) {
      $row = $getdanhmuc->fetch_assoc();
      // echo $row['name'];
      
      ?>
        <div class="product">
          <div class="product-image">
            <img src="<?=$row['img']?>">
          </div>
          <div class="product-details">
            <div class="product-title"><?=$row['name']?></div>
            <p class="product-description"><?=$row['mota']?></p>
          </div>
          <div class="product-price"><?=$row['gia']?></div>
          <div class="product-quantity">
            <input type="number" value="2" min="1">
          </div>
          <div class="product-removal">
            <button class="remove-product">
              Remove
            </button>
          </div>
          <div class="product-line-price"><?=$row['gia']?></div>
        </div>
      <?php

    }
  }
  
  ?>



  <!-- <div class="product">
    <div class="product-image">
      <img src="https://s.cdpn.io/3/large-NutroNaturalChoiceAdultLambMealandRiceDryDogFood.png">
    </div>
    <div class="product-details">
      <div class="product-title">Nutro™ Adult Lamb and Rice Dog Food</div>
      <p class="product-description">Who doesn't like lamb and rice? We've all hit the halal cart at 3am while quasi-blackout after a night of binge drinking in Manhattan. Now it's your dog's turn!</p>
    </div>
    <div class="product-price">45.99</div>
    <div class="product-quantity">
      <input type="number" value="1" min="1">
    </div>
    <div class="product-removal">
      <button class="remove-product">
        Remove
      </button>
    </div>
    <div class="product-line-price">45.99</div>
  </div> -->

  <div class="totals">
    <div class="totals-item">
      <label>tổng</label>
      <div class="totals-value" id="cart-subtotal">0</div>
    </div>
    <!-- <div class="totals-item">
      <label>Tax (5%)</label>
      <div class="totals-value" id="cart-tax">3.60</div>
    </div> -->
    <!-- <div class="totals-item">
      <label>Shipping</label>
      <div class="totals-value" id="cart-shipping">15.00</div>
    </div> -->
    <div class="totals-item totals-item-total">
      <label>tổng số</label>
      <div class="totals-value" id="cart-total">0</div>
    </div>
  </div>
      
      <button class="checkout">Checkout</button>

</div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>
