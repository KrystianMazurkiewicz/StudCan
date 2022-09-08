<?php
  $title = 'edit_internship';
  $current_user = 'company';
  require_once 'db/conn.php';
  require_once 'inc/header.php';
    
  if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $co_name = $_POST['co_name'];
    $post_title = $_POST['post_title'];
    $post_description = $_POST['post_description'];
    $co_website = $_POST['co_website'];
  }
?>

  <main>
    <section class="content-container">
      <h1>Edit Internship</h1>
      <form method="post" action="success_edit.php">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <label>
          Company name
          <input type="text" name="co_name" placeholder="Type in your company's name" value="<?php echo $co_name ?>">
        </label>
        <label>
          Title of the post
          <input type="text" name="post_title" placeholder="Type in the title of this post" value="<?php echo $post_title ?>">
        </label>
        <label>
          Description for the post
          <textarea name="post_description" placeholder="Fill in description for the internship" cols="30" rows="10" value="<?php echo $post_description ?>"></textarea>
        </label>
        <label>
          Link to the company's website
          <input type="text" name="co_website" placeholder="Type in the URL of your company's website" value="<?php echo $co_website ?>">
        </label>
        <button type="submit" name="submit">Edit internship</button>
      </form>
    </section>
  </main>
</body>
</html>