<?php
include 'sidebar_admin.php';

// Proses penghapusan pengguna
if (isset($_POST['delete_user_id'])) {
    $user_id = $_POST['delete_user_id'];
    
    $delete_query = "DELETE FROM users WHERE id = ?";
    if ($stmt = $conn->prepare($delete_query)) {
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $stmt->close();
        echo "<script>alert('User deleted successfully');</script>";
        header("Refresh:0");
    } else {
        echo "<script>alert('Failed to delete user');</script>";
        header("Refresh:0");
    }
}
?>

<div class="container">
    <main class="main-content">
        <header>
            <h1>User Management</h1>
            <div class="nav-right">
                <a href="./home_admin.php">Home</a>
                <a href="./categories_admin.php">Categories</a>
                <div class="user-profile">
                    <img src="./image/user-picture/<?php echo $user_info[0]['photo']; ?>" alt="User Profile" />
                </div>
            </div>
        </header>
        <section>
            <div class="header-management">
                <div class="search-box">
                    <form id="search-form">
                        <input type="text" name="search" id="srch" placeholder="Search" />
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="filter">
                    <div class="filter-button">
                        <select name="genre" id="">
                            <option value="">Filter</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="user-table">
                <table>
                    <thead>
                        <tr>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Account Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><img src="./image/user-picture/<?= $user['photo'] ?>" alt="User Picture"></td>
                            <td><?= $user['fullname'] ?></td>
                            <td><?= $user['role'] ?></td>
                            <td><?= $user['account_created'] ?></td>
                            <td>
                                <div class="action-btn">
                                    <a href="user-management-detail.php?id=<?= $user['id'] ?>">
                                        <div class="edit"><i class="fa-solid fa-pen-to-square"></i></div>
                                    </a>
                                    <form method="post" style="display:inline;">
                                        <input type="hidden" name="delete_user_id" value="<?= $user['id'] ?>">
                                        <button type="submit" style="background: none; border: none; padding: 0;">
                                            <div class="delete"><i class="fa-solid fa-trash"></i></div>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</div>

<script>
document.getElementById('srch').addEventListener('input', function() {
    var searchInput = this.value.toLowerCase();
    var userRows = document.querySelectorAll('tbody tr');

    userRows.forEach(function(row) {
        var userName = row.cells[1].textContent.toLowerCase();
        if (userName.includes(searchInput)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>

</html>
