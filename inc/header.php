<?php
  include 'config/database.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?></title>
  <link rel="stylesheet" href="styles/header.css">
  <?php include_once 'logic/stylesheets.php' ?>
</head>

<body>
  <header>
    <nav class="menu-container">
      <a href="/" class="users-profile">
        <!-- <img aria-hidden="true" src="https://images.assetsdelivery.com/compings_v2/tuktukdesign/tuktukdesign1606/tuktukdesign160600119.jpg" alt=""> -->
        <img aria-hidden="true" src="images/profile-icon.png" alt="Profile icon">
        <p class="users-name">Krystian Mazurkiewicz</p>
        <p class="change-profile-info">Change profile info</p>
      </a>
      <?php include_once 'logic/main_nav.php' ?>
      <a class="university-badge-container" href="https://www.oslomet.no/">
        <img aria-hidden="true" class="university-badge" src="https://fest-network.eu/wp-content/uploads/2019/05/Oslo-Met-300x300-e1561746604844.jpg" alt="">
      </a>
    </nav>
  </header>