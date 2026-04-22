<?php include 'db_connection.php'; 
if ($_POST) {
    $email = $_POST['email'];
    $pass  = $_POST['password'];
    // Hardcoded admin (change if you want)
    if ($email === 'admin@movie.com' && $pass === 'admin@123') {
        $_SESSION['admin'] = true;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Wrong email or password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2 class="text-center">Admin Login</h2>
            <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
            <form method="POST">
                <input type="email" name="email" class="form-control mb-3" placeholder="admin@movie.com" required>
                <input type="password" name="password" class="form-control mb-3" placeholder="admin123" required>
                <button type="submit" class="btn btn-danger w-100">Login</button>
            </form>
            <p class="text-center mt-3"><a href="index.php" class="text-white">← Back</a></p>
        </div>
    </div>
</div>
</body>
</html>