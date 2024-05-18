<?php
$conn = mysqli_connect('localhost:3307', 'root', '', 'ajichri');



if(isset($_POST['add_to_cart'])){

   
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_image = $_POST['product_image'];
  $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart succesfully';
   }

}

?><!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kids Produits</title>
    <link rel="stylesheet" href="style.css">
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

</div>
          </li>

        </ul>

      </nav>

    </div>
  </header>





  <main>
    
  <section class="section product">
        <div class="container">

          <h2 class="h2 section-title">Kids Products</h2>
          <?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>


          <ul class="product-list">

           
            
            <?php
            $conn = mysqli_connect('localhost:3307', 'root', '', 'ajichri');
				if (!$conn) {
					die('Database connection error: ' . mysqli_connect_error());
				}
				
				  $sql = "SELECT * FROM `produit` WHERE `type`='kid'";
				
				// display products
				$result = mysqli_query($conn, $sql);
				if (!$result) {
					die('Database query error: ' . mysqli_error($conn));
				}
				while ($row = mysqli_fetch_assoc($result)) { 
          echo '<form action="" method="post">';
          echo '<li class="product-item">';
          echo '  <div class="product-card" tabindex="0">';
          echo '    <figure class="card-banner">';
          echo '<img src="../uploaded_img/' . $row['pic'] . '" width="31" height="35" loading="lazy"
          alt="Running Sneaker Shoes" class="image-contain" name="product_name">';
          echo '      <ul class="card-action-list">';
          echo '        <li class="card-action-item">';
          echo '          <button class="card-action-btn" aria-labelledby="card-label-1" name="add_to_cart">';
          echo '            <ion-icon name="cart-outline"></ion-icon>';
    
          echo '          <div class="card-action-tooltip" id="card-label-1"  >Add to Cart</div> </button>';
          echo '        </li>';
          echo '        <li class="card-action-item">';
          echo '          <button class="card-action-btn" aria-labelledby="card-label-3">';
          echo '            <ion-icon name="eye-outline"></ion-icon>';
          echo '          </button>';
          echo '          <div class="card-action-tooltip" id="card-label-3">Quick View</div>';
          echo '        </li>';
          echo '      </ul>';
          echo '    </figure>';
          echo '    <div class="card-content">';
          echo '      <div class="card-cat">';
          echo '        <a href="#" class="card-cat-link">' . $row['type'] . ' </a>'; 
          echo '      </div>';
          echo '      <h3 class="h3 card-title">'; ?>
          <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $row['pic']; ?>">
            <?php
          echo '        <a href="#" name="product_name">' . $row['name'] . '</a>';
          echo '      </h3>';
          echo '      <data class="card-price" name="product_price">' . $row['price'] . '$</data>';

          echo '</li>';
          echo '</form>';
          
				}		
				// close database connection
				mysqli_close($conn);
			?>
      
</ul></div></div></div></div>
  </section>
    






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