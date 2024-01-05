<?php if ($_SERVER['REQUEST_URI'] == '/anket') : ?>
<?php
$description = "okudumanladim.com, kişisel bilgi güvenliği farkındalığının artırılmasına yönelik interaktif web
platformu.";
$keywords = "Siber Güvenlik, Bilgi Güvenliği, Siber Tehditler, Ağ Güvenliği, Veri Koruma, Kötü Amaçlı Yazılımlar,
Şifreleme, Güvenlik Duvarı, Kimlik Doğrulama, Sızma Testi";
$title = "ANKET | okudumanladim.com";
?>

<?php include_once('inc/layout/head.php'); ?>

<?php endif; ?>
<style>
.wrapper2 {
  margin: 0;
  padding: 0;
  min-height: 100vh;
  width: auto;
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
}

.wrapper2 .wrap {
  position: absolute;
  left: auto;
  right: auto;
  transition: 0.6s;
  background-color: var(--bs-body-bg);
  border-radius: 3vh;
  padding: 2%;
  width: 60%;
  min-height: 70vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: left;
  box-shadow: 0 0 0.1vw 0.2vw var(--bs-body-color);
}

.wrapper2 .wrap:nth-child(2) {
  display: none;
}

.wrapper2 .wrap:nth-child(3) {
  display: none;
}

label {
  display: block;
  margin-bottom: 2vh;
  font-size: 1.2rem;
  cursor: pointer;
}

.options {
  position: relative;
  padding-left: 8%;
  margin-bottom: 6vh;
  padding-top: 1vh;
  padding-bottom: 1vh;
}

.options input {
  opacity: 0
}

.checkmark {
  position: absolute;
  top: 1.5vh;
  left: 0;
  height: 4vh;
  width: 4vh;
  background-color: var(--bs-body-bg);
  border: 0.1vw solid var(--bs-body-color);
  border-radius: 50%
}

.options input:checked~.checkmark:after {
  display: block
}

.options .checkmark:after {
  height: 4vh;
  width: 4vh;
  display: block;
  position: relative;
  top: 51%;
  left: 51%;
  border-radius: 50%;
  transform: translate(-50%, -50%) scale(0);
  transition: 300ms ease-in-out 0s
}

.options input[type="radio"]:checked~.checkmark {
  background: var(--bs-info);
  border: 0.1vw solid var(--bs-body-color);
  transition: 300ms ease-in-out 0s
}

.options input[type="radio"]:checked~.checkmark:after {
  transform: translate(-50%, -50%) scale(1)
}


.btn-custom {
  background-color: var(--bs-body-color) !important;
  border-color: var(--bs-body-color) !important;
  color: var(--bs-body-bg) !important;
}
</style>



<div class="wrapper2">

  <!-- Q1 -->
  <div class="wrap" id="q1">
    <div class="text-center mb-4">
      <div class="h5 font-weight-bold"><span id="number"> </span>1 > 3</div>
    </div>
    <div class="h4 font-weight-bold"> 1. ORNEK SORU ?</div>
    <hr>
    <div class="mt-4">
      <form> <label class="options">SECENEK - 1<input type="radio" name="radio"> <span class="checkmark"></span>
        </label> <label class="options">SECENEK - 2<input type="radio" name="radio"> <span class="checkmark"></span>
        </label> <label class="options">SECENEK - 3<input type="radio" name="radio" id="rd" checked> <span
            class="checkmark"></span> </label> <label class="options">SECENEK - 4<input type="radio" name="radio">
          <span class="checkmark"></span> </label> </form>
    </div>
    <div class="d-flex justify-content-end pt-2"> <button class="btn btn-custom" id="next1">ILERI ></button>
    </div>
  </div>

  <!-- Q2 -->
  <div class="wrap" id="q2">
    <div class="text-center mb-4">
      <div class="h5 font-weight-bold"> <span id="number"> </span>2 > 3 </div>
    </div>
    <div class="h4 font-weight-bold"> 2. ORNEK SORU ?</div>
    <hr>
    <div class="mt-4">
      <form> <label class="options">SECENEK - 1<input type="radio" name="radio"> <span class="checkmark"></span>
        </label> <label class="options">SECENEK - 2<input type="radio" name="radio"> <span class="checkmark"></span>
        </label> <label class="options">SECENEK - 3<input type="radio" name="radio" id="rd" checked> <span
            class="checkmark"></span> </label> <label class="options">SECENEK - 4<input type="radio" name="radio">
          <span class="checkmark"></span> </label> </form>
    </div>

    <div class="d-flex justify-content-end pt-2"> <button class="btn btn-custom mx-3" id="back1">
        < GERI</button>
          <button class="btn btn-custom" id="next2">ILERI ></button>
    </div>
  </div>

  <!-- Q3 -->
  <div class="wrap" id="q3">
    <div class="text-center mb-4">
      <div class="h5 font-weight-bold"> <span id="number"> </span>3 > 3 </div>
    </div>
    <div class="h4 font-weight-bold"> 3. ORNEK SORU ?</div>
    <hr>
    <div class="mt-4">
      <form> <label class="options">SECENEK - 1<input type="radio" name="radio"> <span class="checkmark"></span>
        </label> <label class="options">SECENEK - 2<input type="radio" name="radio"> <span class="checkmark"></span>
        </label> <label class="options">SECENEK - 3<input type="radio" name="radio" id="rd" checked> <span
            class="checkmark"></span> </label> <label class="options">SECENEK - 4<input type="radio" name="radio">
          <span class="checkmark"></span> </label> </form>
    </div>
    <div class="d-flex justify-content-end pt-2"> <button class="btn btn-custom mx-3" id="back2">
        < GERI</button>
          <button data-umami-event="anketBitir" class="btn btn-success" id="submitAnket">ONAYLA
          </button>
    </div>
  </div>

  <script>
  var q1 = document.getElementById("q1");
  var q2 = document.getElementById("q2");
  var q3 = document.getElementById("q3");

  var next1 = document.getElementById('next1')
  var back1 = document.getElementById('back1')
  var next2 = document.getElementById('next2')
  var back2 = document.getElementById('back2')
  document.addEventListener('DOMContentLoaded', function() {

    next1.onclick = function() {
      q1.style.display = "none";
      q2.style.display = "block";
    }
    next2.onclick = function() {
      q2.style.display = "none";
      q3.style.display = "block";
    }
    back1.onclick = function() {
      q1.style.display = "block";
      q2.style.display = "none";
    }
    back2.onclick = function() {
      q2.style.display = "block";
      q3.style.display = "none";
    }
  });


  function uncheck() {
    let rad = document.getElementById('rd')
    rad.removeAttribute('checked')
  }
  </script>

  <?php if ($_SERVER['REQUEST_URI'] == '/anket') : ?>
  <?php include_once('inc/layout/footer.php'); ?>
  <?php endif; ?>