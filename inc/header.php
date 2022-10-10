<?php
  require_once 'inc/session.php';
  $current_user = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?></title>
  <link rel="stylesheet" href="styles/header.css">
  <?php require_once 'logic/stylesheets.php' ?>
</head>

<body>
  <header>
    <nav class="menu-container">
      <div style="display: inline-flex;justify-content:center;flex-direction:column;">
        <a href="view_profile.php" class="users-profile">
          <!-- <img aria-hidden="true" src="https://images.assetsdelivery.com/compings_v2/tuktukdesign/tuktukdesign1606/tuktukdesign160600119.jpg" alt=""> -->
          <img aria-hidden="true" src="images/profile-icon.png" alt="Profile icon">
          <!-- <p class="users-name">Krystian Mazurkiewicz</p> -->
          <p class="users-name"><?php echo $_SESSION['username'] ?></p>
          <p class="change-profile-info">Change profile info</p>
        </a>
        <div style="width:100%;display:flex;justify-content:center;">
          <a href="logout.php" style=" text-align:center; margin-top:20px; background: white; font-weight:600; border-radius: 5px; padding: 10px 20px; ">Log out</a>
        </div>
      </div>
      <?php require_once 'logic/main_nav.php' ?>
      <a class="university-badge-container" href="logout.php">
      <!-- <a class="university-badge-container" href="https://www.oslomet.no/"> -->
        <img aria-hidden="true" class="university-badge" src="https://fest-network.eu/wp-content/uploads/2019/05/Oslo-Met-300x300-e1561746604844.jpg" alt="">
      </a>
      <!-- <a href="" class="logout"></a> -->
    </nav>
  </header>