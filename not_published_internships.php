<?php
  $title = 'not_published_internships';
  require_once 'db/conn.php';
  require_once 'inc/header.php';

  $internships = $read->getAllInternships();
  // $students = $read->get_student_that_is_interested_in_internship();
  $tags = $read->getAllPossibleTags();

?>

  <main>
    <section class="content-container">
      <h1>Practical IT-project</h1>
      <!-- <p>Choose areas you want to work in/with:</p>
      <form action="?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
        <div class="hashtag-options">
          ?php foreach($tags as $tag): ?>
            <label for="?php echo $tag['name'] ?>" class="hashtag-option">
              <input type="checkbox" checked name="?php echo $tag['name'] ?>" id="?php echo $tag['name'] ?>">
              ?php echo $tag['name'] ?>
            </label>
          ?php endforeach; ?>
        </div>
        <button id="search-for-internships" style="opacity: 0;">Search for internships</button> -->
      </form>
      <p class="available-internships">
      <?php
        $i = 0;
        foreach($internships as $internship):
          if ($internship['status'] != 'published') $i++;
        endforeach;
      ?>
      <?php echo $i ?> internships are not published:
      </p>
      <section>
      <?php foreach($internships as $internship): ?>
        <?php if($internship['status'] == 'published') continue ?>
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
                    <?php echo $internship['ppl_applied'] ?>
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
              <?php if ($internship['status'] == 'reviewed') { ?>
              <div class="publish-decline-button-container">
                <a href="success/success_publish_internship.php?id=<?php echo $internship['id'] ?>" class="publish-button button">
                  Publish this internship
                </a>
                <a href="success/success_decline_internship.php?id=<?php echo $internship['id'] ?>" class="decline-button button">
                  Decline this internship
                </a>
              </div>
              <?php } ?>

            </div>

          <style>
            .overlay-status {
              position: absolute;
              /* background-color: rgba(128, 128, 128, 0.477); */
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
              text-shadow:  2px 7px 5px rgba(0,0,0,0.3), 
                            0px -4px 10px rgba(255,255,255,0.3);

              text-shadow:  0 2px 1px #747474, 
                            -1px 3px 1px #767676, 
                            -2px 5px 1px #787878, 
                            -3px 7px 1px #7a7a7a,
                            -4px 9px 1px #7f7f7f,
                            -5px 11px 1px #838383,
                            -6px 13px 1px #878787,
                            -7px 15px 1px #8a8a8a, 
                            -8px 17px 1px #8e8e8e,
                            -9px 19px 1px #949494,
                            -10px 21px 1px #989898,
                            -11px 23px 1px #9f9f9f,
                            -12px 25px 1px #a2a2a2, 
                            -13px 27px 1px #a7a7a7,
                            -14px 29px 1px #adadad,
                            -15px 31px 1px #b3b3b3,
                            -16px 33px 1px #b6b6b6,
                            -17px 35px 1px #bcbcbc, 
                            -18px 37px 1px #c2c2c2,
                            -19px 39px 1px #c8c8c8,
                            -20px 41px 1px #cbcbcb,
                            -21px 43px 1px #d2d2d2,
                            -22px 45px 1px #d5d5d5, 
                            -23px 47px 1px #e2e2e2,
                            -24px 49px 1px #e6e6e6,
                            -25px 51px 1px #eaeaea,
                            -26px 53px 1px #efefef;
              text-shadow:  0 2px 2px #dfdfdf, 
                            -2px 5px 1px #b8b8b8, 
                            -4px 8px 0px #979797, 
                            -6px 11px 0px #747474,
                            -8px 14px 0px #565656,
                            -10px 17px 0px #343434,
                            -12px 20px 0px #171717,
                            -14px 23px 0px #000;

              text-shadow: 3px 0px 7px grey, -3px 0px 7px grey, 0px 4px 7px grey;
              text-shadow: 0px 11px 10px grey;
              text-transform: capitalize;
            }
          </style>

          <style>
            /* .overlay-status { */
              /* transition: 500ms; */
            /* } */

            .firma:hover .overlay-status {
              /* animation: background-color-animation 200ms forwards; */
              display: none;
            }

            @keyframes background-color-animation {
              to {background-color: transparent;}
            }
          </style>

          <div class="overlay-status">
            <div class="overlay-status color">
              <?php if ($internship['status'] == 'reviewed') echo 'To be' ?>
              <?php echo $internship['status'] ?>
            </div>
          </div>



          </div>
        </article>
        <?php endforeach; ?>
        </section>
      </section>
    </section>
    
    <?php include_once 'inc/feedback_message.php' ?>

  </main>

  <!-- <footer>
    Copyright 2022
  </footer> -->
</body>
</html>