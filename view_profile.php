<?php
  $title = 'view_profile';
  require_once 'db/conn.php';
  require_once 'inc/header.php';

  if (isset($_GET['username'])) {
    $result = $read->get_info_about_profile($_GET['username']);
  } else {
    $result = $read->get_info_about_profile($_SESSION['username']);
  }

  $internships = $read->getAllInternships();



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
          <h1><?php echo $result['username'] ?>'s profile</h1>
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
          <?php if (!isset($_GET['username'])) { ?>
          <a href="edit_profile.php" class="edit-button">
            Edit
          </a>
          <?php } ?>
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
      
      <?php 
        if (isset($internship['id'])) {
          $students = $read->get_student_that_is_interested_in_internship($internship['id']);
        ?>
        <section class="list-of-members">
          <h3 style="margin-bottom: 10px;">
            Students interested in this internship:
          </h3>
          <?php if (!$students) echo 'No one applied to this internship yet.'; ?>
          <?php foreach ($students as $student) : ?>
            <!-- ?php echo $student['user_id'] ?> -->
            <div class="column">
              <div class="row">
                <a href="view_profile.php?username=<?php echo $student['username'] ?>">
                  <!-- ?php echo $read->get_username_by_id($student['username'])[0] ?> -->
                </a>
              </div>
              <div class="row">
                <?php echo $student['status'] ?>
              </div>
            </div>
          <?php endforeach ?>
        </section>
      <?php } ?>


      </section>






    </section>
    
    <?php include_once 'inc/feedback_message.php' ?>
  
  
  </main>
</body>
</html>