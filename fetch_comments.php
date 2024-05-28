<?php
require './config/connection.php';



    $comments = query("SELECT comments.*, users.photo, users.fullname 
                      FROM comments 
                      JOIN users ON comments.user_id = users.id 
                      WHERE `film_id` = '$film_id' ORDER BY comment_date DESC");

    foreach ($comments as $comment) {
        echo '<div class="film-user-comment">
                <div class="user-photo">
                    <img src="./image/user-picture/' . $comment['photo'] . '" width="50px" style="border-radius: 50%;" alt="">
                </div>
                <div class="user-comment">
                  <div class="username-comment">' . $comment['fullname'] . '</div>
                  <div class="comment-date">' . $comment['comment_date'] . '</div>
                  <div class="comment">
                    <p>' . htmlspecialchars($comment['comment']) . '</p>
                  </div>
                </div>
              </div>';
    }