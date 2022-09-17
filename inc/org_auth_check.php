<?php
  if ($_SESSION['role'] != 'organization') {
    header("Location: index.php");
  }
?>