<?php 
include 'db_connection.php';
if (!isset($_SESSION['user_phone'])) { header("Location: user_login.php"); exit(); }

$result = $conn->query("SELECT * FROM movies WHERE available_seats > 0");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Movies - CineBook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<nav class="navbar navbar-dark bg-black">
    <div class="container">
        <h4>CineBook</h4>
        <a href="logout.php" class="btn btn-outline-light">Logout</a>
    </div>
</nav>

<div class="container mt-4">
    <h2>Now Showing</h2>
    <div class="row">
    <?php while($movie = $result->fetch_assoc()): ?>
        <div class="col-md-4 mb-4">
            <div class="card bg-secondary text-white">
                <img src="<?= $movie['image'] ?>" class="card-img-top" height="300" style="object-fit:cover;">
                <div class="card-body">
                    <h5><?= $movie['title'] ?></h5>
                    <p>₹<?= $movie['price'] ?> | <?= $movie['available_seats'] ?> seats left</p>
                    <a href="book_ticket.php?id=<?= $movie['id'] ?>" class="btn btn-success w-100">Book Now</a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    </div>
</div>
</body>
</html>