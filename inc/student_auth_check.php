<?php
  if ($_SESSION['role'] != 'student') {
    header("Location: index.php");
  }
?>