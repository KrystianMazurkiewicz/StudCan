<?php
  // $title = 'view_profile';
  $title = 'edit_internship';

  require_once 'db/conn.php';
  require_once 'inc/header.php';

  $result = $user->get_info_about_profile($_SESSION['user_id']);
?>

  <main>
    <section class="content-container">
      <h1>Edit Your Profile</h1>
      <form method="post" action="success_edit_profile.php">
        <label>
          GitHub lenken
          <input type="text" name="github_lenke" placeholder="Type in your company's name" value="<?php echo $result['github_lenke'] ?>">
        </label>
        <label>
          mail_lenke
          <input type="text" name="mail_lenke" placeholder="Type in the title of this post" value="<?php echo $result['mail_lenke'] ?>">
        </label>
        <label>
          linkedin_lenke
          <input type="text" name="linkedin_lenke" placeholder="Type in the title of this post" value="<?php echo $result['linkedin_lenke'] ?>">
        </label>
        <label>
          short_about_me
          <textarea name="short_about_me" placeholder="Fill in description for the internship" cols="30" rows="10"><?php echo $result['short_about_me'] ?></textarea>
        </label>
        <label>
          about_me
          <textarea name="about_me" placeholder="Fill in description for the internship" cols="30" rows="10"><?php echo $result['about_me']  ?></textarea>
        </label>
        <button type="submit" name="submit">Edit internship</button>
      </form>
    </section>
  </main>
</body>
</html>