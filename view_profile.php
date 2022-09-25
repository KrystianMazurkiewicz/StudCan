<?php
  $title = 'view_profile';
  require_once 'db/conn.php';
  require_once 'inc/header.php';

  if (isset($_GET['user_id'])) {
    $result = $user->get_info_about_profile($_GET['user_id']);
  } else {
    $result = $user->get_info_about_profile($_SESSION['user_id']);
  }

  if (!$result) {
    echo 'Something went wrong';
  }
?>

  <main>
    <section class="content-container">
      <section class="top-about-me-section">
        <div class="image-container">
          <img src="images/white-purple-profile-icon.png" alt="">
        </div>
        <div class="short-info-about-user">
          <h1><?php echo $_SESSION['username'] ?>'s profile</h1>
          <p class="short-about-me">
            <?php echo $result['short_about_me'] ?>
          </p>
          <a href="<?php echo $result['github_lenke'] ?>">
            <b>Github.com:</b>  
            <?php echo $result['github_lenke'] ?>
          </a>
          <a href="<?php echo $result['mail_lenke'] ?>">
            <b>Mail.com:</b>
            <?php echo $result['mail_lenke'] ?>
          </a>
          <a href="<?php echo $result['linkedin_lenke'] ?>">
            <b>LinkedIn.com:</b>
            <?php echo $result['linkedin_lenke'] ?>
          </a>
          <a href="edit_profile.php" class="edit-button">
            Edit
          </a>
        </div>
      </section>
      <section class="about-me-section">
        <h2>
          About me
        </h2>
        <div class="about-me-container">
          <?php echo $result['about_me'] ?>
        </div>
      </section>






    </section>
  </main>
</body>
</html>