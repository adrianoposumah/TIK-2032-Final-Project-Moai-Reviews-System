<?php
require './config/connection.php';

session_start();

$errors = [];

if (isset($_POST['signin'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_name'] = $row['fullname']; 
                $_SESSION['admin_name'] = $row['fullname']; 
                $_SESSION['role'] = $row['role']; 

                if ($_SESSION['role'] == 'admin') {
                    header('Location: home_admin.php');
                    exit;
                } elseif ($_SESSION['role'] == 'user') {
                    header('Location: home_user.php');
                    exit; 
                }
            } else {
                $errors[] = 'Incorrect email or password!';
            }
        } else {
            $errors[] = 'Incorrect email or password!';
        }

        $stmt->close();
    } else {
        $errors[] = 'Email and password are required!';
    }
}
?>




<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Moai Reviews</title>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet" />
    <!-- Style -->
    <link rel="stylesheet" href="style/auth.css" />
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/bfff52efaa.js" crossorigin="anonymous"></script>
    <style>
        .container .signup-form .error-msg {
            padding: 7px 0;
            display: block;
            background: var(--color-warning);
            color: var(--color-light);
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="image/auth-picture/logo.png" alt="MOAI Reviews Logo" />
        </div>
        <form class="signup-form" action="" method="post">
            <?php
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo '<span class="error-msg">'.$error.'</span>';
                }
            }
            ?>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input class="email" type="email" name="email" required />
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input class="password" type="password" name="password" required />
            </div>
            <button type="submit" name="signin">Sign in to My Account</button>
            <label for="">Don't have an account?</label>
            <a href="./signup.php">Sign Up</a>
        </form>
    </div>
    <footer>
        <p>&copy; 2024 Moai Reviews. All Rights Reserved.</p>
    </footer>
</body>
</html>

