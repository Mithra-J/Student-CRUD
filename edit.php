<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM students WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Student not found!";
        exit;
    }
} else {
    echo "Invalid request!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #E6E6FA; /* Pale Violet Background */
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .btn-primary {
            background-color: #4CAF50; /* Green color for Update button */
            border: none;
        }
        .btn-primary:hover {
            background-color: #45a049; /* Darker green on hover */
        }
        .btn-secondary {
            background-color: #6c757d; /* Gray color for Back button */
            border: none;
        }
        .btn-secondary:hover {
            background-color: #5a6268; /* Darker gray on hover */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Edit Student</h2>

    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Phone:</label>
            <input type="text" name="phone" class="form-control" value="<?php echo $row['phone']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Student</button>
    </form>

    <br>
    <a href="index.php" class="btn btn-secondary">Back to Student List</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
