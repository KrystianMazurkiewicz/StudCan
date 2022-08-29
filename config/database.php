<?php
  define('DB_HOST', 'localhost');
  define('DB_USER', 'krosh');
  define('DB_PASS', 'krosh');
  define('DB_NAME', 'practicle_it_project');
  
  $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  if ($conn -> connect_error) {
    die('Connection failed' . $conn -> connect_error);
  }

