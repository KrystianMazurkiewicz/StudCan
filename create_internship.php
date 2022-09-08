<?php
  $title = 'create_internship';
  $current_user = 'company';
  require_once 'db/conn.php';
  require_once 'inc/header.php';
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
      <h1>Create an Internship</h1>
      <form method="post" action="success.php">
        <label>
          Company name
          <input type="text" name="co_name" placeholder="Type in your company's name">
        </label>
        <label>
          Title of the post
          <input type="text" name="post_title" placeholder="Type in the title of this post">
        </label>
        <label>
          Description for the post
          <textarea name="post_description" placeholder="Fill in description for the internship" cols="30" rows="10"></textarea>
        </label>
        <label>
          Link to the company's website
          <input type="text" name="co_website" placeholder="Type in the URL of your company's website">
        </label>
        <button type="submit" name="submit">Create internship</button>
      </form>
    </section>
  </main>
</body>
</html>