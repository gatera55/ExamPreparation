

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - ShareRide</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h2 class="text-center mb-4">User Login</h2>
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <?php if (!empty($alert)) echo $alert; ?>
        <form method="POST" action="login.php" class="card p-4 shadow">
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-success w-100">Login</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<?php
session_start(); // start session to keep user logged in

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "study");
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbl_users WHERE user_email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['user_password'])) {
            // Save user info in session
            $_SESSION['user_email'] = $row['user_email'];
            $_SESSION['user_name']  = isset($row['user_name']) ? $row['user_name'] : $row['user_firstname'];

            // Redirect to home page
            header("Location: home.php");
            exit();
        } else {
            $alert = "<div class='alert alert-danger text-center'>Invalid password.</div>";
        }
    } else {
        $alert = "<div class='alert alert-danger text-center'>No user found with that email.</div>";
    }
    $conn->close();
}
?>