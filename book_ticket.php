<?php 
include 'db_connection.php';
if (!isset($_SESSION['user_phone'])) { header("Location: user_login.php"); exit(); }

$id = $_GET['id'];
$movie = $conn->query("SELECT * FROM movies WHERE id = $id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
    <h2>Booking: <?= $movie['title'] ?></h2>
    <form action="process_booking.php" method="POST">
        <input type="hidden" name="movie_id" value="<?= $movie['id'] ?>">
        <input type="hidden" name="price" value="<?= $movie['price'] ?>">
        
        <div class="mb-3">
            <label>Full Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Phone (already logged in)</label>
            <input type="tel" value="<?= $_SESSION['user_phone'] ?>" class="form-control" readonly>
            <input type="hidden" name="phone" value="<?= $_SESSION['user_phone'] ?>">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label>ID Proof Type</label>
            <select name="id_proof_type" class="form-control">
                <option value="Aadhar">Aadhar</option>
                <option value="PAN">PAN</option>
            </select>
        </div>
        <div class="mb-3">
            <label>ID Proof Number</label>
            <input type="text" name="id_proof_number" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Number of Tickets</label>
            <input type="number" name="tickets" min="1" max="<?= $movie['available_seats'] ?>" value="1" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success btn-lg w-100">Confirm Booking</button>
    </form>
</div>
</body>
</html>