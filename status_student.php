<?php
  $title = 'status_student';
  require_once 'db/conn.php';
  require_once 'inc/header.php';

  $internship_ids = $read->get_post_ids_for_student($_SESSION['user_id']); // 1, 2
?>

  <main>
    <section class="content-container">
      <h1>Your internships</h1>
      <p style="font-weight: bold;">Filter by status:</p>
      <div class="hashtag-options" onclick="showMembers()">
        <label for="interested" class="hashtag-option">
          <input type="checkbox" checked name="interested" id="interested">
          Interested
        </label>
        <label for="pending" class="hashtag-option">
          <input type="checkbox" checked name="pending" id="pending">
          Pending
        </label>
        <label for="denied" class="hashtag-option">
          <input type="checkbox" checked name="denied" id="denied">
          Denied
        </label>
        <label for="cancelled" class="hashtag-option">
          <input type="checkbox" checked name="cancelled" id="cancelled">
          Cancelled
        </label>
      </div>
      <button id="search-for-internships" style="opacity: 0; height: 0px; margin: 0px;">Search for internships</button>

      <p class="available-internships">
        You showed interest in
        <?php echo count($internship_ids) ?>
        internships:
      </p>
      <section class="list-of-your-internships">
      <?php foreach($internship_ids as $internship_id): ?>
        <?php
          $internship = $read->get_internship_by_id($internship_id['internship_id']);
          $internship_status = $read->get_internship_status_to_user($_SESSION['user_id'], $internship['id']);
        ?>
        
        <!-- ?php if($internship['status'] == 'published') continue ?> -->
        <article class="firma-container">
          <div class="firma" style="position: relative;">
            <h2 class="title-for-job-description">
              <?php echo $internship['post_title'] ?>
            </h2>
            <p class="job-description">
              <?php echo $internship['post_description'] ?>
              <?php if ($internship['post_description'] == '') echo
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
                    <?php if ($internship['ppl_applied'] < 10) echo 'Under 10 people' ?>
                    <?php if ($internship['ppl_applied'] == 10) echo '10 people' ?>
                    <?php if ($internship['ppl_applied'] > 10) echo 'Over 10 people' ?>
                  </strong>
                  have applied
                </div>
              </div>


              <style>
                .publish-decline-button-container {
                  display: flex;
                  align-items: center;
                  justify-content: space-evenly;
                  padding-bottom: 20px;
                }

                .button {
                  padding: 10px 20px;
                  border-radius: 10px;
                  color: white;
                }

                .button:hover {
                  color: lightgrey;                  
                }

                .publish-button {
                  background-color: green;                  
                }
                
                .decline-button {
                  background-color: #583C5A;
                }
                
              </style>


                <!-- SHOULD THIS BE HERE? SHOULD ADMIN HAVE THE POWER TO PUBLISH ARCHIVED POSTS? -> BECAUSE COMPANY IS UNABLE TO??? -->
              <!-- ?php if ($internship['status'] == 'reviewed') { ?>
              <div class="publish-decline-button-container">
                <a href="success/success_publish_internship.php?id=?php echo $internship['id'] ?>" class="publish-button button">
                  Publish
                </a>
                <a href="success/success_decline_internship.php?id=?php echo $internship['id'] ?>" class="decline-button button">
                  Decline
                </a>
              </div>
              ?php } ?> -->


              <?php if ($internship_status['status'] == 'invited') { ?>
                <div class="publish-decline-button-container">
                  <a 
                    href="success/success_accept_student_to_internship.php?i-id=<?php echo $internship_id['internship_id'] ?>&s-id=<?php echo $_SESSION['user_id'] ?>"
                    class="publish-button button"
                  >
                    Accept invitation
                  </a>
                  <a href="success/success_decline_internship.php?id=<?php echo $internship['id'] ?>" class="decline-button button">
                    Decline invitation
                  </a>
                </div>
              <?php } ?>




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
          </style>

          <style>
            .firma:hover .overlay-status {
              display: none;
            }
          </style>

          <div class="overlay-status">
            <div class="overlay-status color">
            <?php echo $internship_status['status'] ?>

              <!-- ?php if ($internship['status'] == 'reviewed') echo 'To be' ?>
              ?php echo $internship['status'] ?> -->
            </div>
          </div>



          </div>
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