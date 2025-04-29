<?php
include 'db_connect.php';

mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 0");
$success = mysqli_query($conn, "TRUNCATE TABLE students");
mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 1");

if ($success) {
    header("Location: index.php");
    exit();
} else {
    echo "Error truncating students table: " . mysqli_error($conn);
}
?>
