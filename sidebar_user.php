<?php
require './config/connection.php';
require './config/functions.php';

session_start();

if (!isset($_SESSION['admin_name']) && !isset($_SESSION['user_name'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('Location: 401.html');
    exit;
}

$user_id = $_SESSION['user_id'];

$user_info = query("SELECT * FROM users WHERE id = $user_id");

// Mengambil informasi film
$films = query("SELECT * FROM films");

// Menentukan halaman aktif
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Moai Reviews</title>

      <link rel="icon" href="./image/icon.svg">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet" />
    <!-- Style -->
    <link rel="stylesheet" href="./style/dashboard.css" />
    <link rel="stylesheet" href="buffer.css" />
    <!-- <link rel="stylesheet" href="./style/style.css" /> -->
    <!-- <link rel="stylesheet" href="dashboard.css" />  -->
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/bfff52efaa.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <aside class="sidebar">
      <div class="logo">
        <img src="./image/auth-picture/logo.png" alt="Moai review logo" />
      </div>
      <nav>
        <ul>
          <li class="<?php echo $current_page == 'dashboard_user.php' ? 'active' : ''; ?>"><a href="./dashboard_user.php">Dashboard</a></li>
          <li class="<?php echo $current_page == 'user-information_user.php' ? 'active' : ''; ?>"><a href="./user-information_user.php">My Account</a></li>
        </ul>
      </nav>
      <div class="sign-out">
        <a href="logout.php">Sign Out</a>
      </div>
    </aside>

    <!-- Konten halaman Anda di sini -->

  </body>
</html>
