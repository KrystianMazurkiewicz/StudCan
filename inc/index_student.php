<?php
  $title = 'view_internships_student';
  require_once 'inc/header.php';
  require_once 'db/conn.php';
  require_once 'inc/header.php';

  $internships = $read->getAllInternships();
  $tags = $read->getAllPossibleTags();
?>

  <main>
    <section class="content-container">
      <!-- <h1>Practical IT-project</h1> -->
      <h1>Available internships</h1>
      <!-- <p>Choose areas you want to work in/with:</p> -->
      <p style="font-weight: bold;">Filter by areas of work:</p>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
        <div class="hashtag-options">
          <?php foreach($tags as $tag): ?>
            <?php if ($tag['name'] == 'admin' || $tag['name'] == 'organization' || $tag['name'] == 'student') {} else { ?>
            <label for="<?php echo $tag['name'] ?>" class="hashtag-option">
              <input type="checkbox" checked name="<?php echo $tag['name'] ?>" id="<?php echo $tag['name'] ?>">
              <?php echo $tag['name'] ?>
            </label>
            <?php } ?>
          <?php endforeach; ?>
        </div>
        <button id="search-for-internships" style="opacity: 0; height: 0px; margin: 0px;">
          Search for internships
        </button>
      </form>
      <p class="available-internships">
        <?php
          $i = 0;
          foreach($internships as $internship):
            if($internship['status'] != 'published') continue;
            $i++;
          endforeach;
          echo $i;
        ?>
        internships are available:
      </p>
      <section>
        <?php foreach($internships as $internship): ?>
          <?php if($internship['status'] != 'published') continue ?>
        <!-- <input type="hidden" name="post_id" value="?php echo $internship['id'] ?>"> -->
        <article class="firma-container">
          <div class="firma" style="position: relative;">
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
                    <?php if($internship['ppl_applied'] < 10) echo 'Under 10 people' ?>
                    <?php if($internship['ppl_applied'] == 10) echo '10 people' ?>
                    <?php if($internship['ppl_applied'] > 10) echo 'Over 10 people' ?>
                  </strong>
                  have applied
                </div>
              </div>
            </div>




          <style>
            .overlay-status {
              position: absolute;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              display: flex;
              align-items: center;
              justify-content: center;
              font-size: 4rem;
            }

            .color {
              background-color: rgba(230, 230, 230, 0.677);
              font-weight: 500;
              text-shadow: 0px 11px 10px grey;
              text-transform: capitalize;
            }

            .firma:hover .overlay-status {
              display: none;
            }
          </style>


          <!-- SHOULD WE HAVE THIS???????? -->
          <!-- SHOULD WE HAVE THIS???????? -->
          <!-- SHOULD WE HAVE THIS???????? -->
          <!-- SHOULD WE HAVE THIS???????? -->
          <!-- SHOULD WE HAVE THIS???????? -->
          <?php if ($internship['status'] == 'archived') { ?>
          <div class="overlay-status">
            <div class="overlay-status color">
              <?php echo $internship['status'] ?>
            </div>
          </div>
          <?php } ?>


          

          </div>
          <a href="success/success_send_application.php?id=<?php echo $internship['id'] ?>">
            <button class="send-application" alt="Send application"></button>
          </a>
        </article>
        <?php endforeach; ?>
      </section>
    </section>
    
    <?php include_once 'inc/feedback_message.php' ?>


  </main>

  <!-- <footer>
    Copyright 2022
  </footer> -->
</body>
</html>