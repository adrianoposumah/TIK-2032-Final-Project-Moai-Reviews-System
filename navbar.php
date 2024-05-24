<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Awesome CSS Responsive Navigation menus </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="style/navbar.css">
</head>

<body>
  <header>
    <input type="checkbox" name="" id="chk1">
    <div class="navbar-logo">
      <img src="image/logo.svg" alt="Moaireviews logo">
    </div>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Categories</a></li>
      <li><a href="#">Sign up</a></li>
      <li class="signin"><a href="#">Sign in</a></li>
    </ul>
    <div class="menu">
      <label for="chk1">
        <i class="fa fa-bars"></i>
      </label>
    </div>
    <div class="search-box">
      <form>
        <input type="text" name="search" id="srch" placeholder="Search">
        <button type="submit"><img src="image/search.png" alt="Search"></button>
      </form>
    </div>
  </header>
</body>

</html>