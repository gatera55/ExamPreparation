<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php"); // redirect back if not logged in
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Home - ShareRide</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5 text-center">
    <h1>Welcome to VV</h1>
    <p>Hello, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</p>
    <a href="logout.php" class="btn btn-danger">Logout</a>
  </div>
</body>
</html>