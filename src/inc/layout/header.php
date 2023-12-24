<?php
if (!isset($_SESSION)) {
session_start();
}
require_once "inc/load.php";

require_once "inc/layout/head/meta.php";
?>

<body>
  <a class="skip-main" href="#main">Skip to main ⏩</a>
  <div id="wrapper" class="wrapper">
    <span itemscope itemtype="https://schema.org/WebSite">
      <meta itemprop="url" content="http://okudumanladim.com/" />
      <meta itemprop="name" content="okudumanladim.com" />
    </span>
    <div class="progress-bar"></div>
    <h1 class="count"></h1>
    <!-- The Header -->
    <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true): ?>
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <h1>LOGGED IN</h1>
    </nav>
    <?php endif;?>

    <header>
      <navbar class="navbar">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">HOME</a>
            </li>
            <li class="breadcrumb-item">
              <a href="/license">LICENSE</a>
            </li>
            <li class="breadcrumb-item">
              <a href="/project">PROJECT</a>
            </li>
            &nbsp;
            <li>
              <a tabindex="2" target="_self" rel="top" id="btnSwitch">
                🌓
              </a>
            </li>
          </ol>
        </nav>
      </navbar>
    </header>
    <!-- The End of the Header -->