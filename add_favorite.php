<?php
session_start();
include "db_conn.php";

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract data from the POST request
    $book_name = $_POST['book_name'];
    $user_name = $_SESSION['user_name'];
    // You can add more fields here depending on your database structure

    // Prepare SQL statement to insert data into the database
    $sql = "INSERT INTO favoris (book_name, user_name) VALUES ('$book_name', '$user_name')";
    
    // Execute SQL query
    if (mysqli_query($conn, $sql)) {
        echo "Book added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>