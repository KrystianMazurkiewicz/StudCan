<?php
  $title = 'members';
  require_once 'db/conn.php';
  require_once 'inc/header.php';

  $users = $user->getUsers();
  // This should be dynamic
  $internships = $crud->get_all_internships_from_company("Oslomet");
  $tags = $crud->getAllPossibleTags();
?>

  <main>
    <section class="content-container">
      <h1>Members</h1>
      <div class="hashtag-options" onclick="showMembers(clicked = true)">
        <?php foreach($tags as $tag): ?>
          <label for="<?php echo $tag['name'] ?>" class="hashtag-option">
            <input type="checkbox" checked name="<?php echo $tag['name'] ?>" id="<?php echo $tag['name'] ?>">
            <?php echo $tag['name'] ?>
          </label>
        <?php endforeach; ?>
      </div>
      <p class="available-internships">37 students:</p>
      <section class="list-of-members">
        
      </section>
    </section>
  </main>

  <div class="modal" id="modal">
    <div class="modal-header">
      <div class="title">Invite student</div>
      <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="modal-body">
      <form method="POST" action="success_invite_student_to_project.php">
        <input type="hidden" id="user_username" name="user_username">
        <input type="hidden" id="post_title_input" name="post_title">
        Choose project you want the student to get invited to:
        <select id="post_title" onclick="doSome()">
          <?php foreach($internships as $internship): ?> 
            <option value="<?php echo $internship['post_title'] ?>"><?php echo $internship['post_title'] ?></option>
          <?php endforeach; ?>
        </select>
        <button name="submit" type="submit">Invite</button>
      </form>
    </div>
  </div>
  <div id="overlay"></div>

  <script>
    function doSome() {
      document.getElementById('post_title_input').value = document.getElementById('post_title').value
    }
    doSome()

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
        if (row.innerText != 'Role' && row.innerText != 'Username') div.dataset.modalTarget = '#modal'
        div.append(row)
      }

      list_of_members.append(div)
    }
    
    function showMembers(clicked) {
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

      if (clicked) {
        openModalButtons = document.querySelectorAll('[data-modal-target]')
        closeModalButtons = document.querySelectorAll('[data-close-button]')

        openModalButtons.forEach(button => {
          button.removeEventListener('click', () => {
            const modal = document.querySelector(button.dataset.modalTarget)
            openModal(modal)
          })
        })

        overlay.removeEventListener('click', () => {
          const modals = document.querySelectorAll('.modal.active')
          modals.forEach(modal => {
            closeModal(modal)
          })
        })

        closeModalButtons.forEach(button => {
          button.removeEventListener('click', () => {
            const modal = button.closest('.modal')
            closeModal(modal)
          })
        })

        openModalButtons.forEach(button => {
          button.addEventListener('click', () => {
            const modal = document.querySelector(button.dataset.modalTarget)
            document.getElementById("user_username").value = button.firstChild.innerText
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
      }
    }
    showMembers()

    let openModalButtons = document.querySelectorAll('[data-modal-target]')
    let closeModalButtons = document.querySelectorAll('[data-close-button]')
    const overlay = document.getElementById('overlay')

    openModalButtons.forEach(button => {
      button.addEventListener('click', () => {
        const modal = document.querySelector(button.dataset.modalTarget)
        document.getElementById("user_username").value = button.firstChild.innerText
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
  </script>

  <!-- <footer>
    Copyright 2022
  </footer> -->
</body>
</html>