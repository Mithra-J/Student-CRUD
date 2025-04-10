<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student CRUD</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Pale Violet CSS -->
    <style>
        body {
            background-color: #E6E6FA; /* Pale Violet / Lavender */
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .container {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 900px;
            margin-bottom: 80px; /* To avoid footer overlap */
        }
        .mithra-footer {
            text-align: center;
            padding: 20px;
            font-size: 18px;
            color: #555;
            position: fixed;
            width: 100%;
            bottom: 0;
            background-color: #f8f9fa;
        }
        .heart {
            color: red;
        }
        h2 {
            color: #9370DB; /* Medium purple tone */
        }
        .btn-primary {
            background-color: #9370DB;
            border: none;
        }
        .btn-primary:hover {
            background-color: #7B68EE;
        }
        .table {
            background: #f8f8ff;
        }
        .table thead {
            background-color: #d8bfd8;
        }
    </style>
</head>

<body>
    <div class="container my-5">

        <h2 class="text-center mb-4">Add New Student</h2>

        <form action="insert.php" method="POST" class="mb-5">
            <div class="mb-3">
                <label class="form-label">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone:</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Student</button>
        </form>

        <hr>

        <h2 class="text-center mb-4">Student List</h2>
            <div class="text-end mb-3">
                <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete ALL students?')" href="delete_all.php">Delete All Students</a>
            </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM students";
                $result = mysqli_query($conn, $query);

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['phone']."</td>";
                        echo "<td>
                            <a class='btn btn-success btn-sm' href='edit.php?id=".$row['id']."'>Edit</a>
                            <a class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?To delete this student record?\")' href='delete.php?id=".$row['id']."'>Delete</a>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No Students Found</td></tr>";
                }
                ?>
            </tbody>
        </table>

    </div>

    <!-- Footer -->
    <div class="mithra-footer">
        Done by <strong>MITHRA J</strong> 
        <span class="heart">❤️</span>
    </div>

</body>
</html>
