<?php
include 'db_connection.php';
if (!isset($_SESSION['user_phone'])) { header("Location: user_login.php"); exit(); }

$movie_id     = $_POST['movie_id'];
$name         = $_POST['name'];
$phone        = $_POST['phone'];
$email        = $_POST['email'];
$id_type      = $_POST['id_proof_type'];
$id_num       = $_POST['id_proof_number'];
$tickets      = (int)$_POST['tickets'];
$price        = (float)$_POST['price'];
$total_amount = $tickets * $price;

// Check available seats
$check = $conn->query("SELECT available_seats FROM movies WHERE id = $movie_id");
$row = $check->fetch_assoc();
if ($row['available_seats'] < $tickets) {
    die("Not enough seats!");
}

// Insert booking
$sql = "INSERT INTO bookings (movie_id, user_name, phone, email, id_proof_type, id_proof_number, tickets_booked, total_amount)
        VALUES ($movie_id, '$name', '$phone', '$email', '$id_type', '$id_num', $tickets, $total_amount)";
$conn->query($sql);

// Update available seats
$conn->query("UPDATE movies SET available_seats = available_seats - $tickets WHERE id = $movie_id");

echo "<h2 class='text-center mt-5'>🎟️ Booking Confirmed!</h2>";
echo "<p class='text-center'>Thank you, $name. You booked $tickets ticket(s).</p>";
echo '<a href="user_dashboard.php" class="btn btn-success d-block mx-auto mt-3">Back to Movies</a>';
?>