<?php
  $title = 'members';
  require_once 'db/conn.php';
  require_once 'inc/header.php';
    
  if (isset($_GET['s-id']) && isset($_GET['i-id'])) {
    $student_id = $_GET['s-id'];
    $internship_id = $_GET['i-id'];
    $isSuccess = $crud->set_student_status_to_accepted_for_internship($student_id, $internship_id);
  }

  if ($isSuccess) {
    header("Location: students_that_applied.php?id=" . $internship_id);
  } else {
    echo 'Didnt work';
  }
?>