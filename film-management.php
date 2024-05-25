<?php
require './config/connection.php';
require './config/functions.php';


$films = query("SELECT * FROM films");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Moai Reviews</title>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet" />
    <!-- Style -->
    <!-- <link rel="stylesheet" href="./style/dashboard.css" /> -->
    <!-- <link rel="stylesheet" href="./style/style.css" /> -->
    <link rel="stylesheet" href="dashboard.css" />
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/bfff52efaa.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <aside class="sidebar">
      <div class="logo">
        <img src="./image/auth-picture/logo.png" alt="Moai review logo" />
      </div>
      <nav>
        <ul>
          <li><a href="dashboard.php">Film Management</a></li>
          <li class="active"><a href="./film-management.php">Film Management</a></li>
          <li><a href="./user-management.php">User Management</a></li>
          <li><a href="#">My Account</a></li>
        </ul>
      </nav>
      <div class="sign-out">
        <a href="index.html">Sign Out</a>
      </div>
    </aside>
    <div class="container">
      <main class="main-content">
        <header>
          <h1>Dashboard</h1>
          <div class="nav-right">
            <a href="./home_user.php">Home</a>
            <a href="/categories.html">Categories</a>
            <div class="user-profile">
              <img src="./image/user-picture/icon-user.png" alt="User Profile" />
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
<div class="film-container" id="film-container">
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
