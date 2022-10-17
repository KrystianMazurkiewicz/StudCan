<?php
  // $title = 'view_profile';
  $title = 'edit_internship';

  require_once 'db/conn.php';
  require_once 'inc/header.php';

  $result = $read->get_info_about_profile($_SESSION['username']);
?>

  <main>
    <section class="content-container">
      <h1>Edit Your Profile</h1>
      <form method="post" action="success/success_edit_profile.php">
        <label>
          GitHub link
          <input type="text" name="github_lenke" placeholder="Type in your company's name" value="<?php echo $result['github_lenke'] ?>">
        </label>
        <label>
          Mail link
          <input type="text" name="mail_lenke" placeholder="Type in the title of this post" value="<?php echo $result['mail_lenke'] ?>">
        </label>
        <label>
          LinkedIn link
          <input type="text" name="linkedin_lenke" placeholder="Type in the title of this post" value="<?php echo $result['linkedin_lenke'] ?>">
        </label>
        <label>
          Short summary about yourself
          <textarea name="short_about_me" placeholder="Fill in description for the internship" cols="30" rows="10"><?php echo $result['short_about_me'] ?></textarea>
        </label>
        <label>
          About yourself
          <textarea name="about_me" placeholder="Fill in description for the internship" cols="30" rows="10"><?php echo $result['about_me']  ?></textarea>
        </label>
        <button type="submit" name="submit">Edit Your Profile</button>
      </form>
    </section>
  </main>
    
  <?php include_once 'inc/feedback_message.php' ?>

  
</body>
</html>