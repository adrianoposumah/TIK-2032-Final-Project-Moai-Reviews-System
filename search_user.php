<?php include 'navbar_user.php'; 

// Ambil parameter pencarian dari URL
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Bersihkan input pencarian untuk menghindari SQL Injection
$search = htmlspecialchars($search);
$search = mysqli_real_escape_string($conn, $search);

// Query untuk mencari film berdasarkan nama yang mirip dengan input pencarian
$query = "SELECT * FROM films WHERE name LIKE '%$search%'";
$results = query($query);
?>
<section>
  <div class="carousel-container">
    <div class="mySlides">
      <div class="film-banner nonslide">
        <img src="./image/default-banner.jpg" style="width: 100%; height: 200px;"/>
      </div>
    </div>
  </div>
</section>
<section class="section-margin">
  <div class="featured">
    <h1>Search Results for "<?php echo $search; ?>"</h1>
    <div class="movie-container">
      <?php foreach($results as $result) : ?>
        <div class="movie-card">
            <a href="film-detail.php?id=<?= $result['film_id'] ?>">
                <img src="image/movie-poster/<?= $result['poster'] ?>" alt="<?= $result['name'] ?>" />
                <h3><?= $result['name'] ?></h3>
                <p><?= $result['release_year'] ?></p>
            </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

</section>
<?php include 'footer.php'; ?>
