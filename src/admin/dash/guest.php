<?php

require_once '../app/require.php';
require_once '../app/controllers/adminController.php';
require_once '../app/controllers/userController.php';

Util::isAdmin();

$admin = new adminController;
$guestList = $admin->getGuestArray();


Util::head('Admin Panel');
Util::navbar();

// if post request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST["delGuest"])) {
          $rowID = $_POST['delGuest'];
          $admin->delGuest($rowUID);
        }

    //header("location: guest.php");



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Butondan gelen değerleri alın
    $uid = $_GET['uid'];
    $username = $_GET['username'];

    // Gerekli güvenlik kontrollerini yapabilirsiniz, örneğin SQL injection önleme

    // Kullanıcı sayfasının URL'sini oluşturun
    $profileUrl = "/profile?username={$username}+{$uid}";

    // Kullanıcı sayfasına yönlendirme
    header("Location: {$profileUrl}");
    exit();
}






}

?>

<div class="container mt-2">
  <div class="row">

    <?php Util::adminNavbar(); ?>
    <?php if ($guestList === null) : ?>


    <strong class="text-danger p-1 m-2">Kullanıcı tablosu yüklenemedi.</strong>

    <?php else : ?>
    <div class="col-12 mt-3 mb-2 table-responsive">
      <table class="rounded table table-dark table-sm caption-top table-bordered table-hover table-striped">
        <caption>
          <h3 style="color: var(--bs-body-color);" class="display-3 fw-semibold fs-3 h3">
            Guest List</h3>
        </caption>
        <thead>
          <tr>
            <th scope="col" class="">UID</th>
            <th scope="col">USERNAME</th>
            <th scope="col">EMAIL</th>
            <th scope="col" class="">RESULT</th>
            <th scope="col" class="">SESSION</th>
            <th scope="col" class="">JOINED</th>
            <th scope="col" class="">INSPECT</th>
            <th scope="col">DELETE</th>
          </tr>
        </thead>

        <tbody>

          <!--Loop for number of rows-->
          <?php foreach ($guestList as $row) : ?>
          <tr>

            <th scope="row" class="text-center"><?= Util::display($row->uid); ?></th>

            <td><?= Util::display($row->username); ?></td>
            <td>
              <?php if ($row->email === null || $row->email === '')
              {
                $email = "Emaili yok.";
              }
              else
              {
                $email = $row->email;
              }
               ?>
              <?= Util::display($email); ?>

            </td>

            <td class="">
              <?php if ($row->result === null)
              {
                $result = "Anketi tamamlamadı.";
              }
              else
              {
                $result = $row->result;
              }
               ?>
              <?= Util::display($result); ?>

            </td>

            <td><?= Util::display($row->session); ?></td>
            <td>
              <? $dateFormated = date("d.m.Y", strtotime($row->createdAt)); ?>
              <?= Util::display($dateFormated); ?>
            </td>
            <td>
              <button value="<?= Util::display($row->uid); ?>" name="" title="Inspect guest" data-toggle="tooltip"
                data-placement="top" class="btn btn-sm" type="">
                <a class="fw-bold fs-4"
                  href="/sonuc?<?= Util::display($row->username) . '+' . Util::display($row->session) ?>"
                  role="button">🔎</a>
              </button>

            </td>
            <td>
              <form method="POST" action="<?= Util::display($_SERVER['PHP_SELF']); ?>">
                <button value="<?= Util::display($row->uid); ?>" name="delGuest" title="Delete guest"
                  data-toggle="tooltip" data-placement="top" class="btn btn-sm" type="submit">
                  <span class="fw-bold fs-4">❌</span>
                </button>
              </form>
            </td>

          </tr>
          <?php endforeach; ?>

        </tbody>

      </table>
    </div>
  </div>
  <?php endif; ?>

</div>
<?php Util::footer(); ?>
<script>
$(document).ready(function() {
  $('[data-toggle="tooltip"]').tooltip();
});
</script>