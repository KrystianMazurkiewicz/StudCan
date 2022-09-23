<?php
  $title = 'edit_internship';
  require_once 'inc/header.php';
  require_once 'db/conn.php';


  
  if (isset($_POST['submit'])) {
    $id = $_SESSION['user_id'];
    $github_lenke = $_POST['github_lenke'];
    $mail_lenke = $_POST['mail_lenke'];
    $linkedin_lenke = $_POST['linkedin_lenke'];
    $short_about_me = $_POST['short_about_me'];
    $about_me = $_POST['about_me'];
    $isSuccess = $crud->edit_profile($short_about_me, $github_lenke, $mail_lenke, $linkedin_lenke, $about_me, $id);
  }

  
  if ($isSuccess) {
    header("Location: view_profile.php");
  } else {
    echo "didnt work";
  }
?>