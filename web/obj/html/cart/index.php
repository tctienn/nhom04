<?php
  session_start();
  require_once ("../../classes/dbConnection.php");
  $dbConnection = new dbConnection();
  $conn = $dbConnection->getConnection();
  // var_dump($_SESSION['cart']);exit;
  
  if(isset($_GET['remove']))
    unset($_SESSION['cart'][$_GET['remove']]);
    
  // var_dump($_SESSION['cart'][0]);exit;
  if(isset($_GET['tong']) && $_GET['tong']>0)
  {
    for($i=0; $i<count($_SESSION['cart']);$i++)
    {
      // var_dump($_GET["cout$i"]);exit;
      $_SESSION['cart'][$i]->cout=$_GET["cout$i"];
    }
  }

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
<h1><a href="../index.php" style="text-decoration: none; color: black;}" >Shopping</a> Cart</h1>

<div class="shopping-cart">

  <div class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>

  <?php $sum=0?>
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
          <div class="product-quantity"><?php $as="cout". $i; ?>
            <input type="number" form="check" name="<?=$as?>" value="<?=$_SESSION['cart'][$i]->cout;?>" min="1">
            <!-- <input type="submit"> -->
          </div>
          
          <div class="product-removal">
            <a href="?remove=<?=$i?>">
              <button class="remove-product">
                Remove
              </button>
            </a>
          </div>
          <div class="product-line-price" ><?=$row['gia']*$_SESSION['cart'][$i]->cout?></div>
          
        </div>
      <?php
      $sum+=(float)$row['gia']*$_SESSION['cart'][$i]->cout;
    }
  }
  
  ?>
  
  <input type="hidden" id="hidden"  form="check" name="tong" value="0">



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
  <a href="../index.php"><button style="float: left; border-radius: 21px;" class="checkout" >quay lại trang mua hàng</button></a>
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
      <div class="totals-value" id="cart-total"><?=$sum?></div>
    </div>
    

  </div>
      
      <!-- <a href="?check="> -->
        <!-- <button class="checkout"> <input type="submit"></button> -->
      <!-- </a> -->
      <form id="check" action="" method="get">
          <button class="checkout" onclick="ui()"> <input type="submit" style="background: none; border: none;" value="xác nhận"></button>  
      </form>
      <form action="../../Test.php" method="post">
        <button type="submit" name="redirect">thanh toán</button>
      </form>
</div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>
