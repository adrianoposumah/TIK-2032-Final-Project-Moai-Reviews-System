<?php 
include 'sidebar_admin.php'; // This includes the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $poster = $_FILES['poster']['name'];
    $banner = $_FILES['banner']['name'];
    $synopsis = $_POST['synopsis'];
    $type = $_POST['type'];
    $country = $_POST['country'];
    $rate = $_POST['rate'];
    $rating = $_POST['rating'];
    $release_date = $_POST['release_date'];
    $release_year = $_POST['release_year'];
    $director = $_POST['director'];
    $production = $_POST['production'];
    $cast = $_POST['cast'];
    $link = $_POST['link'];
    $duration = $_POST['duration'];
    $status = $_POST['status'];
    $genres = $_POST['genres']; // Assuming genres is an array of genre_id

    // Upload poster and banner
    $target_dir_poster = "./image/movie-poster/";
    $target_dir_banner = "./image/movie-banner/";
    $target_file_poster = $target_dir_poster . basename($_FILES["poster"]["name"]);
    $target_file_banner = $target_dir_banner . basename($_FILES["banner"]["name"]);

    if (move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file_poster) && move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file_banner)) {
        // Insert into films table
        $sql = "INSERT INTO films (name, poster, banner, synopsis, type, country, rate, rating, release_date, release_year, director, production, cast, link, duration, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssssssssss", $name, $poster, $banner, $synopsis, $type, $country, $rate, $rating, $release_date, $release_year, $director, $production, $cast, $link, $duration, $status);
        
        if ($stmt->execute()) {
            $film_id = $stmt->insert_id; // Get the last inserted film_id
            
            // Insert into film_genres table
            $sql_genre = "INSERT INTO film_genres (film_id, genre_id) VALUES (?, ?)";
            $stmt_genre = $conn->prepare($sql_genre);
            foreach ($genres as $genre_id) {
                $stmt_genre->bind_param("is", $film_id, $genre_id); // Changed 'ii' to 'is'
                $stmt_genre->execute();
            }

            echo "<script>alert('New Film Successfully Added');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
        $stmt_genre->close();
    } else {
        echo "<script>alert('New Film New Succesfully Added');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add new Movie</title>
</head>
<body>
    <div class="container">
        <main class="main-content">
            <header>
                <h1>Add new Movie</h1>
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
                    <form method="post" enctype="multipart/form-data">
                        <div class="grid1">
                            <div class="poster-area">
                                <h3 for="poster">Poster: </h3>
                                <div class="film-poster">
                                    <img id="poster-chosen-image">
                                    <p id="poster-file-name"></p>
                                </div>
                                <input type="file" name="poster" id="upload-poster">
                                <label for="upload-poster">
                                    <i class="fa-solid fa-upload"></i> &nbsp; Upload Poster
                                </label>
                            </div>
                            <div class="banner-area">
                                <h3 for="banner">Banner: </h3>
                                <div class="film-banner">
                                    <img id="banner-chosen-image">
                                    <p id="banner-file-name"></p>
                                </div>
                                <input type="file" name="banner" id="upload-banner">
                                <label for="upload-banner">
                                    <i class="fa-solid fa-upload"></i> &nbsp; Upload Banner
                                </label>
                            </div>
                        </div>
                        <div class="grid2">
                            <div class="grid2a">
                                <div class="film-title">
                                    <label for="name">Title: </label>
                                    <input type="text" name="name">
                                </div>
                                <div class="film-genre">
                                    <label for="genre">Genre: </label>
                                    <div class="genre-option">
                                        <?php
                                        $categories = query("SELECT * FROM `genres`");
                                        foreach ($categories as $category) : ?>
                                            <div class="genre-type">
                                                <input type="checkbox" id="category_<?= $category['id'] ?>" name="genres[]" value="<?= $category['id'] ?>">
                                                <label for="category_<?= $category['id'] ?>"><?= $category['name'] ?></label><br>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="grid2b">
                                <div class="film-date">
                                    <div class="film-dm">
                                        <label for="release_date">Date Release: </label>
                                        <input type="date" name="release_date">
                                    </div>
                                    <div class="film-year">
                                        <label for="release_year">Year: </label>
                                        <input type="text" name="release_year">
                                    </div>
                                </div>
                                <div class="film-synopsis">
                                    <label for="synopsis">Synopsis:</label>
                                    <textarea type="text" name="synopsis"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="grid3">
                            <div class="grid3a">
                                <div class="film-production">
                                    <label for="production">Production: </label>
                                    <input type="text" name="production">
                                </div>
                                <div class="film-director">
                                    <label for="director">Director: </label>
                                    <input type="text" name="director">
                                </div>
                            </div>
                            <div class="grid3b">
                                <div class="film-cast">
                                    <label for="cast">Cast: </label>
                                    <input type="text" name="cast">
                                </div>
                                <div class="grid3bc">
                                    <div class="film-duration">
                                        <label for="duration">Duration: </label>
                                        <input type="text" name="duration">
                                    </div>
                                    <div class="film-rate">
                                        <label for="rate">Rate:</label>
                                        <input type="text" name="rate">
                                    </div>
                                    <div class="film-rating">
                                        <label for="rating">Rating:</label>
                                        <input type="text" name="rating">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid4">
                            <div class="film-country">
                                <label for="country">Country: </label>
                                <input type="text" name="country">
                            </div>
                            <div class="film-type">
                                <label for="type">Type: </label>
                                <input type="text" name="type">
                            </div>
                            <div class="film-status">
                                <label for="status">Status: </label>
                                <input type="text" name="status">
                            </div>
                            <div class="film-trailer">
                                <label for="link">Trailer: </label>
                                <input type="text" name="link">
                            </div>
                        </div>
                        <div class="film-button">
                            <button type="submit" name="update">Add Film</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
    </div>
    <script>
        let uploadPoster = document.getElementById("upload-poster");
        let uploadBanner = document.getElementById("upload-banner");
        let posterchosenImage = document.getElementById("poster-chosen-image");
        let bannerchosenImage = document.getElementById("banner-chosen-image");
        let posterfileName = document.getElementById("poster-file-name");
        let bannerfileName = document.getElementById("banner-file-name");

        uploadPoster.addEventListener("change", function() {
            let file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    posterchosenImage.src = reader.result;
                }
                reader.readAsDataURL(file);
                posterfileName.textContent = file.name;
            }
        });

        uploadBanner.addEventListener("change", function() {
            let file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    bannerchosenImage.src = reader.result;
                }
                reader.readAsDataURL(file);
                bannerfileName.textContent = file.name;
            }
        });

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

        function autoResizeTextarea() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        }
    </script>
</body>
</html>
