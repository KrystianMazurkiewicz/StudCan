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
        
      </section>
    </section>
  </main>

  <script>
    const list_of_members = document.querySelector(".list-of-members")
    const membersArrayJS = [
      {
        username: "Username",
        role: "Role"
      },
      <?php foreach($users as $user): 
        echo '{
          username: "' . $user['username'] . '",
          role: "' . $user['role'] . '",
        },';
      endforeach ?>
    ];
    
    function showMembers() {
      membersArrayJS.forEach(member => {
        const div = document.createElement('div')
        div.classList.add('column')
      
        const first_row = document.createElement('div')
        first_row.classList.add('row')
        first_row.innerText = member['username']
        div.append(first_row)
        
        const second_row = document.createElement('div')
        second_row.classList.add('row')
        second_row.innerText = member['role']
        div.append(second_row)
        
        list_of_members.append(div)
      })
    }
    showMembers()
  </script>

  <!-- <footer>
    Copyright 2022
  </footer> -->
</body>
</html>