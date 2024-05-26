<?php include 'sidebar_admin.php'; ?>
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
        <!-- Content -->
        <section>
            <div class="search-box">
                <form id="search-form">
                    <input type="text" name="search" id="srch" placeholder="Search" />
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
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
                      <?php foreach( $users as $user ) : ?>
                    <tr>
                        <td> 
                        <img src="./image/user-picture/<?= $user['photo'] ?>" alt="Adriano Posumah">
                        </td>
                        <td><?= $user['fullname'] ?>
                        </td>
                        <td><?= $user['role'] ?>
                        </td>
                        <td><?= $user['account_created'] ?>
                        </td>
                        <td>
                        <div class="action-btn">
                          <a href="user-management-detail.php?id=<?=$user['id']?>">
                            <div class="edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                            </div>
                          </a>
                        <div class="delete">
                        <i class="fa-solid fa-trash"></i>
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
  </body>
    <script>
  document.getElementById('srch').addEventListener('input', function() {
    var searchInput = this.value.toLowerCase();
    var filmCards = document.querySelectorAll('.film-card');

    filmCards.forEach(function(card) {
      var filmTitle = card.getAttribute('data-title');
      if (filmTitle.includes(searchInput)) {
        card.style.display = 'block';
      } else {
        card.style.display = 'none';
      }
    });
  });
</script>


</html>
