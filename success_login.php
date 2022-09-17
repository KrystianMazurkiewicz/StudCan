<?php
  $title = 'index';
  $current_user = 'student';
  require_once 'inc/header.php';
  require_once 'db/conn.php';

  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $isSuccess = $user->getUser($username, $password);
  }

  if ($isSuccess) {
    // echo 'Username: ' . $isSuccess["username"];
    $_SESSION['username'] = $isSuccess['username'];
    $_SESSION['userid'] = $isSuccess['id'];
    $_SESSION['role'] = $isSuccess['role'];
    header('Location: admin_index.php');

  } else {
    header('Location: index.php');
  }
?>

