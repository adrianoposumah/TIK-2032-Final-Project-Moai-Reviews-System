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
<!-- <div class="film-container" id="film-container">
  <?php foreach( $films as $film ) : ?>
  <div class="film-card" data-title="<?= strtolower($film['name']) ?>">
    <div class="img-poster">
      <img src="./image/movie-poster/<?= $film['poster'] ?>" alt="" />
    </div>
    <div class="poster-action">
      <h4 class="film-title"><?= $film['name'] ?></h4>
      <div class="action-btn">
        <div class="edit">
          <i class="fa-solid fa-pen-to-square"></i>
        </div>
        <div class="delete">
          <i class="fa-solid fa-trash"></i>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div> -->


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
