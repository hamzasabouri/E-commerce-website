<?php
  $conn = mysqli_connect('localhost:3307', 'root', '', 'ajichri');
  if (!$conn) {
    die('Database connection error: ' . mysqli_connect_error());
  }


if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
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



<h1 class="heading">shopping cart</h1>


  <section class="shopping-cart">



<table >

  

   <tbody>

      <?php 
      
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
      $grand_total = 0;
      $sub_total = 0;
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
      ?>

      <tr>
         <td><img src="../uploaded_img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
         <td><?php echo $fetch_cart['name']; ?></td>
         <td>$<?php echo $fetch_cart['price']; ?>/-</td>
         <td>
            <form action="" method="post">
               <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
               <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
               <input type="submit" value="update" name="update_update_btn">
            </form>   
         </td>
         <td>$<?php $sub_total = $fetch_cart['price'] * $fetch_cart['quantity'];
         echo $sub_total ; ?>/-</td>

         <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
      </tr>
      <?php
      
        $grand_total += $sub_total;  
         };
      };
      ?>
      <tr class="table-bottom">
         <td><a href="../produits/index.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
         <td colspan="3">grand total</td>
         <td>$<?php echo $grand_total; ?>/-</td>
         <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
      </tr>

   </tbody>

</table>

<div class="checkout-btn">
   <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a>
</div>

</section>

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