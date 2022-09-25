<?php
  $title = 'view_profile';
  require_once 'db/conn.php';
  require_once 'inc/header.php';

  if (isset($_GET['id'])) {
    $result = $crud->decline_internship($_GET['id']);
  }

  if ($result) {
    header("Location: not_published_internships.php");
  } else {
    echo 'Something went wrong';
  }
?>