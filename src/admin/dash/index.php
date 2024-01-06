<?php
require_once '../app/require.php';
require_once '../app/controllers/adminController.php';
require_once '../app/controllers/userController.php';

Util::isAdmin();

$userController = new userController;

Util::head('Admin Panel');
Util::navbar();

?>

<div class="container mt-2">
  <div class="row">

    <?php Util::adminNavbar(); ?>

    <!--Newest registered user-->
    <div class="col-xl-3 col-sm-6 col-xs-12 mt-3">
      <div class="card">
        <div class=" card-body row">
          <div class="col-6 text-center">
            <h3>
              <!-- user icon -->♟
            </h3>
          </div>
          <div class="col-6">
            <h3 class="text-center text-truncate"><?= Util::display($userController->getNew()); ?></h3>
            <span class="small text-secondary text-uppercase">latest user</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php Util::footer(); ?>