<?php
$description = "okudumanladim.com, kişisel bilgi güvenliği farkındalığının artırılmasına yönelik interaktif web
platformu.";
$keywords = "Siber Güvenlik, Bilgi Güvenliği, Siber Tehditler, Ağ Güvenliği, Veri Koruma, Kötü Amaçlı Yazılımlar,
Şifreleme, Güvenlik Duvarı, Kimlik Doğrulama, Sızma Testi";
$title = "SONUC | okudumanladim.com";
?>
<?php
include_once './inc/api/require.php';
include_once './inc/api/controllers/authController.php';
include_once './inc/api/controllers/guestController.php';

Util::isGuest();


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['username'])) {

if (empty($_GET['username']) || !isset($_GET['username'])) {
     $guest = null;
     $username = null;
} else {
  $uid = null;
  $created_at = null;
  $result = null;
  $session = null;
  $createdat = null;
  $profileUrl = null;
  $guest = null;
  $username = null;
  $guest = null;

  $username = $_GET['username'];
  //Util::debug_console($username);

  $guest = (new authController())->getGuest($username);
  //Util::debug_console($guest);

  if (($guest) && $_GET['username'] !== null) {

    if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    }

    if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
    }

    if (isset($_SESSION['session'])) {
    $session = $_SESSION['session'];
  }

  if (isset($_SESSION['result'])) {
    $result = $_SESSION['result'];
  }

  if (isset($_SESSION['created_at'])) {
    $createdat = $_SESSION['created_at'];
  }

  $profileUrl = '/profile?username=' . $username;



}

}
Util::head($username . ' | okudumanladim.com');
}




?>


<?php if (empty($_GET['username']) || !isset($_GET['username'])) : ?>

<strong class="text-danger p-1 m-2">Kullanıcı adı boş bırakılamaz.</strong>

<?php elseif (($guest === '404') && $_GET['username'] !== null) : ?>
<h1 class="display-1"><strong class="link-info fw-bold text-muted">
  </strong></h1>
<strong class="text-danger p-1 m-2">Kullanıcı bilgisi bulunamadı.</strong>

<?php elseif ($guest === '200') : ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="display-1"><a class="link-info fw-bold text-muted "
          data-umami-event="<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/profile?username=' .  $username ?>"
          href="/profile?username=<?= $username ?>"><strong><?= $username ?></strong></a></h1>
    </div>
  </div>


  <div class="row mt-4">
    <div class="col">
      <h3 style="color: var(--bs-body-color);" class="display-3 fw-semibold fs-3 h3">Puan Aralıkları</h3>
      <p class="lead">
        Aşağıdaki tabloda puan aralıkları ve değerlendirmeleri yer almaktadır.
      </p>
      <small class="text-muted">
        <strong class="text-info fw-bold">
          80-100</strong> arası puan <span class="fw-bold text-info">Başarılı</span>
        olarak değerlendirilir.
        <br>
        <strong class="text-warning fw-bold">
          50-80</strong> arası puan <span class="fw-bold text-warning">Bilinçli</span>
        olarak değerlendirilir.
        <br>
        <strong class="text-danger fw-bold">
          0-50</strong> arası puan <span class="fw-bold text-danger">Bilinçsiz</span>
        olarak değerlendirilir.
        <br>
      </small>
    </div>
  </div>


  <div class="row">
    <div class="col-12 mt-3 mb-2 table-responsive">

      <table class="rounded table table-dark table-sm caption-top table-bordered table-hover table-striped">
        <caption id="umami" data-umami-event="<?= $username . $session ?>">
          <h3 style="color: var(--bs-body-color);" class="fw-semibold fs-4 h4">
            Sonuçlarınız
          </h3>
        </caption>
        <thead>
          <tr>
            <th scope="col" class="">#</th>
            <th scope="col">Kullanıcı</th>
            <th scope="col" class="">Puan</th>
            <th scope="col">ID</th>
            <th scope="col">Tarih</th>
          </tr>
        </thead>

        <tbody class="table-group-divider">
          <tr>

            <th scope="row" class=""><?= $uid; ?></th>

            <td><?= $username; ?></td>

            <td class="">
              <?php if ($result === null)
              {
                $result = "Anketi tamamlamadı.";
              }
               ?>
              <?= ($result); ?>

            </td>

            <td>
              <?= ($session); ?>
            </td>
            <td>
              <?= ($createdat); ?>
            </td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>

  <h3 class="mt-4"><a class="link-info fw-bold text-muted"
      data-umami-event="<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/sonuc' ?>"
      href="/sonuc"><strong>Tüm Puanları Gör</strong></a></h3>



</div>
<?php Util::footer(); ?>

<?php endif; ?>