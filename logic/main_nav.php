<?php
  if ($current_user == 'admin') {
    echo '
    <ul>
      <li ' . (($title == 'index_admin') ? 'class="active"' : '') . '>
        <a href="' . (($title == 'index_admin') ? '' : 'index2.php') . '">
          <p class="nav-tag">
            Published Interships
          </p>
        </a>
      </li>
      <li ' . (($title == 'not_published_internships') ? 'class="active"' : '') . '>
        <a href="' . (($title == 'not_published_internships') ? '' : 'not_published_internships.php') . '">
          <p class="nav-tag">
            Unpublished Interships
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
      <li ' . (($title == 'view_profile') ? 'class="active"' : '') . '>
        <a href="view_profile.php">
          <p class="nav-tag">
            View Profile
          </p>
        </a>
      </li>
    </ul>
    ';
  } else if ($current_user == 'organization') {
    echo '
    <ul>
      <li ' . (($title == 'internships_company') ? 'class="active"' : '') . '>
        <a href="' . (($title == 'internships_company') ? '' : 'index2.php') . '">
          <p class="nav-tag">
            Your Posts
          </p>
        </a>
      </li>
      <li ' . (($title == 'create_internship') ? 'class="active"' : '') . '>
        <a href="' . (($title == 'create_internship') ? '' : 'create_internship.php') . '">
          <p class="nav-tag">
            Create Internship
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
      <li ' . (($title == 'view_profile') ? 'class="active"' : '') . '>
        <a href="view_profile.php">
          <p class="nav-tag">
            View Profile
          </p>
        </a>
      </li>
    </ul>
    ';
  } else if ($current_user == 'student') {
    echo '
    <ul>
      <li ' . (($title == 'view_internships_student') ? 'class="active"' : '') . '>
        <a href="' . (($title == 'view_internships_student') ? '' : 'index2.php') . '">
          <p class="nav-tag">
            Available Interships
          </p>
        </a>
      </li>
      <li ' . (($title == 'status_student') ? 'class="active"' : '') . '>
        <a href="' . (($title == 'status_student') ? '' : 'status_student.php') . '">
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
      <li ' . (($title == 'view_profile') ? 'class="active"' : '') . '>
        <a href="view_profile.php">
          <p class="nav-tag">
            View Profile
          </p>
        </a>
      </li>
    </ul>
    ';
  } else {
    echo 'Something went wrong';
  }
?>