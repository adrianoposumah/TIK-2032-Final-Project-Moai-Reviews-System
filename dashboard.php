<?php include 'sidebar_admin.php'; 

$total_film = query("SELECT COUNT(*) as total_film FROM films;");
$total_user = query("SELECT COUNT(*) as total_user FROM users");
$total_genre = query("SELECT COUNT(*) as total_genre FROM genres");
$total_comment = query("SELECT COUNT(*) as total_comment FROM comments");

$total_filmwgenre = query("SELECT g.name as genre_name, COUNT(s.genre_id) AS count FROM genres g LEFT JOIN film_genres s ON g.id = s.genre_id GROUP BY g.id;");

?>
    <div class="container">
      <main class="main-content">
        <header>
          <h1>Dashboard</h1>
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
        <div class="data-count-area">
          <div class="total-card total-film">
            <div class="total-card-item">
              <div class="total-text">
                <h2><?php echo $total_film[0]['total_film']; ?></h2>
                <h4>Total Film</h4>
              </div>
              <i class="fa-solid fa-clapperboard"></i>
            </div>
            </div>
          <div class="total-card total-user">
            <div class="total-card-item">
              <div class="total-text">
                <h2><?php echo $total_user[0]['total_user']; ?></h2>
                <h4>Total User</h4>
            </div>
            <i class="fa-solid fa-users-line"></i>
          </div>
        </div>
        <div class="total-card total-genre">
          <div class="total-card-item">
            <div class="total-text">
              <h2><?php echo $total_genre[0]['total_genre']; ?></h2>
              <h4>Total Genre</h4>
            </div>
            <i class="fa-solid fa-tag"></i>
          </div>
        </div>
        <div class="total-card total-comment">
            <div class="total-card-item">
            <div class="total-text">
              <h2><?php echo $total_comment[0]['total_comment']; ?></h2>
              <h4>Total Comment</h4>
            </div>
            <i class="fa-solid fa-comments"></i>
          </div>
          </div>
        <div class="total-card bargraph-genre">
          <h2>Total Film/Genre</h2>
          <div class="kelasapaya">

            <div class="total-card-item">
            <div class="bar-graph">
                <?php foreach($total_filmwgenre as $count) : ?>
                  <div class="bar" style="height: <?= $count['count']; ?>px;">
                      <div class="bar-<?= $count['genre_name']; ?>" style="height: 100%;"></div>
                      <span><?= $count['count']; ?></span>
                    </div>
                  <?php endforeach; ?>
            </div>
          </div>
          </div>
          </div>
        <div class="total-card barpie-genre">
            <div class="total-card-item">
           
          </div>
          </div>
        <div class="total-card barpie-genre">
            <div class="total-card-item">
           
          </div>
          </div>
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
