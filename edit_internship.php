<?php
  $title = 'edit_internship';
  require_once 'db/conn.php';
  require_once 'inc/header.php';
    
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $isSuccess = $read->get_internship($id);
  } else {
    header("Location: ../internships_company.php");
  }
  
  if ($isSuccess) {
    $co_name = $isSuccess[0]['co_name'];
    $post_title = $isSuccess[0]['post_title'];
    $post_description = $isSuccess[0]['post_description'];
    $co_website = $isSuccess[0]['co_website'];
  } else {

  }
?>

  <main>
    <section class="content-container">
      <h1>Edit Internship</h1>
      <form method="post" action="success/success_edit_internship.php">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <!-- <label>
          Company name
          <input type="text" name="co_name" placeholder="Type in your company's name" value="?php echo $co_name ?>">
        </label> -->
        <label>
          Title of the post
          <input type="text" name="post_title" placeholder="Type in the title of this post" value="<?php echo $post_title ?>">
        </label>
        <label>
          Description for the post
          <textarea name="post_description" placeholder="Fill in description for the internship" cols="30" rows="10"><?php echo $post_description ?></textarea>
        </label>
        <label>
          Link to the company's website
          <input type="text" name="co_website" placeholder="Type in the URL of your company's website" value="<?php echo $co_website ?>">
        </label>
        <button type="submit" name="submit">Edit internship</button>
      </form>
    </section>
  </main>
    
  <?php include_once 'inc/feedback_message.php' ?>

</body>
</html>