<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // safer to cast as integer to prevent SQL injection

    $sql = "DELETE FROM students WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Error deleting student: " . htmlspecialchars(mysqli_error($conn)) . "</div>";
    }
} else {
    echo "<div class='alert alert-warning'>Invalid request!</div>";
}
?>
