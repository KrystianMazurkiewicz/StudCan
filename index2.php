<?php
  require_once 'db/conn.php';
  require_once 'inc/session.php';

  if (!isset($_SESSION['role'])) {
    require_once 'index.php';
    
  } else if ($_SESSION['role'] == 'student') {
    require_once 'inc/index_student.php';
    
  } else if ($_SESSION['role'] == 'organization') {
    require_once 'inc/index_company.php';
    
  } else if ($_SESSION['role'] == 'admin') {
    require_once 'inc/index_admin.php';
  }
?>