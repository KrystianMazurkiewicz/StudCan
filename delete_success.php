<?php
  require_once 'db/conn.php';

  if (!isset($_GET['id'])) {
    header("Location: company_internships.php");
    
  } else {
    $id = $_GET['id'];
    $result = $crud->delete($id);
    
    if ($result) {
      header("Location: company_internships.php");
    } else {

    }
  }
?>