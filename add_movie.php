<?php 
include 'db_connection.php';
if (!isset($_SESSION['admin'])) { 
    header("Location: admin_login.php"); 
    exit(); 
}

if ($_POST) {
    $title = $conn->real_escape_string($_POST['title']);
    $desc  = $conn->real_escape_string($_POST['description']);
    $price = (float)$_POST['price'];
    $total = (int)$_POST['total_seats'];

    // Image upload
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);

    $image_name = time() . "_" . basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $image_name;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        
        $sql = "INSERT INTO movies (title, description, image, price, total_seats, available_seats) 
                VALUES ('$title', '$desc', '$target_file', $price, $total, $total)";
        
        if ($conn->query($sql)) {
            header("Location: admin_dashboard.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Failed to upload image.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add New Movie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
    <h2 class="mb-4">Add New Movie</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Movie Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Enter movie description..."></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Ticket Price (₹)</label>
            <input type="number" name="price" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Total Seats</label>
            <input type="number" name="total_seats" class="form-control" min="1" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Upload Movie Poster</label>
            <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-success btn-lg">Add Movie to Database</button>
        <a href="admin_dashboard.php" class="btn btn-secondary btn-lg ms-3">Cancel</a>
    </form>
</div>
</body>
</html>