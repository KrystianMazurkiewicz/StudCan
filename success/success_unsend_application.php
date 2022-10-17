<?php
  require_once '../db/conn.php';
  require_once '../inc/session.php';

  if (isset($_GET['internship_id']) && isset($_GET['username']) ) {
    $internship_id = $_GET['internship_id'];
    $username = $_GET['username'];
    $isSuccess = $delete->delete_application($username, $internship_id);   
  }
  
  if ($isSuccess) {
    $_SESSION['feedback_message'] = "Your application was unsent!";
    header("Location: ../status_student.php");
  } else {
    $_SESSION['feedback_message'] = "Something failed!";
    header("Location: ../status_student.php");
  }
?>