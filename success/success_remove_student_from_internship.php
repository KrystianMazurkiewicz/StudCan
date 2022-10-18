<?php
  // $title = 'members';
  require_once '../db/conn.php';
  require_once '../inc/session.php';
  // require_once '../inc/header.php';
    
  // does not check if the company that removes the student is the company that ownes the internship
  if (isset($_GET['s-id']) && isset($_GET['i-id'])) {
    $username = $_GET['s-id'];
    $internship_id = $_GET['i-id'];
    $isSuccess = $update->set_student_status_to_denied_for_internship($username, $internship_id);
  }
  // if (isset($_GET['s-id']) && isset($_GET['i-id']) && $_SESSION['role'] == 'student') {
  //   $username = $_GET['s-id'];
  //   $internship_id = $_GET['i-id'];
  //   $isSuccess = $update->set_student_status_to_denied_for_internship($username, $internship_id);
  // }
  
  // same here
  // if (isset($_SESSION['username']) && isset($_GET['i-id']) && $_SESSION['role'] == 'organization') {
  //   $username = $_SESSION['username'];
  //   $internship_id = $_GET['i-id'];
  //   $isSuccess = $delete->remove_student_from_internship($username, $internship_id);
  // }

  

  if ($isSuccess) {
    if ($_SESSION['role'] == 'student') {
      $_SESSION['feedback_message'] = "You denied the invitation!";
      return header("Location: ../status_student.php");
      
    } else if ($_SESSION['role'] == 'organization') {
      $_SESSION['feedback_message'] = "You denied the invitation!";
      return header("Location: ../students_that_applied.php?id=" . $internship_id);
    }
  } else {
    $_SESSION['feedback_message'] = "Something have failed!";
    if ($_SESSION['role'] == 'student') return header("Location: ../status_student.php");
    if ($_SESSION['role'] == 'organization') return header("Location: ../students_that_applied.php?id=" . $internship_id);
  }
?>