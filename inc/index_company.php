<?php
  $title = 'internships_company';
  require_once 'db/conn.php';
  require_once 'inc/header.php';

  $internships = $read->get_company_internships($_SESSION['username']);
  $tags = $read->getAllPossibleTags();
  $users = $read->getUsers();
?>

<main>
  <section class="content-container">
    <h1>Your Company's Internships</h1>
    <p class="available-internships">
      You created <?php echo count($internships) ?> internships:
    </p>

    <style>
      /* .firma-container:hover .people-applied {
        text-decoration: underline !important;
      } */

      .archived {
        opacity: .5;
      }
    </style>

    <section>
      <?php foreach ($internships as $internship) : ?>
        <article class="firma-container">
          <input type="hidden" name="id" value="<?php echo $internship['id'] ?>">
          <div class="firma <?php echo $internship['status'] ?>">
            <h2 class="title-for-job-description">
              <?php echo $internship['post_title'] ?>
              <input type="hidden" name="post_title" value="<?php echo $internship['post_title'] ?>">
            </h2>
            <p class="job-description">
              <?php echo $internship['post_description'] ?>
              <input type="hidden" name="post_description" value="<?php echo $internship['post_description'] ?>">
              <?php if ($internship['post_description'] == '') 
                echo 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam mollitia id nostrum alias voluptatem impedit natus perspiciatis, tenetur asperiores quas voluptas eos ipsam voluptatibus similique iure commodi ratione obcaecati inventore culpa modi provident sequi necessitatibus? Atque, nihil rerum. Voluptatem velit a odit ipsa error maiores distinctio perspiciatis expedita ullam blanditiis hic architecto eligendi quas, debitis, dolor magni corrupti sed atque?';
              ?>
            </p>
            <div class="bottom-section">
              <div class="hashtags">
                <span class="hashtag">CSS</span>
                <span class="hashtag">HTML</span>
              </div>
              <div class="company-and-people-applied">
                <div class="company">
                  Co.:
                  <strong>
                    <a href="<?php echo $internship['co_website'] ?>">
                      <input type="hidden" name="co_website" value="<?php echo $internship['co_website'] ?>">
                      <?php echo $internship['co_name'] ?>
                      <input type="hidden" name="co_name" value="<?php echo $internship['co_name'] ?>">
                    </a>
                  </strong>
                </div>
                <a class="people-applied" href="students_that_applied.php?id=<?php echo $internship['id'] ?>">
                  <span>
                    &#10138; View these 
                  </span>
                  <b>
                    <?php echo count($read->get_student_that_is_interested_in_internship($internship['id'])) ?>
                    people
                  </b>
                  <span class="that-text">
                    that
                  </span>
                  have applied
                </a>
              </div>
              <div class="created-at">
                Created at:
                <strong>20. Feb 2022</strong>
              </div>
              <div class="last-updated">
                Last updated at:
                <strong>22. Feb 2022</strong>
              </div>
              <div class="post-status">
                Status:
                <?php if ($internship['status'] == 'published') { ?>
                <b style="color: green;">
                  Published to students
                </b>
                <?php } ?>
                <?php if ($internship['status'] == 'declined') { ?>
                <b style="color: red;">
                  Declined by admin
                </b>
                <?php } ?>
                <?php if ($internship['status'] == 'reviewed') { ?>
                <b>
                  Being reviewed
                </b>
                <?php } ?>
                <?php if ($internship['status'] == 'archived') { ?>
                <b>
                  Archived
                </b>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="button-container">
            <?php if ($internship['status'] == 'archived') { ?>
              <a
                href="success/success_unarchive_internship.php?id=<?php echo $internship['id'] ?>" 
                class="edit-button"
              >
                Unarchive
              </a>
            <?php } else { ?>
              <a 
                href="edit_internship.php?id=<?php echo $internship['id'] ?>" 
                class="edit-button"
              >
                Edit
              </a>
              <a 
                onclick="return confirm('Are you sure you want to delete this post?')"
                href="success/success_archive_internship.php?id=<?php echo $internship['id'] ?>"
                class="delete-button"
              >
                Archive
              </a>
            <?php } ?>
          </div>
        </article>
      <?php endforeach; ?>
    </section>
  </section>

  <?php include_once 'inc/feedback_message.php' ?>

</main>


<!-- <div class="modal" id="modal">
  <div class="modal-header">
    <div class="title">Students interested in this project:</div>
    <button data-close-button class="close-button">&times;</button>
  </div>
  <div class="modal-body">
    <form method="POST" action="success/success_invite_student_to_project.php">
      <input type="hidden" id="user_username" name="user_username">
      <input type="hidden" id="post_title_input" name="post_title">
      Either accept or remove a student from this project.
      <section class="list-of-members">
        <div class="column">
          <div class="row">a</div>
          <div class="row">admin</div>
        </div>
        ?php foreach ($users as $user) : ?>
          <div class="column">
            <div class="row">?php echo $user['username'] ?></div>
            <div class="row">?php echo $user['role'] ?></div>
          </div>
        ?php endforeach ?>
      </section>
      <button name="submit" type="submit">Invite</button>
    </form>
  </div>
</div>
<div id="overlay"></div>

<script>
  let openModalButtons = document.querySelectorAll('[data-modal-target]')
  let closeModalButtons = document.querySelectorAll('[data-close-button]')
  const overlay = document.getElementById('overlay')

  openModalButtons.forEach(button => {
    button.addEventListener('click', () => {
      const modal = document.querySelector(button.dataset.modalTarget)
      document.getElementById("user_username").value = button.firstChild.innerText
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
</script> -->

<!-- <footer>
    Copyright 2022
  </footer> -->
</body>

</html>