<?php
  require_once 'db/conn.php';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $crud->unarchive_internship($id);   
  }
  
  if ($result) {
    header("Location: internships_company.php");
  } else {
    echo 'Something went wrong';
  }
?>