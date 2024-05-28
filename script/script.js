//hamburger
const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

// turn into X
hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  navMenu.classList.toggle("active");
});

document.querySelectorAll(".nav-link").forEach((n) =>
  n.addEventListener("click", () => {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
  })
);

//dropdown toggle
const dropdown = document.getElementById("img-dropdown");
const dropdownDisplay = document.getElementById("dropdown-item");
dropdown.addEventListener("click", () => {
  console.log("Mouse hovering over dropdown element");
  dropdownDisplay.style.display = "block";
});

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

function openPage(pageUrl) {
  window.location.href = pageUrl;
}

document.addEventListener("DOMContentLoaded", function () {
  const textarea = document.getElementById("myTextarea");
  textarea.addEventListener("input", autoResizeTextarea);
});

function autoResizeTextarea() {
  this.style.height = "auto";
  this.style.height = this.scrollHeight + "px";
}

function wrapText(tag, attribute = "") {
  const textarea = document.getElementById("myTextarea");
  const startPos = textarea.selectionStart;
  const endPos = textarea.selectionEnd;
  const selectedText = textarea.value.substring(startPos, endPos);
  const replacement = `<${tag} ${attribute}>${selectedText}</${tag}>`;
  textarea.value = textarea.value.substring(0, startPos) + replacement + textarea.value.substring(endPos);
}

function wrapLink() {
  const url = prompt("Enter URL:");
  if (url) {
    wrapText("a", `href="${url}"`);
  }
}

function wrapSpoiler() {
  const textarea = document.getElementById("myTextarea");
  const startPos = textarea.selectionStart;
  const endPos = textarea.selectionEnd;
  const selectedText = textarea.value.substring(startPos, endPos);
  const replacement = `<tes>${selectedText}</tes>`;
  textarea.value = textarea.value.substring(0, startPos) + replacement + textarea.value.substring(endPos);
}

function clearText() {
  document.getElementById("myTextarea").value = "";
}

// AJAX

document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("commentForm").addEventListener("submit", function (event) {
    event.preventDefault();
    save_data();
  });

  function save_data() {
    var form_elements = document.getElementsByClassName("form_data");
    var form_data = new FormData();

    for (var count = 0; count < form_elements.length; count++) {
      form_data.append(form_elements[count].name, form_elements[count].value);
    }

    document.getElementById("submit-comment").disabled = true;

    var ajax_request = new XMLHttpRequest();
    ajax_request.open("POST", "process_comment.php");

    ajax_request.send(form_data);

    ajax_request.onreadystatechange = function () {
      if (ajax_request.readyState == 4 && ajax_request.status == 200) {
        document.getElementById("submit-comment").disabled = false;

        var response = JSON.parse(ajax_request.responseText);

        if (response.success != "") {
          document.getElementById("commentForm").reset();
          document.getElementById("message").innerHTML = response.success;
          setTimeout(function () {
            document.getElementById("message").innerHTML = "";
          }, 5000);

          // Muat komentar terbaru
          fetchComments();
        } else {
          // Display validation error
          document.getElementById("comment_error").innerHTML = response.comment_error;
        }
      }
    };
  }

  function fetchComments() {
    var ajax_request = new XMLHttpRequest();
    ajax_request.open("GET", "fetch_comments.php?film_id=<?= $film_id ?>", true);

    ajax_request.onreadystatechange = function () {
      if (ajax_request.readyState == 4 && ajax_request.status == 200) {
        document.getElementById("comment-section").innerHTML = ajax_request.responseText;
      }
    };

    ajax_request.send();
  }

  // Muat komentar saat halaman pertama kali dimuat
  fetchComments();
});

const question = document.querySelector(".left h2");
const stars = document.querySelectorAll(".fa-star");

const clearActive = () => {
  //remove active class from all stars
  stars.forEach((star) => {
    star.classList.remove("active");
  });
};

const addActive = (star, index) => {
  //add active class to current star
  star.classList.add("active");
  let count = index;

  //add active class to previous star from current start
  while (count > 0) {
    document.getElementById(`star-${count}`).classList.add("active");
    count--;
  }
};

//generate question according to clicked star
const generateQuestion = (index) => {
  if (index === 0) {
    question.innerHTML = `<img src="./image/sad.svg" />`;
  }

  if (index === 1 || index === 2) {
    question.innerHTML = `<img src="./image/meh.svg" />`;
  }

  if (index === 3) {
    question.innerHTML = `<img src="./image/smile.svg" />`;
  }

  if (index === 4) {
    question.innerHTML = `<img src="./image/love.svg" />`;
  }
};

//handle star ratings
stars.forEach((star, index) =>
  star.addEventListener("click", () => {
    clearActive();
    addActive(star, index);
    generateQuestion(index);
  })
);

function updateStatus() {
  const statusLink = document.querySelector(".film-status .content a");
  const statusId = statusLink.id;

  if (statusId === "digital") {
    statusLink.className = "digital";
    statusLink.textContent = "Digital";
  } else if (statusId === "comingsoon") {
    statusLink.className = "comingsoon";
    statusLink.textContent = "Coming Soon";
  } else if (statusId === "air") {
    statusLink.className = "air";
    statusLink.textContent = "On Air";
  }
}

// Panggil fungsi updateStatus setelah DOM siap
document.addEventListener("DOMContentLoaded", updateStatus);
