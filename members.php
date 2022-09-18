<?php
  $title = 'members';
  require_once 'db/conn.php';
  require_once 'inc/header.php';

  $users = $user->getUsers();
  $tags = $crud->getAllPossibleTags();
?>

  <main>
    <section class="content-container">
      <h1>Members</h1>
      <!-- <form action="?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET"> -->
        <div class="hashtag-options" onclick="showMembers()">
          <?php foreach($tags as $tag): ?>
            <label for="<?php echo $tag['name'] ?>" class="hashtag-option">
              <input type="checkbox" checked name="<?php echo $tag['name'] ?>" id="<?php echo $tag['name'] ?>">
              <?php echo $tag['name'] ?>
            </label>
          <?php endforeach; ?>
        </div>
        <!-- <button id="sort-skills" onclick="showMembers()">Search students based on skills</button> -->
      <!-- </form> -->
      <p class="available-internships">37 students:</p>
      <section class="list-of-members">
        
      </section>
    </section>
  </main>

  <script>
    const list_of_members = document.querySelector(".list-of-members")
    const membersArrayJS = [
      // first object sets the titles for each row 
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
    ]

    function buildTable(member) {
      const div = document.createElement('div')
      div.classList.add('column')

      for (let i = 0; i < Object.keys(membersArrayJS[0]).length; i++) {
        const row = document.createElement('div')
        row.classList.add('row')
        row.innerText = member[Object.keys(member)[i]]
        div.append(row)
      }

      list_of_members.append(div)
    }
    
    function showMembers() {
      list_of_members.innerText = ""

      loop1: for (let i = 0; i < membersArrayJS.length; i++) {
        let checkedBoxes = document.querySelectorAll('input:checked')

        for (let j = 0; j < checkedBoxes.length; j++) {
          if (checkedBoxes[j].name == membersArrayJS[i]['role'] || i == 0) {
            buildTable(membersArrayJS[i])
            continue loop1
          }
        }
      }
    }
    showMembers()
  </script>

  <!-- <footer>
    Copyright 2022
  </footer> -->
</body>
</html>