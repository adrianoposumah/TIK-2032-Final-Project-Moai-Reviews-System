<?php include 'sidebar_admin.php'; ?>
    <div class="container">
      <main class="main-content">
        <header>
          <h1>Film Management</h1>
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
          <div class="header-management">
            <div class="search-box">
              <form id="search-form">
                <input type="text" name="search" id="srch" placeholder="Search" />
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
            <div class="filter">
              <div class="filter-button">
                <select name="genre" id="">
                  <option value="">All</option>
                  <?php foreach($categories as $category) : ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
              <a href="add-film.php">
                <i class="fa-solid fa-plus"></i><span>Add Film</span>
              </a>
            </div>
          </div>
<div class="film-container" id="film-container">
  <?php foreach( $films as $film ) : ?>
  <div class="film-card" data-title="<?= strtolower($film['name']) ?>">
    <div class="img-poster">
    <!-- <div class="buffer">
                  <div class="wave"></div>
                  <div class="wave"></div>
                  <div class="wave"></div>
                  <div class="wave"></div>
                  <div class="wave"></div>
                  <div class="wave"></div>
                  <div class="wave"></div>
                  <div class="wave"></div>
                  <div class="wave"></div>
                  <div class="wave"></div>
                </div> -->
      <img src="./image/movie-poster/<?= $film['poster'] ?>" alt="" />
    </div>
    <div class="poster-action">
      <h4 class="film-title"><?= $film['name'] ?></h4>
      <div class="action-btn">
        <a href="film-management-detail.php?id=<?= $film['film_id'] ?>">
        <div class="edit">
            <i class="fa-solid fa-pen-to-square"></i>
          </div>
        </a>
        <a href="">
          <div class="delete">
            <i class="fa-solid fa-trash"></i>
          </div>
        </a>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
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
