<?php
  $title = 'view_profile';
  require_once '../db/conn.php';
  require_once '../inc/session.php';
  // require_once '../inc/header.php';

  if (isset($_GET['id'])) {
    $isSuccess = $update->publish_internship($_GET['id']);
  }

  if ($isSuccess) {
    $_SESSION['feedback_message'] = "You published an internship to students!";
    header("Location: ../not_published_internships.php");
  } else {
    $_SESSION['feedback_message'] = "Something have failed!";
    header("Location: ../not_published_internships.php");
  }
?>