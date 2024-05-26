<?php include 'navbar.php'; 

if (isset($_GET['id'])) {
    $genre_id = $_GET['id'];

    $genre_name = query("SELECT name FROM genres WHERE id = '$genre_id' LIMIT 1");

    $genres = query("SELECT films.*
            FROM films
            JOIN film_genres ON films.film_id = film_genres.film_id
            JOIN genres ON film_genres.genre_id = genres.id
            WHERE genres.id = '$genre_id';");
}
?>
<section>
  <div class="carousel-container">
    <div class="mySlides">
      <div class="film-banner">
        <img src="./image/default-banner.jpg" style="width: 100%; height: 200px;"/>
      </div>
    </div>
  </div>
</section>
<section class="section-margin">
  <div class="featured">
    <h1><?php echo $genre_name[0]['name']; ?></h1>
    <div class="movie-container">
      <?php foreach($genres as $genre) : ?>
        <div class="movie-card">
            <a href="film-detail.php?id=<?= $genre['film_id'] ?>">
                <img src="image/movie-poster/<?= $genre['poster'] ?>" alt="<?= $genre['name'] ?>" />
                <h3><?= $genre['name'] ?></h3>
                <p><?= $genre['release_year'] ?></p>
            </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

</section>
<?php include 'footer.php'; ?>
