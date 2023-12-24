<?php
if (!isset($_SESSION)) {
session_start();
}
require_once "inc/load.php";

require_once "inc/layout/head/meta.php";
?>

<body>
  <a class="skip-main" href="#main">Skip to main ⏩ 📃</a>
  <div id="wrapper" class="wrapper">
    <span itemscope itemtype="https://schema.org/WebSite">
      <meta itemprop="url" content="http://okudumanladim.com/" />
      <meta itemprop="name" content="okudumanladim.com" />
    </span>
    <!-- The Header -->
    <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true): ?>
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <h1>LOGGED IN</h1>
    </nav>
    <?php endif;?>
    <!-- The End of the Header -->