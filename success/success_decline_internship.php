<?php
  $title = 'view_profile';
  require_once '../db/conn.php';
  require_once '../inc/session.php';
  // require_once '../inc/header.php';


  if (isset($_GET['id'])) {
    $isSuccess = $update->decline_internship($_GET['id']);
  }

  if ($_SESSION['role'] == 'organization') {
    if ($isSuccess) {
      $_SESSION['feedback_message'] = "You declined an internship!";
      header("Location: ../not_published_internships.php");
    } else {
      $_SESSION['feedback_message'] = "Something have failed!";
      header("Location: ../not_published_internships.php");
    }
  }

  // if ($_SESSION['role'] == 'student') {
  //   if ($isSuccess) {
  //     $_SESSION['feedback_message'] = "You declined an invitation!";
  //     header("Location: ../status_student.php");
  //   } else {
  //     $_SESSION['feedback_message'] = "Something have failed!";
  //     header("Location: ../status_student.php");
  //   }
  // }
?>