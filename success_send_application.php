<?php
  require_once 'inc/header.php';
  require_once 'db/conn.php';

  if (isset($_GET['id'])) {
    $co_name = $_POST['co_name'];
    $post_title = $_POST['post_title'];
    $post_description = $_POST['post_description'];
    $co_website = $_POST['co_website'];
    $isSuccess = $crud->insert($co_name, $post_title, $post_description, $co_website);
  }

  if ($isSuccess) {
    header("Location: view_internships_student.php");
  } else {
    echo "didnt work";
  }
?>