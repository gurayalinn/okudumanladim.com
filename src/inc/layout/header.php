<?php
if (!isset($_SESSION)) {
session_start();
}
require_once "inc/load.php";

require_once "inc/layout/head/meta.php";
?>

    <body>
        <div id="wrapper" class="wrapper">
          <div itemscope itemtype="https://schema.org/WebSite">
          <meta itemprop="url" content="https://okudumanladim.com/" />
          <meta itemprop="name" content="Güray ALIN" />
           <meta itemprop="alternateName" content="GRY" />
        </div><!--
    <iframe
      src="https://www.googletagmanager.com/ns.html?id=G-"
      tabindex="0"
      height="0"
      width="0"
      style="display: none; visibility: hidden"
      scrolling="auto"
      title="Google Tag Manager"
      allowfullscreen="true"
      aria-hidden="true"
      aria-atomic="true"
      aria-label="Google Tag Manager"
      async
    ></iframe>-->
            <!-- Navigation -->
            <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true): ?>
                <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

                </nav>
            <?php endif;?>
            <!-- The End of the Header -->
