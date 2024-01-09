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



$userList = null;
$sonuc = null;
$username = null;
$uid = null;
$created_at = null;
$result = null;
$session = null;
$createdat = null;
$guest = new guestController;
$userList = $guest->getUsersArray();


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

$title = ($username) . ' - ' . 'SONUC | okudumanladim.com';
Util::head($title);
?>


<div class="container">
  <div class="row">
    <div class="col">

      <div class="alert alert-info" role="alert">
        <h4 class="display-4 alert-heading"><a class="link-info fw-bold text-muted "
            data-umami-event="<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/profile?username=' .  $username ?>"
            href="/profile?username=<?= $username ?>"><strong><?= $username ?></strong></a></h4>

        <p style="color: var(--bs-body-color) !important;"> anketi <span class=" fw-bold text-info"
            class="fw-bold"><?php echo $result; ?></span>
          puan
          ile tamamladınız.</p>
      </div>
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

</div>



<?php if ($userList === null) : ?>

<strong class="text-danger p-1 m-2">Kullanıcı tablosu yüklenemedi.</strong>


<?php else : ?>

<div class="container mt-2">
  <div class="row">
    <div class="col-12 mt-3 mb-2 table-responsive">



      <table class="rounded table table-dark table-sm caption-top table-bordered table-hover table-striped">
        <caption id="umami" data-umami-event="users">
          <h3 style="color: var(--bs-body-color);" class="fw-semibold fs-4 h4">
            Sizin Sonuçlarınız
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

            <th scope="row" class=""><?= ($uid); ?></th>

            <td><?= ($username); ?></td>

            <td class="">
              <?php if ($result === null)
              {
                $result = "-";
              }
              else
              {
                $result = $result;
              }
               ?>
              <?= ($result); ?>

            </td>

            <td>
              <?= ($session); ?>
            </td>
            <td>
              <?= Util::display($createdat); ?>
            </td>
          </tr>

        </tbody>
      </table>


      <table class="rounded table table-dark table-sm caption-top table-bordered table-hover table-striped">
        <caption id="umami" data-umami-event="users">
          <h3 style="color: var(--bs-body-color);" class="display-3 fw-semibold fs-3 h3">
            Diğer Kullanıcı
            Puanları</h3>
        </caption>
        <thead>
          <tr>
            <th scope="col" class="">#</th>
            <th scope="col">Kullanıcı</th>
            <th scope="col" class="">Puan</th>
            <th scope="col">Tarih</th>
            <th scope="col" class="">ID</th>
            <th scope="col" class="">İncele</th>
          </tr>
        </thead>

        <tbody class="table-group-divider">
          <?php foreach ($userList as $row) : ?>
          <tr>

            <th scope="row" class=""><?= Util::display($row->uid); ?></th>

            <td><?= Util::display($row->username); ?></td>

            <td class="">
              <?php if ($row->result === null)
              {
                $result = "-";
              }
              else
              {
                $result = $row->result;
              }
               ?>
              <?= Util::display($result); ?>

            </td>

            <td>
              <?= Util::display(($row->createdat)); ?>
            </td>

            <td>
              <?= Util::display($row->session); ?>
            </td>

            <td>
              <a class="link-info fw-bold" href="/profile?username=<?= Util::display($row->username)?>"
                role="button">İncele</a>

            </td>


          </tr>
          <?php endforeach; ?>

        </tbody>
      </table>
    </div>
  </div>
</div>
<?php endif; ?>
<?php Util::footer(); ?>