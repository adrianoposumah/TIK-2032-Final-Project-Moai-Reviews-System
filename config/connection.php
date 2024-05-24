<?php
$conn = mysqli_connect("localhost", "root", "020804apip",  "moaireviewsystem");
if (mysqli_connect_errno()) {
  echo "Koneksi database gagal : " . mysqli_connect_error();
}
