<?php
  require_once '../inc/session.php';
  require_once '../db/conn.php';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($read->get_internship($id)) {
      $isSuccess = $create->insert_applied_internship($_SESSION['username'], $id);
    } else {
      $isSuccess = false;
    }
  }

  if ($isSuccess) {
    $_SESSION['feedback_message'] = "You applied for an internship!";
    header("Location: ../status_student.php");
  } else {
    $_SESSION['feedback_message'] = "Something have failed!";
    header("Location: ../status_student.php");
  }
?>