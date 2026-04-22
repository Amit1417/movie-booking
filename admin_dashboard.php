<?php 
include 'db_connection.php';
if (!isset($_SESSION['admin'])) { header("Location: admin_login.php"); exit(); }

$result = $conn->query("SELECT * FROM movies");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-4">
    <h1>Admin Dashboard <a href="logout.php" class="btn btn-secondary float-end">Logout</a></h1>
    <a href="add_movie.php" class="btn btn-success mb-3">+ Add New Movie</a>
    
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Poster</th>
                <th>Title</th>
                <th>Price</th>
                <th>Total Seats</th>
                <th>Available</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><img src="<?= $row['image'] ?>" width="80" height="100"></td>
                <td><?= $row['title'] ?></td>
                <td>₹<?= $row['price'] ?></td>
                <td><?= $row['total_seats'] ?></td>
                <td><?= $row['available_seats'] ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>