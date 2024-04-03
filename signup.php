<!DOCTYPE html>
<html>
<head>
	<title>Inscrivez-vous</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="signup-check.php" method="post">
     	<h2>Inscivez-vous</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Nom</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Nom"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Nom"><br>
          <?php }?>

          <label>User Name</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"><br>
          <?php }?>


     	<label>Mot de Passe</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Mot de Passe"><br>

          <label>Confirmation du Mot de Passe</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Confirmation du Mot de Passe"><br>

     	<button type="submit">Inscription</button>
          <a href="login_page.php" class="ca">Vous avez déjà un compte ?</a>
     </form>
</body>
</html>