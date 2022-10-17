<?php 
  $dbhost = '127.0.0.1';
  $db = 'practicle_it_project';
  $dbuser = 'root';
  $dbpass = '';
  $dbcharset = 'utf8mb4';

  $dsn = "mysql:host=$dbhost;dbname=$db;charset=$dbcharset";

  try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
  } catch (PDOException $e) {
    throw new PDOException($e->getMessage());
  }

  require_once 'create.php';
  require_once 'read.php';
  require_once 'update.php';
  require_once 'delete.php';
  $create = new create($pdo);
  $read   = new read($pdo);
  $update = new update($pdo);
  $delete = new delete($pdo);
  
  require_once 'recreate_database.php';
  $recreate_database = new recreate_database($pdo);

?>