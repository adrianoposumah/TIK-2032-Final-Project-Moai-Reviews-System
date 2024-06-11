    <footer>
      <div class="footer-content">
        <div class="logo">
          <img src="./image/auth-picture/logo.png" alt="" />
        </div>
        <div class="categories">
          <h4>Categories</h4>
          <div class="columns">
            <ul>
              <?php foreach ($categories as $category) : ?>
                <li><a href="categories-detail.php?id=<?= $category['id'] ?>"><?= $category['name'] ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="bottom-area">
          <div class="copyright">
            <p>2024 Copyright All Rights Reserved</p>
          </div>
          <div class="about">
            <a href="./about-us.php">
              <p>About Us</p>
            </a>
            <button onclick="topFunction()" id="myBtn" title="Go to top">
              <i class="fa-solid fa-chevron-up"></i>
            </button>
          </div>
        </div>
      </div>
    </footer>

  </body>
  <!-- <script src="script.js"></script> -->
  <script src="./script/script.js?v=<?php echo time(); ?>"></script>
    <script>
      // Get the button:
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
    </script>



</html>
