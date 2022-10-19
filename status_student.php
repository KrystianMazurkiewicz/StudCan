<?php
  $title = 'status_student';
  require_once 'db/conn.php';
  require_once 'inc/header.php';

  $internship_ids = $read->get_post_ids_for_student($_SESSION['username']); // 1, 2
?>

  <main>
    <section class="content-container">
      <h1>Your internships</h1>
      <p style="font-weight: bold;">Filter by status:</p>
      <div class="hashtag-options" onclick="filterMembers()">
        <label for="accepted" class="hashtag-option">
          <input type="checkbox" checked name="accepted" id="accepted">
          Accepted
        </label>
        <label for="denied" class="hashtag-option">
          <input type="checkbox" checked name="denied" id="denied">
          Denied
        </label>
        <label for="applied" class="hashtag-option">
          <input type="checkbox" checked name="applied" id="applied">
          Applied
        </label>
        <label for="invited" class="hashtag-option">
          <input type="checkbox" checked name="invited" id="invited">
          Invited
        </label>
        <label for="cancelled" class="hashtag-option">
          <input type="checkbox" checked name="cancelled" id="cancelled">
          Cancelled
        </label>
      </div>
      <button id="search-for-internships" style="opacity: 0; height: 0px; margin: 0px;">Search for internships</button>

      <p class="available-internships">
        You are involved in
        <?php echo count($internship_ids) ?>
        internships
      </p>
      <section class="list-of-your-internships">
      <?php foreach($internship_ids as $internship_id): ?>
        <?php
          $internship = $read->get_internship_by_id($internship_id['internship_id']);
          $internship_status = $read->get_internship_status_to_user($_SESSION['username'], $internship['id']);
        ?>
        
        <!-- ?php if($internship['status'] == 'published') continue ?> -->
        <article class="firma-container" data-status="<?php echo $internship_status['status'] ?>">
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



              <?php if ($internship['status'] == 'published' && $internship_status['status'] == 'applied') { ?>
              <div class="publish-decline-button-container">
                <a href="success/success_unsend_application.php?internship_id=<?php echo $internship['id'] ?>&username=<?php echo $_SESSION['username'] ?>" class="publish-button button">
                  Unsend application
                </a>
              </div>
              <?php } ?>


              <?php if ($internship_status['status'] == 'invited') { ?>
                <div class="publish-decline-button-container">
                  <a 
                    href="success/success_accept_student_to_internship.php?i-id=<?php echo $internship_id['internship_id'] ?>&s-id=<?php echo $_SESSION['username'] ?>"
                    class="publish-button button"
                  >
                    Accept invitation
                    <!-- ?php echo $internship_id['internship_id'] ?>
                    ?php echo $internship['id'] ?>
                    jeg er dum -->
                  </a>
                  <a href="success/success_remove_student_from_internship.php?i-id=<?php echo $internship_id['internship_id'] ?>&s-id=<?php echo $_SESSION['username'] ?>" class="decline-button button">
                    Decline invitation
                  </a>
                </div>
              <?php } ?>




            </div>


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



  <script>
    function filterMembers() {
      let allPosts = document.querySelectorAll('[data-status]')
      let checkedBoxes = document.querySelectorAll('input:checked')

      loop1: for (let i = 0; i < allPosts.length; i++) {
        if (checkedBoxes.length == 0) allPosts[i].classList.remove("visible")
        
        for (let j = 0; j < checkedBoxes.length; j++) {  
          allPosts[i].classList.remove("visible")
        
          if (checkedBoxes[j].name == allPosts[i].dataset.status) {
            allPosts[i].classList.add("visible")
            continue loop1
          }
        }
      }
    }

    filterMembers()
  </script>

  <!-- <footer>
    Copyright 2022
  </footer> -->
</body>
</html>