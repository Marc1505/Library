<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1>Bonjour, <?php echo $_SESSION['name']; ?></h1>
     <nav class="home-nav">
     	<a href="change-password.php">Changer de Mot de Passe</a>
        <a href="logout.php">Déconnexion</a>
     </nav>
     
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>