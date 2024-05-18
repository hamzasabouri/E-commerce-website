<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorie</title>
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
<i class="fa-solid fa-magnifying-glass fa-bounce"></i>          
</a></li>
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
    





      <!-- 
        - #COLLECTION
      -->

      <section class="section collection">
        <div class="container">

          <ul class="collection-list has-scrollbar">

            <li>
              <div class="collection-card" style="background-image: url('menc.png')">
                <h3 class="h4 card-title">Men Collections</h3>

                <a href="../men/index.php" class="btn btn-secondary">
                  <span>Explore All</span>

                  <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                </a>
              </div>
            </li>

            <li>
              <div class="collection-card" style="background-image: url('womenc.png')">
                <h3 class="h4 card-title">Women Collections</h3>

                <a href="../women/index.php" class="btn btn-secondary">
                  <span>Explore All</span>

                  <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                </a>
              </div>
            </li>

            <li>
              <div class="collection-card" style="background-image: url('kidsc.jpg')">
                <h3 class="h4 card-title">kids Collections</h3>

                <a href="../kid/index.php" class="btn btn-secondary">
                  <span>Explore All</span>

                  <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                </a>
              </div>
            </li>

          </ul>

        </div>
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