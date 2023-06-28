<?php
session_start();

// Check if the user is signed in as an admin
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to the login page
    header("Location: account.php");
    exit;
  }
  
  // Check if the "Sign out" link is clicked
  if (isset($_GET['signout'])) {
    // Unset all session variables
    $_SESSION = array();
  
    // Destroy the session
    session_destroy();
  
    // Redirect to the login page
    header("Location: account.php");
    exit;
  }
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <style>

    body {
        font-family: sans-serif;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }

    h1 {
      text-align: center;
    }

    /* Add a background color to the top navigation */
    .topnav {
      background-color: #ffffff;
      overflow: hidden;
    }
  
    /* Style the links inside the navigation bar */
    .topnav a {
      float: left;
      color: #000000;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }
  
    /* Change the color of links on hover */
    .topnav a:hover {
      background-color: #ffffff;
      color: rgb(251, 155, 66);
    }
  </style>
</head>
<body>
  <header>
    <div class="topnav">
      <a href="index.php"><img src="assets/logo.png" width="25px"></a>
      <a href="account.php">account</a>
    </div>
  </header>

  <h1>Admin Page</h1>

  <a href="?signout=true">Sign out</a>

  <?php
  // Database connection
  $servername = "localhost";
  $username = "root";
  $dbname = "striped";

  // Create connection
  $conn = new mysqli($servername, $username, '', $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Fetch accounts from the database
  $sql = "SELECT * FROM mytable";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Display accounts in a table
    echo "<table>";
    echo "<tr><th>ID</th><th>Email</th></tr>";
    while ($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["id"] . "</td><td>" . $row["email"] . "</td></tr>";
    }
    echo "</table>";
  } else {
    echo "No accounts found.";
  }

  // Close database connection
  $conn->close();
  ?>

</body>
</html>
