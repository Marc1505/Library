<?php
session_start();
include "db_conn.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $book_name = $_POST['book_name'];
    $user_name = $_SESSION['user_name'];
    
    
    $sql = "INSERT INTO favoris (book_name, user_name) VALUES ('$book_name', '$user_name')";
    
    
    if (mysqli_query($conn, $sql)) {
        echo "Book added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>