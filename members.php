<?php
  $title = 'members';
  $current_user = "admin";
  require_once 'db/conn.php';
  require_once 'inc/header.php';

  $users = $user->getUsers();
  $tags = $crud->getAllPossibleTags();
?>

  <main>
    <section class="content-container">
      <h1>Member:</h1>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
        <div class="hashtag-options">
          <?php foreach($tags as $tag): ?>
            <label for="<?php echo $tag['name'] ?>" class="hashtag-option">
              <input type="checkbox" name="<?php echo $tag['name'] ?>" id="<?php echo $tag['name'] ?>">
              <?php echo $tag['name'] ?>
            </label>
          <?php endforeach; ?>
        </div>
        <button id="sort-skills">Search students based on skills</button>
      </form>
      <p class="available-internships">37 students:</p>
      <section class="list-of-members">
        <div class="column row-titles">
          <div class="row">Username</div>
          <div class="row">Role</div>
        </div>
        <?php foreach($users as $user): ?>
          <div class="column">
            <div class="row"><?php echo $user['username'] ?></div>
            <div class="row"><?php echo $user['role'] ?></div>
          </div>
        <?php endforeach; ?>
      </section>
    </section>
  </main>

  <!-- <footer>
    Copyright 2022
  </footer> -->
</body>
</html>