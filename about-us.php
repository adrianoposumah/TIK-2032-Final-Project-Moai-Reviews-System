<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Our Team</title>

    <!-- Font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    <!-- Style -->
    <!-- <link rel="stylesheet" href="./style/style.css" /> -->
    <link rel="stylesheet" href="./style/about-us.css?v=<?php echo time(); ?>" />

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/bfff52efaa.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="error-container">
      <div class="logo">
        <img src="./image/auth-picture/logo.png" alt="" />
      </div>
      <div class="code-problem">
        <h1>Moai Film Review System Web Application</h1>
      </div>
      <div class="code-text">You Dont Have Permission to Access this Page!</div>
      <a href="./login.php">back to login</a>
    </div>
    <!-- ABOUT-US -->
    <div id="about">
        <div class="container">
            <div class="vision">
                <h1>
                Experience the power of storytelling. <br> Dive into emotions, explore diverse perspectives, <br> and connect with others through the magic of cinema.
                </h1>
            </div>
        </div>
    </div>
    <div id="desc">
        <div class="container">
                <div class="desc-row">
                    <div class="desc-col-1">
                        <img src="image/auth-picture/logo.png" alt="">
                    </div>
                    <div class="desc-col-2">
                        <h2>What is MoaiReview?</h2>
                        <p>At Moai Review, we're dedicated to enhancing your movie-watching experience. Whether you're a cinephile or casual viewer, our platform offers comprehensive reviews, insights, and recommendations on a wide array of films. We aim to cater to diverse tastes and preferences, providing you with the tools and information needed to make informed decisions about your next movie night. Our passion for cinema drives us to curate engaging content that celebrates the art of storytelling and helps you discover hidden gems and cinematic masterpieces. Join us on Moai Review as we embark on a journey to explore the captivating world of movies together.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- THE CREATOR -->
    <div id="creator">
        <div class="container">
            <h1>Created By</h1>
            <div class="wrapper">
                <i id = "left" class="fa-solid fa-angle-left"></i>
                <ul class ="carousel">
                    <li class="card">
                        <div class="img">
                            <img src="image/about-us/Moai officer.jpg" alt="img" draggable = "false">
                        </div>
                        <h2>Adriano Posumah</h2>
                        <span>Developer</span>
                        <div class="social-icons">
                            <a href="https://www.instagram.com/@elroijohanes25/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                            <a href="https://github.com/RaelNation" target="_blank"><i class="fa-brands fa-github"></i></a>
                            <a href="https://facebook.com/Elroi Johanes" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                        </div>
                    </li>
                    <li class="card">
                        <div class="img">
                            <img src="image/about-us/Moai officer.jpg" alt="img" draggable = "false">
                        </div>
                        <h2>Luke Mawuntu</h2>
                        <span>Developer</span>
                        <div class="social-icons">
                            <a href="https://www.instagram.com/@elroijohanes25/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                            <a href="https://github.com/RaelNation" target="_blank"><i class="fa-brands fa-github"></i></a>
                            <a href="https://facebook.com/Elroi Johanes" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                        </div>
                    </li>
                    <li class="card">
                        <div class="img">
                            <img src="image/about-us/Moai officer.jpg" alt="img" draggable = "false">
                        </div>
                        <h2>Hizkia Polii</h2>
                        <span>Developer</span>
                        <div class="social-icons">
                            <a href="https://www.instagram.com/@elroijohanes25/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                            <a href="https://github.com/RaelNation" target="_blank"><i class="fa-brands fa-github"></i></a>
                            <a href="https://facebook.com/Elroi Johanes" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                        </div>
                    </li>
                    <li class="card">
                        <div class="img">
                            <img src="image/about-us/Moai officer.jpg" alt="img" draggable = "false">
                        </div>
                        <h2>Rangian Johanes</h2>
                        <span>Developer</span>
                        <div class="social-icons">
                            <a href="https://www.instagram.com/@elroijohanes25/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                            <a href="https://github.com/RaelNation" target="_blank"><i class="fa-brands fa-github"></i></a>
                            <a href="https://facebook.com/Elroi Johanes" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                        </div>
                    </li>
                </ul>
                <i id="right" class="fa-solid fa-angle-right"></i>
            </div>
        </div>
    
    </div>
    
    <script>
        const carousel = document.querySelector(".carousel");

        let isDragging = false, startX, startScrollLeft;

        const dragStart = (e) => {
            isDragging = true;
            carousel.classList.add("dragging");
            // Records the initial cursor and scroll position of the carousel
            startX = e.pageX;
            startScrollLeft = carousel.scrollLeft;
        }


        const dragging = (e) => {
            if(!isDragging) return; //if isDraggin is false return from here
            // Updates the scroll position of the carousel based on the cursor movement
            carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
        }

        const dragStop = () => {
            isDragging = false;
            carousel.classList.remove("dragging");
        }

        carousel.addEventListener("mousedown", dragStart);
        carousel.addEventListener("mousemove", dragging);
        carousel.addEventListener("mouseup", dragStop);

        const arrowBtns = document.querySelectorAll(".wrapper i");
        const firstCardWidth = carousel.querySelector(".card").offsetWidth;

        arrowBtns.forEach(btn =>
            {
                btn.addEventListener("click", () => {
                    carousel.scrollLeft += btn.id == "left" ? - firstCardWidth : firstCardWidth;      
                })
            }
        )
    </script>

  </body>
  <script src="/script/script.js"></script>
</html>
