<?php

require_once '../app/require.php';
require_once '../app/controllers/adminController.php';
require_once '../app/controllers/userController.php';

Util::isAdmin();

$admin = new adminController;
$userList = $admin->getUserArray();
$questions = $admin->getQuestionsArray();


Util::head('Admin Panel');
Util::navbar();

// if post request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST["setAdmin"])) {
        $rowUID = $_POST['setAdmin'];
        $admin->setAdmin($rowUID);
    }

    if (isset($_POST["addQuestion"])) {
         $questionTxt = $_POST['questionTxt'];
         $optionA = $_POST['optionA'];
         $optionB = $_POST['optionB'];
         $optionC = $_POST['optionC'];
         $optionD = $_POST['optionD'];
         $category = $_POST['category'];
         $correctAnswer = $_POST['correctAnswer'];
         $admin->addQuestion($questionTxt, $optionA, $optionB, $optionC, $optionD, $category, $correctAnswer);
        }


    header("location: users.php");

}

?>

<div class="container mt-2">
  <div class="row">

    <?php Util::adminNavbar(); ?>

    <div class="col-12 mt-3 mb-2 table-responsive">
      <table class="rounded table table-dark table-sm caption-top table-bordered table-hover table-striped">

        <thead>
          <tr>
            <th scope="col" class="text-center">UID</th>
            <th scope="col">Username</th>
            <th scope="col" class="text-center">Admin</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>

        <tbody>

          <!--Loop for number of rows-->
          <?php foreach ($userList as $row) : ?>
          <tr>

            <th scope="row" class="text-center"><?= Util::display($row->uid); ?></th>

            <td><?= Util::display($row->username); ?></td>

            <td class="text-center">
              <?php if ($row->admin == 1) : ?>

              <!-- admin icon -->
              admin 👑

              <?php else : ?>

              <!-- times icon -->
              user ♟

              <?php endif; ?>
            </td>

            <td>
              <form method="POST" action="<?= Util::display($_SERVER['PHP_SELF']); ?>">
                <button value="<?= Util::display($row->uid); ?>" name="setAdmin" title="Set admin/non admin"
                  data-toggle="tooltip" data-placement="top" class="btn btn-sm text-dark" type="submit">

                  <!-- crown icon -->
                  <span class="fw-bold text-white">👑 / ♟</span>

                </button>

              </form>
            </td>

          </tr>
          <?php endforeach; ?>

        </tbody>

      </table>
    </div>
  </div>

</div>
<?php Util::footer(); ?>

<script>
$(document).ready(function() {
  $('[data-toggle="tooltip"]').tooltip();
});
</script>