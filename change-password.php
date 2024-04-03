<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Changer le Mot de Passe</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="change-p.php" method="post">
     	<h2>Changer le Mot de Passe</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     	<?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

     	<label>Ancien Mot de Passe</label>
     	<input type="password" 
     	       name="op" 
     	       placeholder="Old Password">
     	       <br>

     	<label>Nouveau Mot de Passe</label>
     	<input type="password" 
     	       name="np" 
     	       placeholder="New Password">
     	       <br>

     	<label>Confirmer le Mot de Passe</label>
     	<input type="password" 
     	       name="c_np" 
     	       placeholder="Confirm New Password">
     	       <br>

     	<button type="submit">CHANGE</button>
          <a href="index.php" class="ca">HOME</a>
     </form>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>