<?php
  $title = 'view_profile';
  require_once 'db/conn.php';
  require_once 'inc/header.php';

  if (isset($_GET['user_id'])) {
    $result = $user->get_info_about_profile($_GET['user_id']);
  } else {
    $result = $user->get_info_about_profile($_SESSION['user_id']);
  }

  $internships = $crud->getAllInternships();



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

      <section>
      <style>
        .list-of-members {
          width: 98%;
          margin-top: 40px;
          margin-bottom: 20px;
          padding: 10px;
          background-color: #583c5a23 !important;
        }

        .row {
          display: flex;
          align-items: center;
          justify-content: space-between;
        }

        .remove-student {
          margin-left: 10px;
        }

        .button {
          background-color: #583c5a50;
          padding: 4px 10px;
          border-radius: 4px;
        }

        .row {
          text-transform: capitalize; 
        }
      </style>
      
      <?php $students = $user->get_student_that_is_interested_in_internship($internship['id']) ?>

      <section class="list-of-members">
        <h3 style="margin-bottom: 10px;">
          Students interested in this internship:
        </h3>
        <?php if (!$students) echo 'No one applied to this internship yet.'; ?>
        <?php foreach ($students as $student) : ?>
          <!-- ?php echo $student['user_id'] ?> -->
          <div class="column">
            <div class="row">
              <a href="view_profile.php?user_id=<?php echo $student['user_id'] ?>">
                <?php echo $user->get_username_by_id($student['user_id'])[0] ?>
              </a>
            </div>
            <div class="row">
              <?php echo $student['status'] ?>
            </div>
          </div>
        <?php endforeach ?>
      </section>
      </section>






    </section>
  </main>
</body>
</html>