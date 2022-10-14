<?php
  //require_once 'inc/header.php';
  require_once '../db/conn.php';
  require_once '../inc/session.php';



  
  if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    // $co_name = $_POST['co_name'];
    $post_title = $_POST['post_title'];
    $post_description = $_POST['post_description'];
    $co_website = $_POST['co_website'];
    $isSuccess = $update->edit($id, $_SESSION['username'], $post_title, $post_description, $co_website);
  }

  
  if ($isSuccess) {
    $_SESSION['feedback_message'] = "You edited an internship!";
    header("Location: ../index2.php");
  } else {
    $_SESSION['feedback_message'] = "Something have failed!";
    header("Location: ../index2.php");
  }
?>