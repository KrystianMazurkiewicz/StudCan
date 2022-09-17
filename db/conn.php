<?php 
  $dbhost = '127.0.0.1';
  $db = 'practicle_it_project';
  $dbuser = 'krosh';
  $dbpass = 'krosh';
  $dbcharset = 'utf8mb4';

  $dsn = "mysql:host=$dbhost;dbname=$db;charset=$dbcharset";

  try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
  } catch (PDOException $e) {
    throw new PDOException($e->getMessage());
  }

  require_once 'crud.php';
  require_once 'user.php';
  $crud = new crud($pdo);
  $user = new user($pdo);

?>