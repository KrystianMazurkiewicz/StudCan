<?php
  $title = 'internships_company';
  require_once 'db/conn.php';
  require_once 'inc/header.php';

  if(isset($_GET['id'])) {
    $internships = $read->get_internship_by_id($_GET['id']);
    $students = $read->get_student_that_is_interested_in_internship($_GET['id']);
    $tags = $read->getAllPossibleTags();
  } else {
    header("Location: internships_company.php");
  }
?>

  <main>
    <section class="content-container">
      <h1>Your Company's Internship</h1>
      <p class="available-internships">
        Either accept or deny students from participating in this internship:
      </p>
      <section>
        <article class="firma-container">
          <input type="hidden" name="id" value="<?php echo $internships['id'] ?>">
          <div class="firma">
            <h2 class="title-for-job-description">
              <?php echo $internships['post_title'] ?>
              <input type="hidden" name="post_title" value="<?php echo $internships['post_title'] ?>">
            </h2>
            <p class="job-description">
              <?php echo $internships['post_description'] ?>
              <input type="hidden" name="post_description" value="<?php echo $internships['post_description'] ?>">
              <?php if ($internships['post_description'] == '') echo
              'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam mollitia id nostrum alias voluptatem impedit natus perspiciatis, tenetur asperiores quas voluptas eos ipsam voluptatibus similique iure commodi ratione obcaecati inventore culpa modi provident sequi necessitatibus? Atque, nihil rerum. Voluptatem velit a odit ipsa error maiores distinctio perspiciatis expedita ullam blanditiis hic architecto eligendi quas, debitis, dolor magni corrupti sed atque?';
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
                    <a href="<?php echo $internships['co_website'] ?>">
                      <input type="hidden" name="co_website" value="<?php echo $internships['co_website'] ?>">
                      <?php echo $internships['co_name'] ?>
                      <input type="hidden" name="co_name" value="<?php echo $internships['co_name'] ?>">
                    </a>
                  </strong>
                </div>
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
                <b>Published To Students</b>
              </div>
            </div>

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
                /* background-color: #583c5a50; */
                background-color: #583C5A;
                color: white;
                padding: 4px 10px;
                border-radius: 4px;
              }
              
              .button:hover {
                background-color: #78457B;
                color: white;
              }
            </style>

            <section class="list-of-members">
              <h3 style="margin-bottom: 10px;">
                Students interested in this internship:
              </h3>
              <?php foreach ($students as $student) : ?>
                <div class="column">
                  <div class="row">
                    <a href="view_profile.php?username=<?php echo $student['username'] ?>">
                      <?php echo $student['username'] ?>
                    </a>
                  </div>
                  <div class="row">
                    <?php echo $student['status'] ?>
                    <div class="buttons-container">
                      <a 
                        href="success/success_accept_student_to_internship.php?i-id=<?php echo $internships['id'] ?>&s-id=<?php echo $student['username'] ?>" 
                        class="accept-student button"
                      >
                        Accept student
                      </a>
                      <a 
                        href="success/success_remove_student_from_internship.php?i-id=<?php echo $internships['id'] ?>&s-id=<?php echo $student['username'] ?>" 
                        class="remove-student button"
                      >
                        Remove student
                      </a>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
            </section>
          </div>
        </article>
      </section>
    </section>
    
    <?php include_once 'inc/feedback_message.php' ?>

  </main>

  <!-- <footer>
    Copyright 2022
  </footer> -->
</body>
</html>