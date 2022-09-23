<?php
  $title = 'view_profile';
  require_once 'db/conn.php';
  require_once 'inc/header.php';

  $result = $user->get_info_about_profile($_SESSION['user_id']);
?>

  <main>
    <section class="content-container">
      <h1><?php echo $_SESSION['username'] ?>'s profile</h1>
      <img src="images/profile-icon.png" alt="">
      <p>
        <?php echo $_SESSION['username'] ?>
      </p>
      <p class="short-about-me">
        <?php echo $result['short_about_me'] ?>
      </p>
      <a href="<?php echo $result['github_lenke'] ?>">
        Github.com
      </a>
      <a href="<?php echo $result['mail_lenke'] ?>">
        Mail.com
      </a>
      <a href="<?php echo $result['linkedin_lenke'] ?>">
        LinkedIn.com
      </a>

      <div class="edit">
        <a href="edit_profile.php">
          Edit
        </a>
      </div>
    </section>
    <section class="right-side">
      <h2>About me</h2>
      <p>
        <?php echo $result['about_me'] ?>
      </p>
    </section>
  </main>
</body>
</html>