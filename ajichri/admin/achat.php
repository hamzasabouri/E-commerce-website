<?php
include "db_connect.php";
?>






<!DOCTYPE html>

<html lang="en" dir="ltr">
<?php
		session_start();
		// Check if user is authenticated and is an admin
		if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
			http_response_code(401);
			echo '
			<head>
			<title>Unauthorized Access</title>
			</head>
			<body>
			<h1>Unauthorized Access</h1>
			<p>You are not authorized to access this page.</p>
			</body>';
			exit();
		}	
	?>
  <head>
    

    <meta charset="UTF-8">
    <title> Data Achat</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <link rel="icon" type="image/png" href="logo3.png">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


   </head>

<body>
  
  <div class="sidebar close">
    <div class="logo-details">
    <img class="header-log" id="logo-men" src="LOGO1.png" style="width: 60px;">
      <span class="logo_name"> AJICHRI</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href='index.php'>
          <i class='bx bxs-home' ></i>
          <span class="link_name" href='index.php'>Acceuil</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href='index.php'>Acceuil</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">

            <i class='bx bxs-data'></i>
            <span class="link_name">Administration</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Administration</a></li>
          <li><a href='./add_new.php'>Ajouter Produit</a></li>
          <li><a href='./achat.php'>Achat Produit</a></li>
          <li><a href='./data_client.php'>Data Client</a></li>

        </ul>
      </li>

      
      <li>
      <a href='../produits/index.php'>
          <i class='bx bxs-briefcase'></i>
          <span class="link_name">Devenir Clinet</span>
        </a>
        
        <ul class="sub-menu blank">
          <li><a class="link_name" href='../Home/index.php'>Devenir Clinet</a></li>
        </ul>
      </li>
      <li>
      <a href='des.php'>
          <i class='bx bxs-briefcase'></i>
          <span class="link_name">Deconnexion</span>
        </a>
        
        <ul class="sub-menu blank">
          <li><a class="link_name" href='des.php'>Deconnexion</a></li>
        </ul>
      </li>
      
 
      
</ul></div>
</div>
<section class="home-section">
  <div class="home-content">
    <i class='bx bx-menu' ></i>
    <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>

    <br><br><br> <p class="title">Data Achat </p>

    <table class="table table-hover text-center"  >
      <thead class="table-dark">
        <tr>
        <th scope="col">Name</th>
          <th scope="col">Number</th>
          <th scope="col">Email</th>
          <th scope="col">Method</th>
          <th scope="col">Adress</th>
          <th scope="col">products</th>
          <th scope="col">total_price</th>



         
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `order`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
          <td><?php echo $row["name"] ?></td>
          <td><?php echo $row["number"] ?></td>
            <td><?php echo $row["email"] ?></td>
            <td><?php echo $row["method"] ?></td>
            <td><?php echo $row["Adress"] ?></td>
            <td><?php echo $row["total_products"] ?></td>
            <td><?php echo $row["total_price"] ?></td>
            <td>
              <a href="delete2.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>

          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>


  
</section>
</form>






  <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>



</body>
</html>
