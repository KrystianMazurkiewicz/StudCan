<?php include 'inc/header.php'; ?>

<?php
  $sql = 'SELECT * FROM internships';
  $result = mysqli_query($conn, $sql);
  $interships = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php
  $sql = 'SELECT name FROM tags';
  $result = mysqli_query($conn, $sql);
  $tags = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


  <main>
    <section class="content-container">
      <h1>Practical IT-project</h1>
      <p>Choose areas you want to work in/with:</p>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
        <div class="hashtag-options">
          <?php foreach($tags as $tag): ?>
            <label for="<?php echo $tag['name'] ?>" class="hashtag-option">
              <input type="checkbox" name="<?php echo $tag['name'] ?>" id="<?php echo $tag['name'] ?>">
              <?php echo $tag['name'] ?>
            </label>
          <?php endforeach; ?>
        </div>
        <button id="search-for-internships">Search for internships</button>
      </form>
      <p class="available-internships">37 interships available:</p>
      <section>
      <?php foreach($interships as $internship): ?>
        <article class="firma-container">
          <div class="firma">
            <h2 class="title-for-job-description">
              <?php echo $internship['job_title'] ?>
            </h2>
            <p class="job-description">
              <?php echo $internship['job_description'] ?>
              <?php if($internship['job_description'] == '') echo
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
                    <?php if($internship['ppl_applied'] > 10) echo 'Under 10 people' ?>
                    <?php if($internship['ppl_applied'] == 10) echo '10 people' ?>
                    <?php if($internship['ppl_applied'] < 10) echo 'Over 10 people' ?>
                  </strong>
                  have applied
                </div>
              </div>
            </div>
          </div>
          <button class="send-application" alt="Send application"></button>
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