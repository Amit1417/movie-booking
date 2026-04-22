<?php include 'db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CineBook - Movie Tickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(to right, #141e30, #243b55); color: white; }
        .hero { height: 100vh; display: flex; align-items: center; }
    </style>
</head>
<body>
<div class="hero container text-center">
    <div>
        <h1 class="display-1 fw-bold">CineBook</h1>
        <p class="lead mb-5">Book your tickets in seconds</p>
        <a href="admin_login.php" class="btn btn-danger btn-lg px-5 me-3">👑 Admin Login</a>
        <a href="user_login.php" class="btn btn-success btn-lg px-5">🎟️ User Login (Phone only)</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>