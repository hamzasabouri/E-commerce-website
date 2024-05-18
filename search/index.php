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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
          </li>

        </ul>

      </nav>

    </div>
  </header>
 





  <main>
     <form action="" method="GET"><div class="input-group mb-3">
     <div class="input-container">
    <input type="text" name="search" class="input" placeholder="Search something...">
  <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24" class="icon"><g stroke-width="0" id="SVGRepo_bgCarrier"></g><g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g><g id="SVGRepo_iconCarrier"> <rect fill="white" height="24" width="24"></rect> <path fill="" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM9 11.5C9 10.1193 10.1193 9 11.5 9C12.8807 9 14 10.1193 14 11.5C14 12.8807 12.8807 14 11.5 14C10.1193 14 9 12.8807 9 11.5ZM11.5 7C9.01472 7 7 9.01472 7 11.5C7 13.9853 9.01472 16 11.5 16C12.3805 16 13.202 15.7471 13.8957 15.31L15.2929 16.7071C15.6834 17.0976 16.3166 17.0976 16.7071 16.7071C17.0976 16.3166 17.0976 15.6834 16.7071 15.2929L15.31 13.8957C15.7471 13.202 16 12.3805 16 11.5C16 9.01472 13.9853 7 11.5 7Z" clip-rule="evenodd" fill-rule="evenodd"></path> </g></svg>
  <select name="sort">
					<option value="">Trier par</option>
					<option value="price_asc">Prix croissant</option>
					<option value="price_desc">Prix décroissant</option>
					<option value="name_asc">Nom croissant</option>
					<option value="name_desc">Nom décroissant</option>
				  </select>
                                        <button type="submit" class="btn btn-primary">Search</button>
                                        <a href="../produits/index.php">
                                        <button  class="btn btn-primary">Exit</</button></a>
                                    </div>
                                </form>
          <section class="section product">
        <div class="container">

          <h2 class="h2 section-title">Recherche Produit</h2>
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
                     
                     $sql = ""; // Initialize $sql variable
                     
                     if (isset($_GET['search'])) {
                         $search = $_GET['search'];
                         $sort = "";
                     
                         if (isset($_GET['sort'])) {
                             switch ($_GET['sort']) {
                                 case 'price_asc':
                                     $sort = " ORDER BY price ASC";
                                     break;
                                 case 'price_desc':
                                     $sort = " ORDER BY price DESC";
                                     break;
                                 case 'name_asc':
                                     $sort = " ORDER BY name ASC";
                                     break;
                                 case 'name_desc':
                                     $sort = " ORDER BY name DESC";
                                     break;
                                 default:
                                     $sort = "SELECT * FROM produit";
                             }
                         }
                     
                         $sql = "SELECT * FROM produit WHERE name LIKE '%$search%' OR price LIKE '%$search%' OR type LIKE '%$search%' OR description LIKE '%$search%'$sort";
                     } elseif (isset($_GET['sort'])) {
                         switch ($_GET['sort']) {
                             case 'price_asc':
                                 $sql = "SELECT * FROM produit ORDER BY price ASC";
                                 break;
                             case 'price_desc':
                                 $sql = "SELECT * FROM produit ORDER BY price DESC";
                                 break;
                             case 'name_asc':
                                 $sql = "SELECT * FROM produit ORDER BY name ASC";
                                 break;
                             case 'name_desc':
                                 $sql = "SELECT * FROM produit ORDER BY name DESC";
                                 break;
                             default:
                                 $sql = "";
                         }
                     }
                     
                     if (!empty($sql)) { 
                         
                      $Resultat2 = mysqli_query($conn, $sql);

                                      if(mysqli_num_rows($Resultat2) > 0)
                                      {
                                        while ($row = mysqli_fetch_assoc($Resultat2)) { 
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
                                    }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No product Found</td>
                                                </tr>
                                            <?php
                                        }
                                      }
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