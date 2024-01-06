<?php

require_once './app/require.php';

Util::isUser();

require_once './app/controllers/userController.php';

$userController = new userController;

$newestUser = $userController->getNew();

Util::head($user['username']);
Util::navbar();

?>

<main class="container mt-2">

  <div class="row">

    <!--Welcome message-->
    <div class="col-12 mt-3 mb-2">
      <div class="alert alert-primary" role="alert">
        Hoşgeldin,
        <a class="link-info"
          href="<?= (BASE_PATH); ?>admin/profile.php"><b><?= Util::display($user['username']) ?></b></a>.
      </div>
    </div>

    <!--Statistics-->
    <div class="col-lg-9 col-md-12">
      <div class="rounded p-3 mb-3">
        <div class="h5 border-bottom border-secondary pb-1">Statistics</div>
        <div class="row">

          <!--Latest User-->
          <div class="col-12 clearfix">
            <strong class="text-secondary">Latest User: </strong>
            <p class="text-info float-right mb-0"><?= Util::display($newestUser); ?></p>
          </div>

        </div>
      </div>
    </div>

  </div>

</main>
<?php Util::footer(); ?>