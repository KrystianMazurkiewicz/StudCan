<?php
  $title = 'index_admin';
  require_once 'inc/header.php';
  require_once 'db/conn.php';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $isSuccess = $crud->get_internship($id);
  }

  if ($isSuccess) {
    $crud->insert_applied_internship($id, $_SESSION['user_id']);
    header("Location: view_internships_student.php");
  } else {
    echo "didnt work";
  }
?>