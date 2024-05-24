<?php
require './config/connection.php';
require './config/functions.php';

$categories = query("SELECT * FROM `genres`");
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
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="./style/style.css" />

    <script src="https://kit.fontawesome.com/bfff52efaa.js" crossorigin="anonymous"></script>
  </head>

  <body>
    <header>
      <div class="navbar">
        <div class="navbar-logo">
          <img src="./image/logo.svg" alt="Moaireviews logo" />
        </div>
        <div class="navbar-right">
          <div class="navbar-list">
            <ul>
              <li><a href="./index.php">Home</a></li>
              <li><a href="./categories.php">Categories</a></li>
              <li><a href="./signup.php">Sign up</a></li>
              <li class="signin"><a href="./login.php">Sign in</a></li>
            </ul>
          </div>
          <div class="menu">
            <label for="chk1">
              <i class="fa fa-bars"></i>
            </label>
          </div>
          <div class="search-box">
            <form>
              <input type="text" name="search" id="srch" placeholder="Search" />
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </div>
      </div>
    </header>