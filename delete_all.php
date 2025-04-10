<?php
include 'db_connect.php';

$query = "DELETE FROM students";
if (mysqli_query($conn, $query)) {
    header("Location: index.php"); // Redirect back to main page
    exit();
} else {
    echo "Error deleting all students: " . mysqli_error($conn);
}
?>
