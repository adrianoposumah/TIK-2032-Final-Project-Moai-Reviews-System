<?php
require 'config/connection.php'; // This includes the database connection

if (isset($_GET['id'])) {
    $film_id = $_GET['id'];

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Delete from film_genres table first
        $sql_genres = "DELETE FROM film_genres WHERE film_id = ?";
        $stmt_genres = $conn->prepare($sql_genres);
        $stmt_genres->bind_param("i", $film_id);

        if ($stmt_genres->execute()) {
            // Delete from films table
            $sql = "DELETE FROM films WHERE film_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $film_id);

            if ($stmt->execute()) {
                // Commit the transaction
                $conn->commit();

                // Redirect to the film list page after deletion
                header("Location: film-management.php");
                echo "<script>alert('Film Deleted');</script>";
                exit();
            } else {
                // Rollback the transaction if deletion from films table fails
                $conn->rollback();
                echo "Error deleting record from films: " . $conn->error;
            }
        } else {
            // Rollback the transaction if deletion from film_genres table fails
            $conn->rollback();
            echo "Error deleting record from film_genres: " . $conn->error;
        }

        $stmt->close();
        $stmt_genres->close();
    } catch (Exception $e) {
        // Rollback the transaction in case of any exception
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No film ID specified.";
}