<?php
  $title = 'members';
  require_once '../db/conn.php';
  require_once '../inc/session.php';
  // require_once '../inc/header.php';
    
  if (isset($_POST['submit'])) {
    $user_username = $_POST['user_username'];
    $post_title = $_POST['post_title'];
    $internship_id = $read->get_internship_id_from_company_by_post_title($post_title);
    echo $user_username;
    // $user_id = $read->get_user_id_by_username($user_username);
    // echo $user_id;
    $isSuccess = $create->insert_invitation_from_company($user_username, $internship_id['id'], 'invited');
  }

  if ($isSuccess) {
    $_SESSION['feedback_message'] = "You invited a student to an internship!";
    header("Location: ../members.php");
  } else {
    $_SESSION['feedback_message'] = "Something have failed!";
    header("Location: ../members.php");
  }
?>