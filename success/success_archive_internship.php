<?php
  require_once '../inc/session.php';
  require_once '../db/conn.php';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $isSuccess = $update->archive_internship($id);   
  }
  
  if ($isSuccess) {
    $_SESSION['feedback_message'] = "Internship was successfully archived!";
    header("Location: ../index2.php");
  } else {
    $_SESSION['feedback_message'] = "Something have failed!";
    header("Location: ../index2.php");
  }
?>