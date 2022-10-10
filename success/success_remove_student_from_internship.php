<?php
  $title = 'members';
  require_once '../db/conn.php';
  require_once '../inc/session.php';
  // require_once '../inc/header.php';
    
  // does not check if the company that removes the student is the company that ownes the internship
  if (isset($_GET['s-id']) && isset($_GET['i-id']) && $_SESSION['role'] == 'organization') {
    $student_id = $_GET['s-id'];
    $internship_id = $_GET['i-id'];
    $isSuccess = $update->set_student_status_to_denied_for_internship($student_id, $internship_id);
  }
  
  // same here
  if (isset($_SESSION['user_id']) && isset($_GET['i-id']) && $_SESSION['role'] == 'student') {
    $student_id = $_SESSION['user_id'];
    $internship_id = $_GET['i-id'];
    $isSuccess = $delete->remove_student_from_internship($student_id, $internship_id);
  }


  if ($isSuccess) {
    if ($_SESSION['role'] == 'organization') return header("Location: ../students_that_applied.php?id=" . $internship_id);
    if ($_SESSION['role'] == 'student') return header("Location: ../status_student.php");
  } else {
    echo 'Didnt work';
  }
?>