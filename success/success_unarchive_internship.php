<?php
  require_once '../db/conn.php';
  require_once '../inc/session.php';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $isSuccess = $update->unarchive_internship($id);   
  }
  
  if ($isSuccess) {
    $_SESSION['feedback_message'] = "Internship was successfully unarchived!";
    header("Location: ../index2.php");
  } else {
    $_SESSION['feedback_message'] = "Something failed!";
    header("Location: ../index2.php");
  }
?>