<?php
  // $title = 'view_internships_student';
  // include_once 'inc/header.php';
  include_once 'db/conn.php';
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
  <main>
    <section class="content-container">
      <h1>Login</h1>
      <form method="post" action="success_login.php">
        <label>
          Username
          <input required type="text" name="username" placeholder="Type in your username" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username'] ?>">
        </label>
        <label>
          Password
          <input required type="password" name="password" placeholder="Type in your password">
        </label>
        <button type="submit" name="submit">Login</button>
      </form>
    </section>
  </main>
</body>
</html>