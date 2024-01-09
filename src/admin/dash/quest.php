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

    if (isset($_POST["addQuestion"])) {
         $question_text = $_POST['question_text'];
         $option_a = $_POST['option_a'];
         $option_b = $_POST['option_b'];
         $option_c = $_POST['option_c'];
         $option_d = $_POST['option_d'];
         $category = $_POST['category'];
         $correct_answer = $_POST['correct_answer'];
         $admin->addQuestion($question_text, $option_a, $option_b, $option_c, $option_d, $category, $correct_answer);
        }

        if (isset($_POST["delQuest"])) {
          $rowID = $_POST['delQuest'];
          $admin->delQuestion($rowID);
        }

    //header("location: " . Util::display($_SERVER['PHP_SELF']));

}

?>



<div class="container my-4">
  <div class="row">

    <?php Util::adminNavbar(); ?>



    <!--Insert Question Form-->

    <div class="container mb-5">
      <form method="POST" class="bg-dark text-light p-4 rounded mx-auto"
        action="<?= Util::display($_SERVER['PHP_SELF']); ?>">

        <div class="form-group input-group input-group-md m-2">
          <input type="text" class="form-control form-control-md" placeholder="Soru" name="question_text" minlength="3"
            aria-label="question_text" aria-describedby="basic-addon1" autocomplete="off" required>
        </div>

        <div class="form-group input-group input-group-md m-2">
          <input type="text" class="form-control form-control-md" placeholder="A şıkkı" name="option_a" minlength="1"
            aria-label="option_a" aria-describedby="basic-addon1" autocomplete="off" required>
        </div>

        <div class="form-group input-group input-group-md m-2">
          <input type="text" class="form-control form-control-md" placeholder="B şıkkı" name="option_b" minlength="1"
            aria-label="option_b" aria-describedby="basic-addon1" autocomplete="off" required>
        </div>

        <div class="form-group input-group input-group-md m-2">
          <input type="text" class="form-control form-control-md" placeholder="C şıkkı" name="option_c" minlength="1"
            aria-label="option_c" aria-describedby="basic-addon1" autocomplete="off" required>
        </div>

        <div class="form-group input-group input-group-md m-2">
          <input type="text" class="form-control form-control-md" placeholder="D şıkkı" name="option_d" minlength="1"
            aria-label="option_d" aria-describedby="basic-addon1" autocomplete="off" required>
        </div>

        <div class="row">

          <div class="col-md-4 mb-2">
            <div class="form-group input-group input-group-md m-2">
              <label for="category" class="form-label text-light"></label>
              <select class="form-select bg-dark text-light" aria-label="category" name="category" required>
                <option selected>Kategori Seçiniz</option>
                <option value="0">Genel</option>
                <option value="1">Siber Güvenlik</option>
                <option value="2">Şifre Güvenliği</option>
                <option value="3">Bilisim Hukuku</option>
                <option value="4">Dijital Okuryazarlık</option>
                <option value="5">Sosyal Mühendislik</option>
                <option value="6">Mahremiyet ve Gizlilik</option>
                <option value="7">Kişisel Verilerin Korunması</option>
                <option value="8">Dijital Lisanslar</option>
                <option value="9">KVKK ve Veri Güvenliği</option>
                <option value="10">Siber Zorbalık</option>
              </select>
            </div>
          </div>

          <div class="col-md-4 m-2">
            <div class="form-group input-group input-group-md">
              <label for="category" class="form-label text-light"></label>
              <select class="form-select bg-dark text-light" aria-label="correctAnswer" name="correct_answer" required>
                <option selected>Doğru Cevap</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
              </select>
            </div>
          </div>

          <div class="form-group input-group input-group-md m-2 col-md-4">
            <button type="submit" name="addQuestion" class="btn btn-info btn-md btn-block">Soru Ekle</button>
          </div>

        </div>
      </form>
    </div>



    <div class="col-12 mt-3 mb-2 table-responsive">
      <table class="rounded table table-dark table-sm caption-top table-bordered table-hover table-striped">

        <thead>
          <tr>
            <th scope="col" class="">id</th>
            <th scope="col" class="">question_text</th>
            <th scope="col">option_a</th>
            <th scope="col">option_b</th>
            <th scope="col">option_c</th>
            <th scope="col">option_d</th>
            <th scope="col" class="">category</th>
            <th scope="col">correct_answer</th>
            <th scope="col">DELETE</th>
          </tr>
        </thead>

        <tbody>

          <!--Loop for number of rows-->
          <?php foreach ($questions as $row) : ?>
          <tr>

            <th scope="row" class="text-center"><?= Util::display($row->id); ?></th>

            <td><?= Util::display($row->question_text); ?></td>

            <td class=""><?= Util::display($row->option_a); ?></td>
            </td>
            <td class=""><?= Util::display($row->option_b); ?></td>
            </td>
            <td class=""><?= Util::display($row->option_c); ?></td>
            </td>
            <td class=""><?= Util::display($row->option_d); ?></td>
            <td class=""><?= Util::display($row->category); ?></td>
            <td class=""><?= Util::display($row->correct_answer); ?></td>

            <td>
              <form method="POST" action="<?= Util::display($_SERVER['PHP_SELF']); ?>">
                <button value="<?= Util::display($row->id); ?>" name="delQuest" title="Delete question"
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

</div>
<?php Util::footer(); ?>

<script>
$(document).ready(function() {
  $('[data-toggle="tooltip"]').tooltip();
});
</script>