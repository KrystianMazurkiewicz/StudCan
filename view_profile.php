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
          <img src="images/profile-icon.png" alt="">
        </div>
        <div class="short-info-about-user">
          <h1><?php echo $_SESSION['username'] ?>'s profile</h1>
          <!-- <p>
            ?php echo $_SESSION['username'] ?>
          </p> -->
          
          <p class="short-about-me">
            <?php echo $result['short_about_me'] ?>
          </p>


          <a href="<?php echo $result['github_lenke'] ?>">
            Github.com: 
            <?php echo $result['github_lenke'] ?>
          </a>

          <a href="<?php echo $result['mail_lenke'] ?>">
            Mail.com:
            <?php echo $result['mail_lenke'] ?>
          </a>

          <a href="<?php echo $result['linkedin_lenke'] ?>">
            LinkedIn.com:
            <?php echo $result['linkedin_lenke'] ?>
          </a>

          <a href="edit_profile.php">
            Edit
          </a>

        </div>
      </section>



      <div class="edit">
      </div>
    </section>



    <!-- <section class="right-side">
      <h2>About me</h2>
      <p>
        ?php echo $result['about_me'] ?>
      </p>
    </section> -->
  </main>
</body>
</html>