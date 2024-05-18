<?php
session_start();
  $conn = mysqli_connect('localhost:3307', 'root', '', 'ajichri');
  if (!$conn) {
    die('Database connection error: ' . mysqli_connect_error());
  }


  
  if(isset($_POST['order_btn'])){
  
     $name = $_POST['name'];
     $number = $_POST['number'];
     $email = $_POST['email'];
     $method = $_POST['method'];
     $adress = $_POST['adress'];

  
     $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
     $price_total = 0;
     $product_name = [];
     if(mysqli_num_rows($cart_query) > 0){
        while($product_item = mysqli_fetch_assoc($cart_query)){
           $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
           $product_price = $product_item['price'] * $product_item['quantity'];
           $price_total += $product_price;
        };
     };
  
     $total_product = implode(', ',$product_name);
     $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email, method, adress, total_products, total_price) VALUES('$name','$number','$email','$method','$adress','$total_product','$price_total')") or die('query failed');
  
     if($cart_query && $detail_query){
        echo "
        <div class='order-message-container'>
        <div class='message-container'>
           <h3>thank you for shopping!</h3>
           <div class='order-detail'>
              <span>".$total_product."</span>
              <span class='total'> total : $".$price_total."/-  </span>
           </div>
           <div class='customer-details'>
              <p> your name : <span>".$name."</span> </p>
              <p> your number : <span>".$number."</span> </p>
              <p> your email : <span>".$email."</span> </p>
              <p> your address : <span>".$adress."</span> </p>
              <p> your payment mode : <span>".$method."</span> </p>
              <p>(*pay when product arrives*)</p>
           </div>
              <a href='../produits/index.php' class='btn'>continue shopping</a>
           </div>
        </div>
        ";
        mysqli_query($conn, "TRUNCATE TABLE `cart`") or die('query failed');
     }
  
  }
  
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="icon" type="image/png" href="logo.png">

</head>
<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <div class="overlay" data-overlay></div>

      <a href="../index/index.php" class="logo">
        <img src="logo.png" width="160" height="50" alt="ajichri logo">
      </a>

      <button class="nav-open-btn" data-nav-open-btn aria-label="Open Menu">
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <nav class="navbar" data-navbar>

        <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
          <ion-icon name="close-outline"></ion-icon>
        </button>

        
        <a href="../index/index.php" class="logo">
          <img src="./assets/images/logo.svg" width="190" height="50" alt="Footcap logo">
        </a>

        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="../index/index.php" class="navbar-link">Home</a>
          </li>
          <li class="navbar-item">
            <a href="../produits/index.php" class="navbar-link">Products</a>
          </li>
          <li class="navbar-item">
            <a href="../categorie/index.php" class="navbar-link">Categorie</a>
          </li>
          <li class="navbar-item">
            <a href="../search/index.php" class="navbar-link">Search</a>
          </li>

          <li class="navbar-item">
            <a href="../contact/index.php" class="navbar-link">Contact</a>
          </li>
        </ul>

        <ul class="nav-action-list">

          <li>
          <div class="input-container">
          <a href="../search/index.php" class="nav-action-btn">
<i class="fa-solid fa-magnifying-glass fa-bounce"></i>          </li>
</a>
          <li>
            <a href="../login/login.php" class="nav-action-btn">
              <ion-icon name="person-outline" aria-hidden="true" href="./login/login.php"></ion-icon>

              <span class="nav-action-text">Login / Register</span>
            </a>
          </li>



          <li>
          <?php
$conn = mysqli_connect('localhost:3307', 'root', '', 'ajichri');

      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

            <button class="nav-action-btn">
            <a class="nav-action-btn" href="../panier/index.php">
              <ion-icon name="bag-outline" aria-hidden="true" href="../panier/index.php"></ion-icon><span><?php echo $row_count; ?></span> </a>
              </a>
</div>
          </li>

        </ul>

      </nav>

    </div>
  </header>
  <div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : $<?= $grand_total; ?>/- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder="enter your number" name="number" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>cash on devlivery</option>
               <option value="credit cart">credit cart</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address </span>
            <input type="text" placeholder="e.g. flat no." name="adress" required>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>




</div>
    






  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top-btn" data-go-top>
    <ion-icon name="arrow-up-outline"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script><script src="https://kit.fontawesome.com/e51b85f8d2.js" crossorigin="anonymous"></script>
</body>
</html>