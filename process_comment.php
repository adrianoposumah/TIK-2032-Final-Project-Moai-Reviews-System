<?php
require './config/connection.php';
require './config/functions.php';

session_start();

$response = array('success' => '', 'comment_error' => '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $comment = htmlspecialchars($_POST['comment']);
  $film_id = htmlspecialchars($_POST['film_id']);
  $fullname = htmlspecialchars($_POST['fullname']);
  $user_id = $_SESSION['user_id'];

  if (empty($comment)) {
    $response['comment_error'] = 'Comment is required';
  } else {
    $query = "INSERT INTO `comments` (`film_id`, `user_id`, `fullname`, `comment`, `comment_date`) 
              VALUES ('$film_id', '$user_id', '$fullname', '$comment', NOW())";

    if (mysqli_query($conn, $query)) {
      $response['success'] = 'Comment added successfully.';
    } else {
      $response['comment_error'] = 'Failed to add comment.';
    }
  }

  echo json_encode($response);
}
