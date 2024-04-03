<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>Connexion</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>Mot de Passe</label>
     	<input type="password" name="password" placeholder="Mot de Passe"><br>

     	<button type="submit">Connexion</button>
          <a href="signup.php" class="ca">Créer un Compte</a>
     </form>
</body>
</html>