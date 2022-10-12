<?php
  //require_once 'inc/header.php';
  require_once '../db/conn.php';
  require_once '../inc/session.php';

  if (isset($_POST['submit'])) {
    // $co_name = $_POST['co_name'];
    $post_title = $_POST['post_title'];
    $post_description = $_POST['post_description'];
    $co_website = $_POST['co_website'];
    $isSuccess = $create->insert($_SESSION['username'], $post_title, $post_description, $co_website);
  }

  if ($isSuccess) {
    $_SESSION['feedback_message'] = "You created a new internship!";
    header("Location: ../index2.php");
  } else {
    $_SESSION['feedback_message'] = "Something have failed!";
    header("Location: ../index2.php");
  }
?>