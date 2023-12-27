<?php
if (!isset($_SESSION)) {
session_start();
}
require_once "inc/load.php";

require_once "inc/layout/head/meta.php";
?>

<body>
  <!-- SKIP TO MAIN -->
  <a class="skip-main" href="#main">Skip to main ⏩</a>

  <!-- The Wrapper -->
  <div class="wrapper container container-center">
    <?php require_once "inc/layout/head/nav.php";?>
    <!-- The End of the Header -->
    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == true): ?>
    <?php endif;?>
    <?php if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == false): ?>
    <?php endif;?>