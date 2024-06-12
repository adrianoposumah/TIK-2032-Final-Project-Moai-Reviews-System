<?php include 'navbar.php'; ?>
<section>
  <div class="carousel-container">
  <?php foreach($banners as $banner) : ?>
    <div class="mySlides fade">
      <div class="film-banner">
        <img src="./image/movie-banner/<?= $banner['banner'] ?>" style="width: 100%" />
      </div>
      <div class="film-information section-margin">
        <div class="film-title"><?= $banner['name'] ?></div>
        <div class="film-prop">
          <div class="film-year"><?= $banner['release_year'] ?> </div>
          <!-- <div class="film-genre"><?= $banner['genre_name'] ?></div> -->
          <div class="film-type"><?= $banner['type'] ?></div>
        </div>
        <div class="film-synopsis"><?= $banner['synopsis'] ?></div>
      </div>
    </div>
  <?php endforeach; ?>
  </div>
</section>
  <!-- <div class="search-field">
    <form>
      <input type="text" name="search" id="srch" placeholder="Search" />
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div> -->
<section class="section-margin">
  <div class="featured">
    <h1>FEATURED</h1>
    <div class="movie-container">
      <?php foreach($features as $feature) : ?>
      <div class="movie-card">
            <a href="film-detail.php?id=<?= $feature['film_id'] ?>">
                <img src="image/movie-poster/<?= $feature['poster'] ?>" alt="<?= $feature['name'] ?>" />
                <h3><?= $feature['name'] ?></h3>
                <p><?= $feature['release_year'] ?></p>
            </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<section class="section-margin">
  <div class="coming-soon">
    <h1>COMING SOON</h1>
    <div class="movie-container">
      <?php foreach($comingsoons as $comingsoon) : ?>
        <div class="movie-card">
          <a href="film-detail.php?id=<?= $comingsoon['film_id'] ?>">
            <img src="image/movie-poster/<?= $comingsoon['poster'] ?>" alt="<?= $comingsoon['name'] ?>" />
            <h3><?= $comingsoon['name'] ?></h3>
            <p><?= $comingsoon['release_year'] ?></p>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  </div>
</section>
<section class="section-margin">
  <div class="anime">
    <h1>ANIME</h1>
    <div class="movie-container">
      <?php foreach($animes as $anime) : ?>
        <div class="movie-card">
          <a href="film-detail.php?id=<?= $anime['film_id'] ?>">
            <img src="image/movie-poster/<?= $anime['poster'] ?>" alt="<?= $anime['name'] ?>" />
            <h3><?= $anime['name'] ?></h3>
            <p><?= $anime['release_year'] ?></p>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  </div>
</section>
<section class="section-margin">
  <div class="anime">
    <h1>TV-SERIES</h1>
    <div class="movie-container">
      <?php foreach($tvseries as $tvseri) : ?>
        <div class="movie-card">
          <a href="film-detail.php?id=<?= $tvseri['film_id'] ?>">
            <img src="image/movie-poster/<?= $tvseri['poster'] ?>" alt="<?= $tvseri['name'] ?>" />
            <h3><?= $tvseri['name'] ?></h3>
            <p><?= $tvseri['release_year'] ?></p>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  </div>
</section>
<script>
  var slideIndex = 1;
showSlides(slideIndex);

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}

// Auto Slide if you need auto slide, remove the comment "//"
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  slides[slideIndex - 1].style.display = "block";
  setTimeout(showSlides, 10000);
}
</script>
<?php include 'footer.php'; ?>
