<?php
// test if we are working locally (on XAMPP)
  if ($_SERVER['HTTP_HOST'] == '192.168.64.2' || $_SERVER['HTTP_HOST'] == 'localhost') {
      $database = "sunnySpotIndigo13";
      $username = "root";
      $password = "";
  }
// if we are not we will use our infoweb login information
  else {
    $database = "indigo13_sunnyspot";
    $username = "indigo13";
    $password = "number73";
  }
// Now use the relevant details to connect to the database
      $link = mysqli_connect("localhost", $username, $password, $database);
        if (!$link) {
          exit ("Connection error: ". mysqli_connect_error());
        }
?>