<?php 
include 'sidebar_admin.php'; 

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $user = query("SELECT * FROM users WHERE id = '$user_id' LIMIT 1;");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $role = $_POST['role'];
    $photo = $_FILES['photo'];

    if ($photo['error'] == UPLOAD_ERR_OK) {
        $photo_name = basename($photo['name']);
        $target_path = "./image/user-picture/" . $photo_name;
        
        if (move_uploaded_file($photo['tmp_name'], $target_path)) {
            $query = "UPDATE users SET fullname='$name', role='$role', photo='$photo_name' WHERE id='$user_id'";
            $result = query($query);
    } else {
        $query = "UPDATE users SET fullname='$name', role='$role' WHERE id='$user_id'";
        $result = query($query);
    }
  }
}
?>

      <div class="container">
        <main class="main-content">
          <header>
            <h1>My Account</h1>
            <div class="nav-right">
              <a href="./home_admin.php">Home</a>
              <a href="./categories_admin.php">Categories</a>
              <div class="user-profile">
                <img src="./image/movie-poster<?php echo $user_info[0]['photo']; ?>" alt="User Profile" />
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
                    <input type="file" id="photo" name="photo" value="<?php echo $user[0]['photo']; ?>">
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
              </form>
            </div>
          </section>
        </main>
      </div>
    <script>

    </script>

    </html>