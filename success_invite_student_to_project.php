<?php
  $title = 'members';
  require_once 'db/conn.php';
  require_once 'inc/header.php';
    
  if (isset($_POST['submit'])) {
    $user_username = $_POST['user_username'];
    $post_title = $_POST['post_title'];
    $internship_id = $crud->get_internship_id_from_company_by_post_title($post_title);
    $user_id = $user->get_user_id_by_username($user_username);
    $isSuccess = $crud->insert_invitation_from_company($user_id['id'], $internship_id['id'], 'invited');
  }

  if ($isSuccess) {
    header("Location: members.php");
  } else {
    echo 'Didnt work';
  }
?>