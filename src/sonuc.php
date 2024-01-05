<?php if ($_SERVER['REQUEST_URI'] == '/sonuc') : ?>
<?php
$description = "okudumanladim.com, kişisel bilgi güvenliği farkındalığının artırılmasına yönelik interaktif web
platformu.";
$keywords = "Siber Güvenlik, Bilgi Güvenliği, Siber Tehditler, Ağ Güvenliği, Veri Koruma, Kötü Amaçlı Yazılımlar,
Şifreleme, Güvenlik Duvarı, Kimlik Doğrulama, Sızma Testi";
$title = "SONUC | okudumanladim.com";
?>

<?php include_once('inc/layout/head.php'); ?>

<?php endif; ?>



<?php
$anket = null;
if (isset($_POST['anket'])) {
  $anket = $_POST['anket'];
}
?>

<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="display-1">Anket Sonuçları</h1>
      <hr>

      <div class="alert alert-info" role="alert">
        <h4 class="alert-heading">Tebrikler!</h4>
        <p style="color: var(--bs-body-color) !important;">Anketi <span class="fw-bold text-info"
            class="fw-bold"><?php echo $anket; ?></span>
          puan
          ile tamamladınız.</p>
      </div>

    </div>
  </div>

  <div class="row mt-4">
    <div class="col">
      <h3 style="color: var(--bs-body-color);" class="display-3 fw-semibold fs-3 h3">Puan Aralıkları</h3>
      <p class="lead">
        <strong class="text-danger fw-bold">
          0-10</strong> arası puan alan kullanıcılar <span class="fw-bold">Bilgi Güvenliği</span> konusunda <span
          class="fw-bold text-danger">Bilinçsiz</span>
        olarak değerlendirilir.
      </p>
      <p class="lead">
        <strong class="text-warning fw-bold">
          11-20</strong> arası puan alan kullanıcılar <span class="fw-bold">Bilgi Güvenliği</span> konusunda <span
          class="fw-bold text-warning">Bilinçli</span>
        olarak değerlendirilir.
      </p>
      <p class="lead">
        <strong class="text-info fw-bold">
          21-30</strong> arası puan alan kullanıcılar <span class="fw-bold">Bilgi Güvenliği</span> konusunda <span
          class="fw-bold text-info">Başarılı</span>
        olarak değerlendirilir.
      </p>
    </div>

    <div class="table-responsive mt-4">
      <table class="table table-sm caption-top table-bordered table-hover table-striped">
        <caption id="umami" data-umami-event="users">
          <h3 style="color: var(--bs-body-color);" class="display-3 fw-semibold fs-3 h3">
            Kullanıcı
            Puanları</h3>
        </caption>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kullanıcı</th>
            <th scope="col">Puan</th>
            <th scope="col">Tarih</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <tr>
            <th scope="row">1</th>
            <td>admin</td>
            <td>30</td>
            <td>01.01.2024</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>guray</td>
            <td>20</td>
            <td>01.01.2024</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>user</td>
            <td>10</td>
            <td>01.01.2024</td>
          </tr>
          <tr>
            <th scope="row">-</th>
            <td>-</td>
            <td>-</td>
            <td>-</td>
          </tr>
        </tbody>
      </table>
    </div>





    <?php if ($_SERVER['REQUEST_URI'] == '/sonuc') : ?>
    <?php include_once('inc/layout/footer.php'); ?>
    <?php endif; ?>