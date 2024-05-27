<?php include 'sidebar_admin.php'; 

if(isset($_GET['id'])) {
  $film_id = $_GET['id'];


  $film = query("SELECT * FROM `films` WHERE `film_id` = '$film_id' LIMIT 1 ;");
}
?>
    <div class="container">
      <main class="main-content">
        <header>
          <h1><?php echo $film[0]['name']; ?></h1>
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
          <div class="film-field">
            <form action="">           
            <div class="grid1">
              <div class="film-poster">
                <label for="poster">Poster: <?php echo $film[0]['poster']; ?></label>
                <input type="image">
                <img src="./image/movie-poster/<?php echo $film[0]['poster']; ?>" alt="">
              </div>
              <div class="film-banner">
                <label for="banner">Banner: <?php echo $film[0]['banner']; ?></label>
                <input type="image">
                <img src="./image/movie-banner/<?php echo $film[0]['banner']; ?>" alt="">
              </div>
            </div>
            <div class="grid2">
              <div class="grid2a">
                <div class="film-title">
                  <label for="name">Title: </label>
                  <input type="text" value="<?php echo $film[0]['name']; ?>">
                </div>
                <div class="film-genre">
                  <label for="genre">Genre: </label>
                  <div class="genre-option">
                    <?php foreach($categories as $category) : ?>
                      <div class="genre-type">
                        <input type="checkbox" id="category_<?= $category['id'] ?>" name="categories[]" value="<?= $category['id'] ?>">
                        <label for="category_<?= $category['id'] ?>"><?= $category['name'] ?></label><br>
                      </div>
                    <?php endforeach; ?>
                  </div>

                </div>
              </div>
              <div class="grid2b">
                <div class="film-date">
                  <div class="film-dm">
                    <label for="datemonth">Date Release: </label>
                    <input type="date" value="<?php echo $film[0]['release_date']; ?>">
                  </div>
                  <div class="film-year">
                    <label for="year">Year: </label>
                    <input type="year" value="<?php echo $film[0]['release_year']; ?>">
                  </div>
                </div>
                
                <div class="film-synopsis">
                <label for="synopsis">Synopsis:</label>
                  <textarea type="text" value=""><?php echo $film[0]['synopsis']; ?></textarea>
              </div>
              </div>
            </div>
            <div class="grid3">
              <div class="grid3a">
                <div class="film-production">
                  <label for="director">Production: </label>
                  <input type="text" value="<?php echo $film[0]['production']; ?>">
                </div>
                <div class="film-duration">
                  <label for="duration">Duration: </label>
                  <input type="text" value="<?php echo $film[0]['duration']; ?>">
                </div>
              </div>
              <div class="grid3b">
                <div class="film-cast">
                  <label for="cast">Cast: </label>
                  <input type="text" value="<?php echo $film[0]['cast']; ?>">
                </div>
                <div class="grid3bc">
                  <div class="film-director">
                  <label for="datemonth">Director: </label>
                    <input type="text" value="<?php echo $film[0]['director']; ?>">
                </div>
                  <div class="film-rate">
                    <label for="rate">Rate:</label>
                  <input type="text" value="<?php echo $film[0]['rate']; ?>">
                  </div>
                  <div class="film-rating">
                    <label for="rating">Rating:</label>
                  <input type="text" value="<?php echo $film[0]['rating']; ?>">
                  </div>
                  </div>
              </div>
            </div>
              
             </form>
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
document.addEventListener('DOMContentLoaded', function () {
  const genreTypes = document.querySelectorAll('.genre-type input[type="checkbox"]');

  genreTypes.forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
      if (this.checked) {
        this.parentElement.classList.add('checked');
      } else {
        this.parentElement.classList.remove('checked');
      }
    });
  });
});


</script>


</html>
