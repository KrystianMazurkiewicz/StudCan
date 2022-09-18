<?php
  if ($current_user == 'admin') {
    echo '
    <ul>
      <li ' . (($title == '') ? 'class="active"' : '') . '>
        <a href="/">
          <p class="nav-tag">
            Available Interships
          </p>
        </a>
      </li>
      <li ' . (($title == '') ? 'class="active"' : '') . '>
        <a href="/">
          <p class="nav-tag">
            View Status
          </p>
        </a>
      </li>
      <li ' . (($title == 'members') ? 'class="active"' : '') . '>
        <a href="' . (($title == 'members') ? '' : 'members.php') . '">
          <p class="nav-tag">
            Members
          </p>
        </a>
      </li>
    </ul>
    ';
  } else if ($current_user == 'organization') {
    echo '
    <ul>
      <li ' . (($title == 'create_internship') ? 'class="active"' : '') . '>
        <a href="' . (($title == 'create_internship') ? '' : 'create_internship.php') . '">
          <p class="nav-tag">
            Create Internship
          </p>
        </a>
      </li>
      <li ' . (($title == 'company_internships') ? 'class="active"' : '') . '>
        <a href="' . (($title == 'company_internships') ? '' : 'company_internships.php') . '">
          <p class="nav-tag">
            Your Posts
          </p>
        </a>
      </li>
      <li ' . (($title == 'members') ? 'class="active"' : '') . '>
        <a href="' . (($title == 'members') ? '' : 'members.php') . '">
          <p class="nav-tag">
            Members
          </p>
        </a>
      </li>
    </ul>
    ';
  } else if ($current_user == 'student') {
    echo '
    <ul>
      <li ' . (($title == 'index2') ? 'class="active"' : '') . '>
        <a href="' . (($title == 'index2') ? '' : 'index.php') . '">
          <p class="nav-tag">
            Available Interships
          </p>
        </a>
      </li>
      <li ' . (($title == 'student_status') ? 'class="active"' : '') . '>
        <a href="' . (($title == 'student_status') ? '' : 'student_status.php') . '">
          <p class="nav-tag">
            View Status
          </p>
        </a>
      </li>
      <li ' . (($title == 'members') ? 'class="active"' : '') . '>
        <a href="' . (($title == 'members') ? '' : 'members.php') . '">
          <p class="nav-tag">
            Members
          </p>
        </a>
      </li>
    </ul>
    ';
  } else {
    echo 'Something went wrong';
  }
?>