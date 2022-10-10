<?php
  $fd_msg = $_SESSION['feedback_message'];
  if (isset($fd_msg) && $fd_msg != "") { 
?>
  <div class="success-message-container <?php if (strpos($fd_msg, "fail")) echo 'failed-message' ?>">
    <?php 
      echo $fd_msg;
      $_SESSION['feedback_message'] = "";
    ?>
  </div>
<?php } ?>