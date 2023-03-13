<?php
session_start();

// Check if user is already logged in
if (isset($_SESSION['username'])) {
  header('Location: dashboard.php');
  exit();
}

// Check if form is submitted
if (isset($_POST['login-btn'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // TODO: Implement actual login logic here
  // For demonstration purposes, we will just check if username and password are not empty
  if (!empty($username) && !empty($password)) {
    $_SESSION['username'] = $username;
    header('Location: dashboard.php');
    exit();
  } else {
    $error_message = 'Invalid username or password';
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <?php if (isset($error_message)) { ?>
      <p class="error"><?php echo $error_message; ?></p>
    <?php } ?>
    <form action="login.php" method="post">
      <div class="input-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="input-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="input-group">
        <button type="submit" name="login-btn">Login</button>
      </div>
    </form>
  </div>
</body>
</html>

