<?php
  // require_once '../inc/header.php';
  require_once '../db/conn.php';
  require_once '../inc/session.php';


  
  if (isset($_POST['submit'])) {
    $username = $_SESSION['username'];
    $github_lenke = $_POST['github_lenke'];
    $mail_lenke = $_POST['mail_lenke'];
    $linkedin_lenke = $_POST['linkedin_lenke'];
    $short_about_me = $_POST['short_about_me'];
    $about_me = $_POST['about_me'];
    $isSuccess = $update->edit_profile($short_about_me, $github_lenke, $mail_lenke, $linkedin_lenke, $about_me, $username);
  }

  if ($isSuccess) {
    $_SESSION['feedback_message'] = "You edited your profile!";
    header("Location: ../view_profile.php");
  } else {
    $_SESSION['feedback_message'] = "Something have failed!";
    header("Location: ../view_profile.php");
  }
?>