<?php
  include_once 'inc/session.php';
  session_destroy();
  header('Location: index.php')
?>