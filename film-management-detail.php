<?php
include 'sidebar_admin.php'; // Ini menyertakan koneksi database

if (isset($_GET['id'])) {
    $film_id = $_GET['id'];

    // Mendapatkan data film dari database
    $film = query("SELECT * FROM `films` WHERE `film_id` = '$film_id' LIMIT 1 ;");

    if (isset($_POST['update'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $release_date = mysqli_real_escape_string($conn, $_POST['release_date']);
        $release_year = mysqli_real_escape_string($conn, $_POST['release_year']);
        $synopsis = mysqli_real_escape_string($conn, $_POST['synopsis']);
        $production = mysqli_real_escape_string($conn, $_POST['production']);
        $director = mysqli_real_escape_string($conn, $_POST['director']);
        $cast = mysqli_real_escape_string($conn, $_POST['cast']);
        $duration = mysqli_real_escape_string($conn, $_POST['duration']);
        $rate = mysqli_real_escape_string($conn, $_POST['rate']);
        $rating = mysqli_real_escape_string($conn, $_POST['rating']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $link = mysqli_real_escape_string($conn, $_POST['link']);

        // Memproses upload file poster
        if ($_FILES['poster']['name']) {
            $poster = mysqli_real_escape_string($conn, $_FILES['poster']['name']);
            $poster_tmp = $_FILES['poster']['tmp_name'];
            move_uploaded_file($poster_tmp, "image/movie-poster/$poster");
        } else {
            $poster = $film[0]['poster'];
        }

        // Memproses upload file banner
        if ($_FILES['banner']['name']) {
            $banner = mysqli_real_escape_string($conn, $_FILES['banner']['name']);
            $banner_tmp = $_FILES['banner']['tmp_name'];
            move_uploaded_file($banner_tmp, "image/movie-banner/$banner");
        } else {
            $banner = $film[0]['banner'];
        }

        // Query update
        $update_query = "UPDATE films SET 
            name = '$name', 
            release_date = '$release_date', 
            release_year = '$release_year', 
            synopsis = '$synopsis', 
            production = '$production', 
            director = '$director', 
            cast = '$cast', 
            duration = '$duration', 
            rate = '$rate', 
            rating = '$rating', 
            country = '$country', 
            type = '$type', 
            status = '$status', 
            link = '$link', 
            poster = '$poster', 
            banner = '$banner' 
            WHERE film_id = '$film_id'";

        if (mysqli_query($conn, $update_query)) {
            // Redirect ke halaman detail film atau halaman daftar film setelah berhasil update
            header("Refresh:0");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Movie</title>
</head>
<body>
    <div class="container">
        <main class="main-content">
            <header>
                <h1>Update Movie [<?php echo htmlspecialchars($film[0]['name']); ?>]</h1>
                <div class="nav-right">
                    <a href="./home_admin.php">Home</a>
                    <a href="./categories_admin.php">Categories</a>
                    <div class="user-profile">
                        <img src="./image/user-picture/<?php echo htmlspecialchars($user_info[0]['photo']); ?>" alt="User Profile" />
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
                                    <img id="poster-chosen-image" src="./image/movie-poster/<?php echo htmlspecialchars($film[0]['poster']); ?>">
                                    <p id="poster-file-name"><?php echo htmlspecialchars($film[0]['poster']); ?></p>
                                </div>
                                <input type="file" name="poster" id="upload-poster">
                                <label for="upload-poster">
                                    <i class="fa-solid fa-upload"></i> &nbsp; Upload Poster
                                </label>
                            </div>
                            <div class="banner-area">
                                <h3 for="banner">Banner: </h3>
                                <div class="film-banner">
                                    <img id="banner-chosen-image" src="./image/movie-banner/<?php echo htmlspecialchars($film[0]['banner']); ?>">
                                    <p id="banner-file-name"><?php echo htmlspecialchars($film[0]['banner']); ?></p>
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
                                    <input type="text" name="name" value="<?php echo htmlspecialchars($film[0]['name']); ?>">
                                </div>
                                <div class="film-genre">
                                    <label for="genre" style="color:red;">Genre: !!!Coming Soon!!!</label>
                                    <div class="genre-option">
                                        <?php
                                        $categories = query("SELECT * FROM `genres`");
                                        foreach ($categories as $category) : ?>
                                            <div class="genre-type">
                                                <input type="checkbox" id="category_<?= htmlspecialchars($category['id']) ?>" name="genres[]" value="<?= htmlspecialchars($category['id']) ?>" disabled>
                                                <label for="category_<?= htmlspecialchars($category['id']) ?>"><?= htmlspecialchars($category['name']) ?></label><br>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="grid2b">
                                <div class="film-date">
                                    <div class="film-dm">
                                        <label for="release_date">Date Release: </label>
                                        <input type="date" name="release_date" value="<?php echo htmlspecialchars($film[0]['release_date']); ?>">
                                    </div>
                                    <div class="film-year">
                                        <label for="release_year">Year: </label>
                                        <input type="text" name="release_year" value="<?php echo htmlspecialchars($film[0]['release_year']); ?>">
                                    </div>
                                </div>
                                <div class="film-synopsis">
                                    <label for="synopsis">Synopsis:</label>
                                    <textarea type="text" name="synopsis"><?php echo htmlspecialchars($film[0]['synopsis']); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="grid3">
                            <div class="grid3a">
                                <div class="film-production">
                                    <label for="production">Production: </label>
                                    <input type="text" name="production" value="<?php echo htmlspecialchars($film[0]['production']); ?>">
                                </div>
                                <div class="film-director">
                                    <label for="director">Director: </label>
                                    <input type="text" name="director" value="<?php echo htmlspecialchars($film[0]['director']); ?>">
                                </div>
                            </div>
                            <div class="grid3b">
                                <div class="film-cast">
                                    <label for="cast">Cast: </label>
                                    <input type="text" name="cast" value="<?php echo htmlspecialchars($film[0]['cast']); ?>">
                                </div>
                                <div class="grid3bc">
                                    <div class="film-duration">
                                        <label for="duration">Duration: </label>
                                        <input type="text" name="duration" value="<?php echo htmlspecialchars($film[0]['duration']); ?>">
                                    </div>
                                    <div class="film-rate">
                                        <label for="rate">Rate:</label>
                                        <input type="text" name="rate" value="<?php echo htmlspecialchars($film[0]['rate']); ?>">
                                    </div>
                                    <div class="film-rating">
                                        <label for="rating">Rating:</label>
                                        <input type="text" name="rating" value="<?php echo htmlspecialchars($film[0]['rating']); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid4">
                            <div class="film-country">
                                <label for="country">Country: </label>
                                <input type="text" name="country" value="<?php echo htmlspecialchars($film[0]['country']); ?>">
                            </div>
                            <div class="film-type">
                                <label for="type">Type: </label>
                                <input type="text" name="type" value="<?php echo htmlspecialchars($film[0]['type']); ?>">
                            </div>
                            <div class="film-status">
                                <label for="status">Status: </label>
                                <input type="text" name="status" value="<?php echo htmlspecialchars($film[0]['status']); ?>">
                            </div>
                            <div class="film-trailer">
                                <label for="link">Trailer: </label>
                                <input type="text" name="link" value="<?php echo htmlspecialchars($film[0]['link']); ?>">
                            </div>
                        </div>
                        <div class="film-button">
                            <button type="submit" name="update">Update Film</button>
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
