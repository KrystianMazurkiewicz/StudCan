<?php
  $title = 'index';
  require_once '../db/conn.php';
  // require_once '../inc/header.php';
  require_once '../inc/session.php';

  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $isSuccess = $read->getUser($username, $password);
  }

  if ($isSuccess) {
    $_SESSION['username'] = $isSuccess['username'];
    $_SESSION['user_id'] = $isSuccess['id'];
    $_SESSION['role'] = $isSuccess['role'];
    $_SESSION['feedback_message'] = "";

  } else {
    header('Location: ../index.php');
  }

  if ($_SESSION['role']) {
    header('Location: ../index2.php');
  }
  // if ($_SESSION['role'] == 'admin') {
  //   header('Location: ../index_admin.php');

  // } else if ($_SESSION['role'] == 'organization') {
  //   header('Location: ../internships_company.php'); 
    
  // } else if ($_SESSION['role'] == 'student') {
  //   header('Location: ../view_internships_student.php'); 
  // }
?>

