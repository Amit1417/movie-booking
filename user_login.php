<?php 
// Enable errors to see what's wrong
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connection.php'; 

if ($_POST) {
    $phone = trim($_POST['phone'] ?? '');
    if (empty($phone)) {
        $error = "Please enter your phone number";
    } else {
        $_SESSION['user_phone'] = $phone;
        header("Location: user_dashboard.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login - CineBook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2 class="text-center mb-4">🎟️ User Login</h2>
            
            <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
            
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="tel" name="phone" class="form-control" placeholder="9876543210" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Continue →</button>
            </form>
            
            <p class="text-center mt-4">
                <a href="index.php" class="text-light">← Back to Home</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>