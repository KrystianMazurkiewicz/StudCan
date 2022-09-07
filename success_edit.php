<?php
  //require_once 'inc/header.php';
  require_once 'db/conn.php';


  
  if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $co_name = $_POST['co_name'];
    $post_title = $_POST['post_title'];
    $post_description = $_POST['post_description'];
    $co_website = $_POST['co_website'];
    $isSuccess = $crud->edit($id, $co_name, $post_title, $post_description, $co_website);
  }

  
  if ($isSuccess) {
    echo "worked";
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
  <!-- ?php echo $_POST["last_name"] ?>
  ?php echo $_POST["first_name"] ?> -->
</body>
</html>