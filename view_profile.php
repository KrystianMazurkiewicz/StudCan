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
          <?php
            if (isset($_GET['username'])) {
              $this_users_role = $read->get_user_role_by_username($_GET['username']);
            }

            if (isset($_GET['username']) && $this_users_role['role'] == 'student') { 
          ?>
          <a class="edit-button" data-username="<?php echo $_GET['username'] ?>" data-modal-target="#modal">
            Invite student
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
  
    <?php if ($_SESSION['role'] == 'organization') { ?>
    <div class="modal" id="modal">
      <div class="modal-header">
        <div class="title">Invite student</div>
        <button data-close-button class="close-button">&times;</button>
      </div>
      <div class="modal-body">
        <form method="POST" action="success/success_invite_student_to_project.php">
          <input type="hidden" id="user_username" name="user_username">
          <input type="hidden" id="post_title_input" name="post_title">
          Choose project you want the student to get invited to:
          <select id="post_title" <?php if ($_SESSION['role'] == 'organization') {  echo 'onclick="doSome()"'; } ?>>
            <?php foreach($internships as $internship): ?>
              <?php if ($internship['status'] != 'published') continue ?>
              <option value="<?php echo $internship['post_title'] ?>"><?php echo $internship['post_title'] ?></option>
            <?php endforeach ?>
          </select>
          <button name="submit" type="submit">Invite student</button>
        </form>
      </div>
    </div>
    <div id="overlay"></div>
    <?php } ?>
    
  
  </main>


  <script>
    <?php if ($_SESSION['role'] == 'organization') { ?>
    let openModalButtons = document.querySelectorAll('[data-modal-target]')
    let closeModalButtons = document.querySelectorAll('[data-close-button]')
    const overlay = document.getElementById('overlay')

    openModalButtons.forEach(button => {
      button.addEventListener('click', () => {
        const modal = document.querySelector(button.dataset.modalTarget)
        // document.getElementById("user_username").value = button.innerText.split(' ')[0]
        document.getElementById("user_username").value = button.dataset.username
        openModal(modal)
      })
    })

    overlay.addEventListener('click', () => {
      const modals = document.querySelectorAll('.modal.active')
      modals.forEach(modal => {
        closeModal(modal)
      })
    })

    closeModalButtons.forEach(button => {
      button.addEventListener('click', () => {
        const modal = button.closest('.modal')
        closeModal(modal)
      })
    })

    function openModal(modal) {
      if (modal == null) return
      modal.classList.add('active')
      overlay.classList.add('active')
    }

    function closeModal(modal) {
      if (modal == null) return
      modal.classList.remove('active')
      overlay.classList.remove('active')
    }
    <?php } ?>
  </script>
</body>
</html>