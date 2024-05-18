<?php
include "db_connect.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $name = $_POST['name'];
  $username = $_POST['username'];
  $tele = $_POST['tele'];
  $adress = $_POST['adress'];


  if(empty($name) || empty($username) || empty($tele)|| empty($adress)){
    $message[] = 'please fill out all';
 }else{

  $sql = "UPDATE `client` SET `name`='$name', `username`='$username', `telephone`='$tele', `Adress`='$adress' WHERE `id`=$id";

  $result = mysqli_query($conn, $sql);
  

  

  if ($result) {
    header("Location: data_client.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}
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
    <title> Modifier client</title>
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
  <p class="title">Modifier Project </p>

  <?php
    $sql = "SELECT * FROM `client` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>





  
  <div class="flex">
      <label>
          <input required="" placeholder="" type="text" class="input"id="name" name="name" value="<?php echo $row['name'] ?>">
          <span>Name</span>
      </label>


  </div>  
  <div class="flex">
      <label>
          <input required="" placeholder="" type="text" class="input"id="username" name="username" value="<?php echo $row['username'] ?>">
          <span>username</span>
      </label>


  </div>  <div class="flex">
      <label>
          <input required="" placeholder="" type="text" class="input"id="tele" name="tele" value="<?php echo $row['telephone'] ?>">
          <span>Tele</span>
      </label>


  </div>  
          
  <label>
      <input required="" placeholder="" type="text" class="input" id="adress" name="adress"value="<?php echo $row['Adress'] ?>">
      <span>Adress</span>
  </label> 
  
  
 
  <div>

        <button type="submit"  name="submit" class="submit">Mis a Jour</button>
        <a href="data_client.php" class="submit">Exit</a>
        </div>
 
</form>







</section>

  <script src="script.js"></script>
  


</body>
</html>
