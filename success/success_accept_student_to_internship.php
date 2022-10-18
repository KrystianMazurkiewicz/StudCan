<?php
  $title = 'members';
  require_once '../db/conn.php';
  require_once '../inc/session.php';
  // require_once '../inc/header.php';
    
  if (isset($_GET['s-id']) && isset($_GET['i-id'])) {
    $username = $_GET['s-id'];
    $internship_id = $_GET['i-id'];
    $isSuccess = $update->set_student_status_to_accepted_for_internship($username, $internship_id);
  }

  if ($_SESSION['role'] == 'organization') {
    if ($isSuccess) {
      $_SESSION['feedback_message'] = "Student has been accepted!";
      header("Location: ../students_that_applied.php?id=" . $internship_id);
    } else {
      $_SESSION['feedback_message'] = "Something have failed!";
      header("Location: ../students_that_applied.php?id=" . $internship_id);
    }
  }

  if ($_SESSION['role'] == 'student') {
    if ($isSuccess) {
      $_SESSION['feedback_message'] = "You accepted an invitation!";
      header("Location: ../status_student.php");
    } else {
      $_SESSION['feedback_message'] = "Something have failed!";
      header("Location: ../status_student.php");
    }
  }
?>