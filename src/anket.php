<?php
$description = "okudumanladim.com, kişisel bilgi güvenliği farkındalığının artırılmasına yönelik interaktif web
platformu.";
$keywords = "Siber Güvenlik, Bilgi Güvenliği, Siber Tehditler, Ağ Güvenliği, Veri Koruma, Kötü Amaçlı Yazılımlar,
Şifreleme, Güvenlik Duvarı, Kimlik Doğrulama, Sızma Testi";
$title = "ANKET | okudumanladim.com";
?>
<?php
include_once './inc/api/require.php';
include_once './inc/api/controllers/authController.php';
include_once './inc/api/controllers/guestController.php';

Util::isGuest();

$guest = new guestController;
$questions = $guest->getQuestionsArray();
$userResult = 0;
if (isset($_COOKIE['userResult'])) {
    $userResult = $_COOKIE['userResult'];
}

//$answer = isset($_COOKIE['userAnswers']) ? $_COOKIE['userAnswers'] : null; // Eğer $_COOKIE['userAnswers'] set edilmişse değeri, değilse boş bir dize alır


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $response = (new authController())->registerGuest($_POST);
}

Util::head('ANKET | okudumanladim.com');


?>

<div id="survey" class="container d-flex justify-content-center align-items-center clearfix text-center mt-4">

  <div id="loader" class="loader">
    <img src="public/assets/images/favicon.svg" alt="loader">
  </div>
  <div id="survey-wrapper" class="survey-wrapper col">

    <div id="survey-container-quest" class="row">
      <div id="survey-container-pagination" class="row">
        <div id="pagination-container" class=""></div>
      </div>
      <div class="row" id="question-container"></div>
    </div>

    <div id="user-container" class="row mt-2 justify-content-center align-items-center text-center" hidden>
      <div id="survey-result-container" class="row">
        <div id="result-container" class="">



        </div>
      </div>
      <div id="survey-user-input" class="col-4">

        <div class="row">
          <?php if (isset($response)) : ?>
          <div class="alert alert-secondary" role="alert">
            <?= Util::display($response); ?>

            <?php if (isset($_POST['username']) && !empty($_POST['username']) && $response === 'Başarıyla gönderildi.') : ?>
            <br>
            <a class="link-info fw-bold text-muted" role="button" href="/profile?username=<?= $_POST['username'] ?>"
              data-umami-event="<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/profile?username=' . $_POST['username'] ?>"><strong>
                Sonuçların : <?= $_POST['username'] ?></strong></a>
            <?php endif; ?>

          </div>

          <?php endif; ?>
        </div>

        <form method="POST" action="<?= Util::display($_SERVER['PHP_SELF']); ?>">
          <div class="form-group input-group input-group-md">
            <input type="text" class="form-control form-control-md" placeholder="Kullanıcı Adı" name="username"
              minlength="3" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off" required>
            <input type="hidden" name="session" value="<?= Util::randomCode(16); ?>">
            <input type="hidden" name="result" value="<?= ($userResult); ?>">
            <!-- <input type="hidden" name="answer" value="<? //htmlspecialchars($_COOKIE['userAnswers']); ?>"> -->

            <div id="submit-container" class=""></div>
          </div>
        </form>


      </div>
    </div>

    <div id="survey-container-button" class="row text-center mt-2">
      <div id="navigation-buttons" class="m-2">
        <div id="button-container" class="m-1"></div>
        <div id="reset-container" class="m-1"></div>
      </div>
    </div>


  </div>


  <script>
  let questions = <?php echo json_encode($questions); ?>
  </script>
  <script src="public/vendor/js/anket.js" defer></script>
  <?php Util::footer(); ?>