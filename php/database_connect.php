<?php
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'the_garments_club');

  //connect to the main database
  $connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

  //check whether the connection is set or not
  if ($connect === false) {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
