<?php
  $title = 'create_internship';
  require_once 'db/conn.php';
  require_once 'inc/header.php';
?>

  <main>
    <section class="content-container">
      <h1>Create an Internship</h1>
      <form method="post" action="success/success_create_internship.php">
        <!-- <label>
          Company name
          <input required type="text" name="co_name" placeholder="Type in your company's name">
        </label> -->
        <label>
          Title of the post
          <input required type="text" name="post_title" placeholder="Type in the title of this post">
        </label>
        <label>
          Description for the post
          <textarea required name="post_description" placeholder="Fill in description for the internship" cols="30" rows="10"></textarea>
        </label>
        <label>
          Link to the company's website
          <input type="text" name="co_website" placeholder="Type in the URL of your company's website">
        </label>
        <button type="submit" name="submit">Create internship</button>
      </form>
    </section>
    
    <?php include_once 'inc/feedback_message.php' ?>

  
  </main>
</body>
</html>