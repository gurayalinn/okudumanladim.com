<?php require_once('inc/layout/head.php'); ?>

<?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == true): ?>
<small><code>LOGGED IN</code></small>
<?php endif;?>

<?php if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == false): ?>
<small><code>NOT LOGGED IN</code></small>
<?php endif;?>

<?php require_once('inc/layout/footer.php'); ?>
