<?php
  if ($current_user == 'admin') {
    echo '
    <ul>
      <li class="active">
        <a href="/">
          <p class="nav-tag">
            Available Interships
          </p>
        </a>
      </li>
      <li>
        <a href="/">
          <p class="nav-tag">
            View Status
          </p>
        </a>
      </li>
    </ul>
    ';
  } else if ($current_user == 'company') {
    echo '
    <ul>
      <li class="active">
        <a href="">
          <p class="nav-tag">
            Create Internship
          </p>
        </a>
      </li>
      <li>
        <a href="company_internships.php">
          <p class="nav-tag">
            Your Posts
          </p>
        </a>
      </li>
    </ul>
    ';
  } else if ($current_user == 'student') {
    echo '
    <ul>
      <li class="active">
        <a href="/">
          <p class="nav-tag">
            Available Interships
          </p>
        </a>
      </li>
      <li>
        <a href="/">
          <p class="nav-tag">
            View Status
          </p>
        </a>
      </li>
    </ul>
    ';
  } else {
    echo $user;
  }
?>