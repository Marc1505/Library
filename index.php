<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma librairie</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <header>
        <h1>Ma librairie</h1>
    </header>

    <nav>
    <a href="#">Accueil</a>
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
        <h1>Recherche de Livres</h1>
    <input type="text" id="searchInput" placeholder="Entrez un genre ou un nom de livre">
    <button onclick="searchBooks()">Rechercher</button>
    <div id="results"></div>

    <script>
        async function searchBooks() {
            const searchInput = document.getElementById('searchInput').value;
            const url = `https://www.googleapis.com/books/v1/volumes?q=${searchInput}`;
            
            try {
                const response = await fetch(url);
                const data = await response.json();
                displayBooks(data.items);
            } catch (error) {
                console.error('Erreur lors de la récupération des livres:', error);
            }
        }

        function displayBooks(books) {
            const resultsDiv = document.getElementById('results');
            resultsDiv.innerHTML = '';

            if (books && books.length > 0) {
                books.forEach(book => {
                    const title = book.volumeInfo.title;
                    const authors = book.volumeInfo.authors ? book.volumeInfo.authors.join(', ') : 'Auteur inconnu';
                    const thumbnail = book.volumeInfo.imageLinks ? book.volumeInfo.imageLinks.thumbnail : '';
                    const bookDiv = document.createElement('div');

                    // Check if session is set, then add the button
                    <?php if (isset($_SESSION['name'])) { ?>
                        bookDiv.innerHTML = `
                            <div>
                                <img src="${thumbnail}" alt="Couverture du livre">
                                <button onclick="addBookToDatabase('${title}')">Add to Database</button>
                                <h3>${title}</h3>
                                <p>Auteur(s): ${authors}</p>
                            </div>
                        `;
                    <?php } else { ?>
                        bookDiv.innerHTML = `
                            <div>
                                <img src="${thumbnail}" alt="Couverture du livre">
                                <h3>${title}</h3>
                                <p>Auteur(s): ${authors}</p>
                            </div>
                        `;
                    <?php } ?>
                    
                    resultsDiv.appendChild(bookDiv);
                });
            } else {
                resultsDiv.innerHTML = '<p>Aucun résultat trouvé.</p>';
            }
        
        }

        function addBookToDatabase(title) {
            const xhr = new XMLHttpRequest();
            const url = 'add_favorite.php';
            const params = `book_name=${encodeURIComponent(title)}`;
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log(xhr.responseText); 
                }
            };
            xhr.send(params);
        }
    
    </script>
    </section>
    

    <footer>
        <p>&copy; 2024 Ma Librairie. Tous droits réservés.</p>
    </footer>

    
</body>
</html>
