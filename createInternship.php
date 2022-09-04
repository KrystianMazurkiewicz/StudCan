<?php
  require_once 'inc/header.php';
  require_once 'db/conn.php';
?>

<!-- ?php
  $sql = 'SELECT * FROM internships';
  $result = mysqli_query($conn, $sql);
  $interships = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

?php
  $sql = 'SELECT name FROM tags';
  $result = mysqli_query($conn, $sql);
  $tags = mysqli_fetch_all($result, MYSQLI_ASSOC);
?> -->


  <main>
    <section class="content-container">
      <form method="post" action="success.php">
        <label>
          First name
          <input type="text" name="first_name">
        </label>
        <label>
          Last name
          <input type="text" name="last_name">
        </label>

        <button type="submit" name="submit">Click</button>
      </form>
    </section>
  </main>
</body>
</html>