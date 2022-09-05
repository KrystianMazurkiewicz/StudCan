<?php
  //require_once 'inc/header.php';
  require_once 'db/conn.php';

  if (isset($_POST['submit'])) {
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $isSuccess = $crud->insert($fname, $lname);
  }

  if ($isSuccess) {
    echo "lol";
  } else {
    echo "didnt work";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php echo $_POST["last_name"] ?>
  <?php echo $_POST["first_name"] ?>
</body>
</html>