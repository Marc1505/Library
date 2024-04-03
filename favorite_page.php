<?php
session_start();
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <header>
        <h1>Ma librairie</h1>
    </header>

    <nav>
    <a href="index.php">Accueil</a>
    <a href="change-password.php">Profile</a>
    <a href="favorite_page.php">Favoris</a>
    <hr>
    <?php
        if (!isset($_SESSION['name'])) {
            ?>
            <a href="login_page.php">Connexion</a>
            <p>Vous n'êtes pas inscrit ? <a href="signup.php">Inscrivez-vous ici</a></p>
            <?php
        }
    ?>
    <?php
        if (isset($_SESSION['name'])) {
            echo "<p>Bonjour, {$_SESSION['name']}</p>";
            echo '<a href="logout.php">Logout</a>';
        }
    ?>
    </nav>

    <section>
        <h1>Mes Favoris</h1>
        
    <div id="results"></div>
    <?php
        if (isset($_SESSION['name'])) {
            $username = $_SESSION['user_name'];
            $sql = "SELECT * FROM favoris WHERE user_name='$username'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // Output each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<ul>";
                    foreach ($row as $key => $value) {
                        if ($key === 'book_name') {
                            echo "<li>$value</li>";
                            
                            echo "<form method='post'>";
                            echo "<input type='hidden' name='favorite_id' value='$value'>";
                            echo "<button type='submit' name='delete_favorite'>Delete</button>";
                            echo "</form>";
                        }
                    }
                    echo "</ul>";
                }
            } else {
                echo "<p>Don't have any favorites</p>";
            }
        }

        if (isset($_POST['delete_favorite'])) {
            $favorite_id = $_POST['favorite_id'];
            $username = $_SESSION['user_name'];
            $sql = "DELETE FROM favoris WHERE book_name='$favorite_id' AND user_name='$username'";
            if (mysqli_query($conn, $sql)) {
                header("Location: {$_SERVER['PHP_SELF']}");
                exit();
                // Optionally, you can refresh the page or do any other action after deletion.
            } else {
                echo "Error deleting favorite: " . mysqli_error($conn);
            }
        }
    ?>


    </section>
    

    <footer>
        <p>&copy; 2024 Mon Site Web. Tous droits réservés.</p>
    </footer>

    
</body>
</html>