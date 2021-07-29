<?php
  $server = "sql211.epizy.com";
  $username = "epiz_29259386";
  $password = "EhpGQDmbqoPu54";
  $dbname = "epiz_29259386_sunnyspot";

  $link = mysqli_connect($server, $username, $password, $dbname);

  if(!$link){
    die("Connection Failed:".mysqli_connect_error());
  }

?>