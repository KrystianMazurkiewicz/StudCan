<?php
  $title = 'company_internships';
  $current_user = 'company';
  include 'inc/header.php';
?>

<?php
  $sql = 'SELECT * FROM internships';
  $result = mysqli_query($conn, $sql);
  $interships = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


  <main>
    <section class="content-container">
      <h1>Your Company's Internships</h1>
      <p class="available-internships">You have currently <?php echo '2' // this should be dynamically coming from mysql, will be done in the future ?> interships:</p>
      <section>
      <?php foreach($interships as $internship): ?>
        <?php if ($internship['co_name'] != 'Oslomet') continue ?>
        <article class="firma-container">
          <form action="edit_internship.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $internship['id'] ?>">
            <div class="firma">
              <h2 class="title-for-job-description">
                <?php echo $internship['post_title'] ?>
                <input type="hidden" name="post_title" value="<?php echo $internship['post_title'] ?>">
              </h2>
              <p class="job-description">
                <?php echo $internship['post_description'] ?>
                <input type="hidden" name="post_description" value="<?php echo $internship['post_description'] ?>">
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
                        <input type="hidden" name="co_website" value="<?php echo $internship['co_website'] ?>">
                        <?php echo $internship['co_name'] ?>
                        <input type="hidden" name="co_name" value="<?php echo $internship['co_name'] ?>">
                      </a>
                    </strong>
                  </div>
                  <div class="people-applied">
                    <strong>
                      <?php echo $internship['ppl_applied'] . ' people'; ?>
                    </strong>
                    have applied
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
                  <strong>Published To Students</strong>
                </div>
              </div>
            </div>
            <div class="button-container">
              <button class="edit-button" type="submit" name="submit">Edit</button>
              <a onclick="return confirm('Are you sure you want to delete this post?')" href="delete_success.php?id=<?php echo $internship['id'] ?>">
                <button class="delete-button" alt="Send application">Delete</button>
              </a>
            </div>
          </form>
        </article>
        <?php endforeach; ?>
      </section>
    </section>
  </main>

  <!-- <footer>
    Copyright 2022
  </footer> -->
</body>
</html>