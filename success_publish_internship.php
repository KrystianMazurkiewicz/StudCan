<?php
  $title = 'view_profile';
  require_once 'db/conn.php';
  require_once 'inc/header.php';

  if (isset($_GET['id'])) {
    $result = $user->get_info_about_profile($_GET['id']);
  } else {
  }

  if ($result) {
    header("Location: not_published_internships.php");
  } else {
    echo 'Something went wrong';
  }
?>