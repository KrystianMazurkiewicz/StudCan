<?php
  $title = 'status_student';
  require_once 'db/conn.php';
  require_once 'inc/header.php';

  $post_ids = $crud->get_applied_internship($_SESSION['user_id']);
  // $users = $user->getUsers();
  // $tags = $crud->getAllPossibleTags();
?>

  <main>
    <section class="content-container">
      <h1>Your internships</h1>
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
      <p class="available-internships">3 internships:</p>
      <section class="list-of-your-internships">
        
      </section>
    </section>
  </main>

  <script>
    const list_of_your_internships = document.querySelector(".list-of-your-internships")
    const internshipsArrayJS = [
      <?php foreach($post_ids as $post_id):
        $this_post = $crud->get_internships($post_id['internship_id']);
        echo '{
          id: "' . $this_post[0]['id'] . '",
          co_name: "' . $this_post[0]['co_name'] . '",
          post_title: "' . $this_post[0]['post_title'] . '",
          post_description: `' . $this_post[0]['post_description'] . '`,
          hashtags: `' . $this_post[0]['hashtags'] . '`,
          ppl_applied: `' . $this_post[0]['ppl_applied'] . '`,
          co_website: `' . $this_post[0]['co_website'] . '`,
        },';
      endforeach ?>
    ]

    function buildTable(post) {
      const firma_container = document.createElement('article')
      firma_container.classList.add('firma-container')
      
      const firma = document.createElement('div')
      firma.classList.add('firma')
      firma_container.append(firma)

      const title_for_job_description = document.createElement('h2')
      title_for_job_description.classList.add('title-for-job-description')
      title_for_job_description.innerText = post['post_title']
      firma.append(title_for_job_description)
      
      const job_description = document.createElement('p')
      job_description.classList.add('job-description')
      job_description.innerText = post['post_description']
      firma.append(job_description)
      
      const bottom_section = document.createElement('div')
      bottom_section.classList.add('bottom-section')
      firma.append(bottom_section)

      const hashtags = document.createElement('div')
      hashtags.classList.add('hashtags')
      bottom_section.append(hashtags)
      
      // Skipped hashtags
      
      const company_and_people_applied = document.createElement('div')
      company_and_people_applied.classList.add('company-and-people-applied')
      bottom_section.append(company_and_people_applied)

      const company = document.createElement('div')
      company.classList.add('company')
      company.innerText = 'Co.: '
      company_and_people_applied.append(company)
      
      const strong = document.createElement('strong')
      strong.classList.add('company')
      company.append(strong)
      
      const a = document.createElement('a')
      a.href = post['co_website']
      a.innerText = post['co_name']
      strong.append(a)
      
      const people_applied = document.createElement('div')
      people_applied.classList.add('people-applied')
      company_and_people_applied.append(people_applied)
      
      const strong_2 = document.createElement('strong')
      // Missing logic
      strong_2.innerText = 'Under 10 people have applied'
      people_applied.append(strong_2)
      
      const a_2 = document.createElement('a')
      a_2.href = 'success_send_application?id=' + post['co_name'] + '.php'
      firma_container.append(a_2)

      const send_application = document.createElement('button')
      send_application.classList.add('send-application')
      a_2.append(send_application)

      list_of_your_internships.append(firma_container)
    }
    
    function show_internships() {
      list_of_your_internships.innerText = ""

      loop1: for (let i = 0; i < internshipsArrayJS.length; i++) {
        let checkedBoxes = document.querySelectorAll('input:checked')

        for (let j = 0; j < checkedBoxes.length; j++) {
          // if (checkedBoxes[j].name == internshipsArrayJS[i]['role'] || i == 0) {
            buildTable(internshipsArrayJS[i])
            continue loop1
          // }
        }
      }
    }
    show_internships()
  </script>

  <!-- <footer>
    Copyright 2022
  </footer> -->
</body>
</html>