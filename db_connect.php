
<?php
$servername = "localhost";   // or 127.0.0.1
$username = "root";           // default XAMPP phpMyAdmin username
$password = "";               // default XAMPP phpMyAdmin password is empty
$database = "cruddb";         // your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

