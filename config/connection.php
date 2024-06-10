<?php
$conn = mysqli_connect("us-cluster-east-01.k8s.cleardb.net", "b0bc1b1d32a293", "eede183c",  "heroku_daaf5f01f17dae7");
// $conn = mysqli_connect("localhost", "root", "020804apip",  "moaireviewsystem");
if (mysqli_connect_errno()) {
  echo "Koneksi database gagal : " . mysqli_connect_error();
}
