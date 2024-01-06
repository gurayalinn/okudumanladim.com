<!--Admin navigation-->

<!-- Check if admin // This is not important really.-->
<?php if (Session::get('admin')) : ?>
<div class="col-12 mt-3 mb-2">
  <div class="rounded p-3">
    <a href='<?= (BASE_PATH); ?>admin/dash/index.php' class="btn btn-outline-primary btn-sm">Dashboard</a>
    <a href='<?= (BASE_PATH); ?>admin/dash/users.php' class="btn btn-outline-primary btn-sm">Users</a>
  </div>
</div>
<?php endif; ?>