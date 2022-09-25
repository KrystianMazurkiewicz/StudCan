<?php
  $title = 'index_admin';
  require_once 'db/conn.php';
  require_once 'inc/header.php';

  $internships = $crud->getAllInternships();
  // $students = $user->get_student_that_is_interested_in_internship();
  $tags = $crud->getAllPossibleTags();

?>

  <main>
    <section class="content-container">
      <h1>Practical IT-project</h1>
      <p>Choose areas you want to work in/with:</p>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
        <div class="hashtag-options">
          <?php foreach($tags as $tag): ?>
            <label for="<?php echo $tag['name'] ?>" class="hashtag-option">
              <input type="checkbox" checked name="<?php echo $tag['name'] ?>" id="<?php echo $tag['name'] ?>">
              <?php echo $tag['name'] ?>
            </label>
          <?php endforeach; ?>
        </div>
        <button id="search-for-internships" style="opacity: 0;">Search for internships</button>
      </form>
      <p class="available-internships">
      <?php
        $i = 0;
        foreach($internships as $internship):
          if ($internship['status'] == 'published') $i++;
        endforeach;
      ?>
      <?php echo $i ?> internships are published:
      </p>
      <section>
      <?php foreach($internships as $internship): ?>
        <?php if($internship['status'] != 'published') continue ?>
        <article class="firma-container">
          <div class="firma">
            <h2 class="title-for-job-description">
              <?php echo $internship['post_title'] ?>
            </h2>
            <p class="job-description">
              <?php echo $internship['post_description'] ?>
              <?php if($internship['post_description'] == '') echo
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
                    <a href="<?php echo $internship['co_website'] ?>">
                      <?php echo $internship['co_name'] ?>
                    </a>
                  </strong>
                </div>
                <div class="people-applied">
                  <strong>
                    <?php echo $internship['ppl_applied'] ?>
                  </strong>
                  have applied
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

            </div>
          </div>
          <!-- <button class="send-application" alt="Send application"></button> -->
        </article>
        <?php endforeach; ?>
        </section>
      </section>
    </section>
  </main>

  <!-- <footer>
    Copyright 2022
  </footer> -->
</body>
</html>