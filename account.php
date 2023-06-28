<?php
session_start();

// Check if the user is already signed in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  // Redirect to the admin page
  header("Location: admin.php");
  exit;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['inlog_email'];
  $password = $_POST['inlog_wachtwoord'];

  // Check admin credentials
  if ($email === 'admin@sundaescout.nl' && $password === 'aDmin') {
    // Set session variables
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;

    // Redirect to the admin page
    header("Location: admin.php");
    exit;
  } else {
    // Invalid login
    $error = "Invalid email or password.";
  }
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SundaeScout account</title>
  <link rel="stylesheet" href="styles/styleacc.css">
</head>
<body>
  <header>
    <div class="topnav">
      <a href="index.php"><img src="assets/logo.png" width="25px"></a>
      <a href="account.php">account</a>
    </div>
  </header>

  <div class="container">
    <div class="form-container">
      <div class="form">
        <h2>Registreren</h2>
        <form action="#" method="POST">
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="wachtwoord">Wachtwoord</label>
            <input type="password" id="wachtwoord" name="wachtwoord" required>
          </div>
          <div class="form-group button-group">
            <button type="submit">Registreren</button>
          </div>
        </form>
      </div>
      <div class="divider"></div>
      <div class="form">
        <h2>Inloggen</h2>
        <form action="#" method="POST">
          <div class="form-group">
            <label for="inlog_email">E-mail</label>
            <input type="email" id="inlog_email" name="inlog_email" required>
          </div>
          <div class="form-group">
            <label for="inlog_wachtwoord">Wachtwoord</label>
            <input type="password" id="inlog_wachtwoord" name="inlog_wachtwoord" required>
          </div>
          <div class="form-group button-group">
            <button type="submit">Inloggen</button>
          </div>
          <?php if (isset($error)) {
      echo "<p>$error</p>";
    } ?>
        </form>
      </div>
    </div>
  </div>
</body>
</html>