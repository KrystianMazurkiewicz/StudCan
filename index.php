<?php
  require_once 'db/conn.php';
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
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    
    main > * {
      transform: scale(5);
    }
  </style>

<!-- TULPESH NEEDS TO BE ABLE TO CHANGE STATUS FOR CERTAIN STUDENTS IF SOMETHING GOES WRONG -->

  <main>
    <section class="content-container">
      <h1>Login</h1>
      <form method="post" action="success/success_login.php">
        <label>
          Username
          <input 
            style="padding: 20px" 
            required 
            type="text" 
            name="username" 
            placeholder="Type in your username" 
            value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username'] ?>"
          >
        </label>
        <!-- <label>
          Password
          <input required type="password" name="password" placeholder="Type in your password">
        </label> -->
        <button type="submit" name="submit" style="width: 100px; height:60px;background:lightblue;">Login</button>
      </form>
    </section>
  </main>
</body>
</html>