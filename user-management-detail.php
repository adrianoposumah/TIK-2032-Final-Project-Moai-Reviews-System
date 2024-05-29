<?php
include 'sidebar_admin.php'; 

if (isset($_GET['id'])) {
    $selected_user_id = $_GET['id'];
    $user = query("SELECT * FROM users WHERE id = '$selected_user_id' LIMIT 1;");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $role = $_POST['role'];

    if (!empty($_FILES['photo']['name'])) {
        $photo = $_FILES['photo'];
    } else {
        $photo = null;
    }

    $update_result = update_user($selected_user_id, $name, $role, $photo);

    if ($update_result) {
        // echo "User information successfully updated.";
        header("Location: user-management.php");
    } else {
        echo "Failed to update user information.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moai Reviews</title>
    <link rel="icon" href="./image/icon.svg">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <!-- Style -->
    <link rel="stylesheet" href="./style/dashboard.css?v=<?php echo time(); ?>">
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/bfff52efaa.js" crossorigin="anonymous"></script>
</head>
<body>
    <aside class="sidebar">
        <div class="logo">
            <img src="./image/auth-picture/logo.png" alt="Moai review logo">
        </div>
        <nav>
            <ul>
                <li class="<?php echo $current_page == 'dashboard.php' ? 'active' : ''; ?>"><a href="./dashboard.php"><i class="fa-solid fa-house"></i><span>Dashboard</span></a></li>
                <li class="<?php echo $current_page == 'film-management.php' ? 'active' : ''; ?>"><a href="./film-management.php"><i class="fa-solid fa-film"></i><span>Film Management</span></a></li>
                <li class="<?php echo $current_page == 'user-management.php' ? 'active' : ''; ?>"><a href="./user-management.php"><i class="fa-solid fa-users-gear"></i><span>User Management</span></a></li>
                <li class="<?php echo $current_page == 'user-information.php' ? 'active' : ''; ?>"><a href="./user-information.php"><i class="fa-solid fa-user"></i><span>My Account</span></a></li>
            </ul>
        </nav>
        <div class="sign-out">
            <a href="logout.php">Sign Out</a>
        </div>
    </aside>

    <div class="container">
        <main class="main-content">
            <header>
                <h1>My Account</h1>
                <div class="nav-right">
                    <a href="./home_admin.php">Home</a>
                    <a href="./categories_admin.php">Categories</a>
                    <div class="user-profile">
                        <img src="./image/user-picture/<?php echo $user_info[0]['photo']; ?>" alt="User Profile">
                    </div>
                </div>
            </header>
            <section>
                <div class="user-info">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-input">
                            <img src="./image/user-picture/<?php echo $user[0]['photo']; ?>" alt="User Picture" class="user-picture">
                            <div class="user-form">
                                <label for="photo">Photo:</label>
                                <input type="file" id="photo" name="photo" >
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" value="<?php echo $user[0]['fullname']; ?>">
                                <label for="role">Role:</label>
                                <select id="role" name="role">
                                    <option value="admin" <?php echo $user[0]['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                                    <option value="user" <?php echo $user[0]['role'] == 'user' ? 'selected' : ''; ?>>User</option>
                                </select>
                            </div>
                            <div class="form-submit">
                                <button type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
