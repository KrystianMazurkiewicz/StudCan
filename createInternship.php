<?php include 'inc/header.php'; ?>

<?php
  $sql = 'SELECT * FROM internships';
  $result = mysqli_query($conn, $sql);
  $interships = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php
  $sql = 'SELECT name FROM tags';
  $result = mysqli_query($conn, $sql);
  $tags = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


  <main>
    <section class="content-container">
      <form action=""></form>
    </section>
  </main>
</body>
</html>