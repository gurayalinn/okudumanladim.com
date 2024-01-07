<?php if ($_SERVER['REQUEST_URI'] == '/anket') : ?>
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

Util::head('ANKET');
   $stmt = $con->query("SELECT * FROM questions");
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php endif; ?>


<div id="survey" class="container d-flex justify-content-center align-items-center clearfix">

  <div id="loader" class="loader">
    <img src="public/assets/images/favicon.svg" alt="loader">
  </div>
  <div id="survey-wrapper" class="survey-wrapper col text-center">

    <div id="survey-result-container" class="row">
      <div id="result-container" class=""></div>
    </div>

    <div id="survey-container-quest" class="row mt-2">
      <div id="question-container"></div>
    </div>

    <div id="survey-container-pagination" class="row mt-2">
      <div id="pagination-container" class=""></div>
    </div>


    <div id="survey-container-button" class="row mt-2">
      <div id="navigation-buttons" class="">
        <div id="button-container" class=""></div>
        <div id="submit-container" class=""></div>
      </div>
    </div>


  </div>
</div>


<?php if ($_SERVER['REQUEST_URI'] == '/anket') : ?>
<script>
let questions = <?php echo json_encode($questions); ?>
</script>
<?php Util::footer(); ?>
<script src="public/vendor/js/anket.js" defer></script>

<?php endif; ?>