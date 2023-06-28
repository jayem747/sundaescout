<?php
session_start();

// Check if the user is already signed in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  // Redirect based on account type
  if ($_SESSION['email'] === 'admin@sundaescout.nl') {
    header("Location: admin.php");
  } else {
    header("Location: index.php");
  }
  exit;
}

// Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "striped";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
  $email = $_POST['inlog_email'];
  $password = $_POST['inlog_wachtwoord'];

  // Perform authentication (e.g., check against a database)
  // ...

  // For demonstration purposes, let's assume the authentication is successful for the admin account
  if ($email === 'admin@sundaescout.nl' && $password === 'aDmin') {
    // Set session variables for admin account
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;

    header("Location: admin.php");
  } else {
    // Set session variables for regular user account
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;

    header("Location: index.php");
  }
  exit;
}

// Check if the register form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
  $email = $_POST['email'];
  $password = $_POST['wachtwoord'];

  // Insert user registration details into the database
  $sql = "INSERT INTO mytable (email, password) VALUES ('$email', '$password')";

  if ($conn->query($sql) === TRUE) {
    // Redirect to index.php after successful registration
    header("Location: index.php");
    exit;
  } else {
    // Display an error message if the insertion fails
    $error = "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Close the database connection
$conn->close();
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
            <button type="submit" name="login">Inloggen</button>
          </div>
          <?php if (isset($error)) {
            echo "<p>$error</p>";
          } ?>
        </form>
      </div>
      <div class="divider"></div>
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
            <button type="submit" name="register">Registreren</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
