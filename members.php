<?php
  $title = 'members';
  require_once 'db/conn.php';
  require_once 'inc/header.php';

  $users = $read->getUsers();
  $internships = $read->get_company_internships($_SESSION['username']);
  // $tags = $read->getAllPossibleTags();
?>

<!-- ?php if ($_SESSION['role'] == 'organization') { ?> -->
  <style>
    /* .column:not(:nth-child(1)):hover .row:nth-child(1) {
      text-decoration: underline;
    } */
    .underline:hover {
      cursor: pointer;
      text-decoration: underline;
    }
    </style>
<!-- ?php } ?> -->



  <main>
    <section class="content-container">
      <h1>Members</h1>
      <p style="font-weight: bold;">Filter by member type:</p>
      <!-- <div class="hashtag-options" onclick="filterMembers(clicked = true)">
        ?php foreach($tags as $tag): ?>
          ?php if ($tag['id'] < 13) continue ?>
          <label for="?php echo $tag['name'] ?>" class="hashtag-option">
            <input type="checkbox" checked name="?php echo $tag['name'] ?>" id="?php echo $tag['name'] ?>">
            ?php echo $tag['name'] ?>
          </label>
        ?php endforeach ?>
      </div> -->

      <div class="hashtag-options" onclick="filterMembers(clicked = true)">
        <label for="admin" class="hashtag-option">
          <input type="checkbox" checked="" name="admin" id="admin">
          Admin
        </label>
        <label for="organization" class="hashtag-option">
       
        <input type="checkbox" checked="" name="organization" id="organization">
          Organization
        </label>
        <label for="student" class="hashtag-option">
          <input type="checkbox" checked="" name="student" id="student">
          Student
        </label>
      </div>
      <button id="search-for-internships" style="opacity: 0;">Search for internships</button>
      <section class="list-of-members">
        <div class="column visible">
          <div class="row">Username</div>
          <div class="row">Role</div>
          <?php if ($_SESSION['role'] == 'admin') { ?>
          <div class="row">Status</div>
          <?php } ?>
        </div>
      <?php foreach($users as $user): ?>
        <div class="column visible">
          <div class="row">
            <a class="underline" href="view_profile.php?username=<?php echo $user['username'] ?>">
              <?php echo $user['username'] ?> &#10138;
            </a>
          </div>
          <!-- HERE IS A BUG! DO NOT TOUCH THIS LINE. WHEN THIS IS ON DIFFERENT LINE THE INNERTEXT DOESNT TRIM THE WHITESPACE AND BREAKS -->
          <div class="row"><?php echo $user['role'] ?></div>
          <?php if ($_SESSION['role'] == 'admin') { ?>
          <div class="row"><?php echo 'doesnt work yet :)' ?></div>
          <?php } ?>
          <?php if ($_SESSION['role'] == 'organization' && $user['role'] == 'student') { ?>
          <button class="invite-student" data-username="<?php echo $user['username'] ?>" data-modal-target="#modal">
            Invite student
          </button>
          <?php } ?>
        </div>
      <?php endforeach ?>
      </section>
    </section>
    
    <?php include_once 'inc/feedback_message.php' ?>
  </main>

  <?php if ($_SESSION['role'] == 'organization') { ?>
  <div class="modal" id="modal">
    <div class="modal-header">
      <div class="title">Invite student</div>
      <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="modal-body">
      <form method="POST" action="success/success_invite_student_to_project.php">
        <input type="hidden" id="user_username" name="user_username">
        <input type="hidden" id="post_title_input" name="post_title">
        Choose project you want the student to get invited to:
        <select id="post_title" <?php if ($_SESSION['role'] == 'organization') {  echo 'onclick="doSome()"'; } ?>>
          <?php foreach($internships as $internship): ?>
            <?php if ($internship['status'] != 'published') continue ?>
            <option value="<?php echo $internship['post_title'] ?>"><?php echo $internship['post_title'] ?></option>
          <?php endforeach ?>
        </select>
        <button name="submit" type="submit">Invite student</button>
      </form>
    </div>
  </div>
  <div id="overlay"></div>
  <?php } ?>




  <script>
    <?php if ($_SESSION['role'] == 'organization') { ?>
    function doSome() {
      document.getElementById('post_title_input').value = document.getElementById('post_title').value
    }
    doSome()
    <?php } ?>


    function filterMembers() {
      let allMembers = document.querySelectorAll('.column')
      let checkedBoxes = document.querySelectorAll('input:checked')

      loop1: for (let i = 1; i < allMembers.length; i++) {
        if (checkedBoxes.length == 0) allMembers[i].classList.remove("visible")
        
        for (let j = 0; j < checkedBoxes.length; j++) {
          let roleDiv = allMembers[i].querySelectorAll('.row')[1]
          allMembers[i].classList.remove("visible")
          
          console.log(checkedBoxes[j].name)
          console.log(roleDiv.innerText)
          if (checkedBoxes[j].name == roleDiv.innerText) {
            allMembers[i].classList.add("visible")
            continue loop1
          }
        }
      }

      let index = 0
      for (let i = 1; i < allMembers.length; i++) {
        if (!allMembers[i].classList.contains("visible")) {
          continue
        }
        index++
        allMembers[i].style.backgroundColor = "white"
        if (index % 2 == 0) continue
        allMembers[i].style.backgroundColor = "#583c5a30"
        console.log(allMembers[i])
      }
    }

    filterMembers()

    <?php if ($_SESSION['role'] == 'organization') { ?>
    let openModalButtons = document.querySelectorAll('[data-modal-target]')
    let closeModalButtons = document.querySelectorAll('[data-close-button]')
    const overlay = document.getElementById('overlay')

    openModalButtons.forEach(button => {
      button.addEventListener('click', () => {
        const modal = document.querySelector(button.dataset.modalTarget)
        // document.getElementById("user_username").value = button.innerText.split(' ')[0]
        document.getElementById("user_username").value = button.dataset.username
        openModal(modal)
      })
    })

    overlay.addEventListener('click', () => {
      const modals = document.querySelectorAll('.modal.active')
      modals.forEach(modal => {
        closeModal(modal)
      })
    })

    closeModalButtons.forEach(button => {
      button.addEventListener('click', () => {
        const modal = button.closest('.modal')
        closeModal(modal)
      })
    })

    function openModal(modal) {
      if (modal == null) return
      modal.classList.add('active')
      overlay.classList.add('active')
    }

    function closeModal(modal) {
      if (modal == null) return
      modal.classList.remove('active')
      overlay.classList.remove('active')
    }
    <?php } ?>
  </script>

  <!-- <footer>
    Copyright 2022
  </footer> -->
</body>
</html>