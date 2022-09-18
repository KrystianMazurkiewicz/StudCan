<?php
  $title = 'index';
  require_once 'inc/header.php';
  require_once 'db/conn.php';

  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $isSuccess = $user->getUser($username, $password);
  }

  if ($isSuccess) {
    $_SESSION['username'] = $isSuccess['username'];
    $_SESSION['user_id'] = $isSuccess['id'];
    $_SESSION['role'] = $isSuccess['role'];

  } else {
    header('Location: index.php');
  }

  if ($_SESSION['role'] == 'admin') {
    header('Location: index_admin.php');

  } else if ($_SESSION['role'] == 'organization') {
    header('Location: internships_company.php'); 
    
  } else if ($_SESSION['role'] == 'student') {
    header('Location: view_internships_student.php'); 
  }
?>

