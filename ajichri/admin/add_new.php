<?php
include "db_connect.php";

if (isset($_POST["submit"])) {
   $name = $_POST['name'];
   $description = $_POST['description'];
   $price = $_POST['price'];
   $type = $_POST['type'];
   if(isset($_FILES['product_image'])) {
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = '../uploaded_img/'.$product_image;

    // Now you can proceed with handling the uploaded file
} else {
    echo "No file uploaded.";
}

   if(empty($name) || empty($price) || empty($product_image)|| empty($type)){
    $message[] = 'please fill out all';
 }else{
  move_uploaded_file($product_image_tmp_name, $product_image_folder);



  $sql = "INSERT INTO `produit`(`id`, `name`, `price`, `description`, `type`, `pic`) VALUES (NULL, '$name', '$price', '$description', '$type', '$product_image')";


   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: index.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }}
}

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
    <title> Ajouter Project</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" type="image/png" href="logo3.png">


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
          <li><a href='./data_client.php'>Achat Client</a></li>

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
<div class="accueil-header">
  <img class="header-log" id="logo-men" src="LOGO1.png" style="width: 190px;">
</div>
<form class="form" action="" method="post" enctype="multipart/form-data">

  <p class="title">Ajouter Project </p>

      <div class="flex">
      <label>
          <input required="" placeholder="" type="text" class="input"id="name" name="name">
          <span>Name</span>
      </label>


  </div>  
          
  <label>
      <input required="" placeholder="" type="text" class="input" id="description" name="description">
      <span>Description</span>
  </label> 
  <div class="select">
  <select id="type" name="type">
  <option selected disabled>Categorie</option>
     <option value="men">Men</option>
     <option value="women">Women</option>
     <option value="kid">Kids</option>

  </select>
</div> <span>Image Produit :</span>
<input type="file"  accept="image/*"  name="product_image" required>
     
  <label>
          <input required="" placeholder="" type="text" class="input"id="price" name="price">
          <span>Prix</span>
      </label>
      
  
              
          
  

 






        <button type="submit"  name="submit" class="submit">Ajouter</button>
        <a href="index.php" class="submit">Exit</a>
        </div>
 
</form>







</section>

  <script src="script.js"></script>
  


</body>
</html>
