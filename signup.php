<?php
require './config/connection.php';

session_start();

$errors = [];

if (isset($_POST['signin'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $role = 'user';
    $photo = 'default.jpg';

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $errors[] = 'User already exists!';
    } else {
        if ($password != $cpassword) {
            $errors[] = 'Password not matched!';
        } else {
            $insert = "INSERT INTO users (fullname, email, password, role, photo, account_created) VALUES (?, ?, ?, ?, ?, NOW())";
            $stmt = $conn->prepare($insert);
            $stmt->bind_param("sssss", $fullname, $email, $hashed_password, $role, $photo);
            $stmt->execute();
            header('Location: success.php');
        }
    }

    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Moai Reviews</title>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet" />
    <!-- Style -->
    <link rel="stylesheet" href="./style/auth.css" />
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/bfff52efaa.js" crossorigin="anonymous"></script>
  </head>
  <style>
    .container .signup-form .error-msg {
      padding: 7px 0;
      display: block;
      background: var(--color-warning);
      color: var(--color-light);
      border-radius: 5px;
    }
  </style>
  <body>
    <div class="container">
      <div class="logo">
        <img src="image/auth-picture/logo.png" alt="MOAI Reviews Logo" />
      </div>
      <form class="signup-form" action="" method="post">
        <?php
        if(isset($errors)) {
          foreach($errors as $error) {
            echo '<span class="error-msg">'.$error.'</span>';
          };
        };
        ?>
        <div class="form-group">
          <label for="fullname">Full Name:</label>
          <input class="text" type="text" name="fullname" required />
        </div>
        <div class="form-group">
          <label for="password">Email Address:</label>
          <input class="email" type="email" name="email" required />
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input class="password" type="password" name="password" required />
        </div>
        <div class="form-group">
          <label for="password">Confirm Password:</label>
          <input class="password" type="password" name="cpassword" required />
        </div>
          <input type="text" name="role" value="user" hidden/>
          <input type="text" name="photo" value="default.jpg" hidden/>
        <button type="submit" name="signin">Register</button>
        <label for="">have an account?</label>
        <a href="./login.php">Sign In</a>
      </form>
    </div>
    <footer>
      <p>2024 Copyright. All Rights Reserved.</p>
    </footer>
  </body>
</html>
