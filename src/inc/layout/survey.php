<?php
$description = "okudumanladim.com, kişisel bilgi güvenliği farkındalığının artırılmasına yönelik interaktif web
platformu.";
$keywords = "Siber Güvenlik, Bilgi Güvenliği, Siber Tehditler, Ağ Güvenliği, Veri Koruma, Kötü Amaçlı Yazılımlar,
Şifreleme, Güvenlik Duvarı, Kimlik Doğrulama, Sızma Testi";
$title = "SURVEY | okudumanladim.com";
?>


<?php require_once('inc/layout/head.php'); ?>

<style>
.wrapper2 {
  margin: 0;
  padding: 10%;
  border-radius: 5vh;
  position: absolute;
  min-height: 100vh;
  min-width: 100vw;
}

.wrapper2 .wrap {
  width: auto;
  position: absolute;
  left: 5vw;
  transition: 0.6s
}

.wrapper2 .wrap:nth-child(2) {
  left: 50%
}

label {
  display: block;
  margin-bottom: 2vh;
  font-size: 1.2rem;
  cursor: pointer
}

.options {
  position: relative;
  padding-left: 2vw;
}

.options input {
  opacity: 0
}

.checkmark {
  position: absolute;
  top: 1.5vh;
  left: 0;
  height: 2vh;
  width: 1vw;
  background-color: var(--bs-body-bg);
  border: 2px solid var(--bs-body-color);
  border-radius: 50%
}

.options input:checked~.checkmark:after {
  display: block
}

.options .checkmark:after {
  width: 1vw;
  height: 2vh;
  display: block;
  position: absolute;
  top: 51%;
  left: 51%;
  border-radius: 50%;
  transform: translate(-50%, -50%) scale(0);
  transition: 300ms ease-in-out 0s
}

.options input[type="radio"]:checked~.checkmark {
  background: var(--bs-body-color);
  border: 2px solid var(--bs-body-bg);
  transition: 300ms ease-in-out 0s
}

.options input[type="radio"]:checked~.checkmark:after {
  transform: translate(-50%, -50%) scale(1)
}


.fa-arrow-right,
.fa-arrow-left {
  transition: 0.2s ease-in all
}

.btn.btn-info:hover .fa-arrow-right {
  transform: translate(1vw)
}

.btn.btn-info:hover .fa-arrow-left {
  transform: translate(1vw)
}

@media(max-width: 767px) {
  .wrapper2 {
    margin: 5% auto;
    height: 50vh
  }

  .wrapper2 .wrap {
    width: 20%;
    left: 1vw;
  }
}
</style>



<div class="wrapper2">
  <div class="wrap" id="q1">
    <div class="text-center pb-8">
      <div class="h5 font-weight-bold"><span id="number"> </span>1 > 3</div>
    </div>
    <div class="h4 font-weight-bold"> 1. ORNEK SORU ?</div>
    <hr>
    <div class="pt-4 mt-4">
      <form> <label class="options">SECENEK - 1<input type="radio" name="radio"> <span class="checkmark"></span>
        </label> <label class="options">SECENEK - 2<input type="radio" name="radio"> <span class="checkmark"></span>
        </label> <label class="options">SECENEK - 3<input type="radio" name="radio" id="rd" checked> <span
            class="checkmark"></span> </label> <label class="options">SECENEK - 4<input type="radio" name="radio">
          <span class="checkmark"></span> </label> </form>
    </div>
    <div class="d-flex justify-content-end pt-2"> <button class="btn btn-info" id="next1">ILERI ></button>
    </div>
  </div>
  <div class="wrap" id="q2">
    <div class="text-center pb-4">
      <div class="h5 font-weight-bold"> <span id="number"> </span>2 > 3 </div>
    </div>
    <div class="h4 font-weight-bold"> 2. ORNEK SORU ?</div>
    <hr>
    <div class="pt-4 mt-4">
      <form> <label class="options">SECENEK - 1<input type="radio" name="radio"> <span class="checkmark"></span>
        </label> <label class="options">SECENEK - 2<input type="radio" name="radio"> <span class="checkmark"></span>
        </label> <label class="options">SECENEK - 3<input type="radio" name="radio" id="rd" checked> <span
            class="checkmark"></span> </label> <label class="options">SECENEK - 4<input type="radio" name="radio">
          <span class="checkmark"></span> </label> </form>
    </div>

    <div class="d-flex justify-content-end pt-2"> <button class="btn btn-info mx-3" id="back1">
        < GERI</button>
          <button class="btn btn-info" id="next2">ILERI ><span class="fas fa-arrow-right">X</span> </button>
    </div>
  </div>
  <div class="wrap" id="q3">
    <div class="text-center pb-4">
      <div class="h5 font-weight-bold"> <span id="number"> </span>3 > 3 </div>
    </div>
    <div class="h4 font-weight-bold"> 3. ORNEK SORU ?</div>
    <hr>
    <div class="pt-4 mt-4">
      <form> <label class="options">SECENEK - 1<input type="radio" name="radio"> <span class="checkmark"></span>
        </label> <label class="options">SECENEK - 2<input type="radio" name="radio"> <span class="checkmark"></span>
        </label> <label class="options">SECENEK - 3<input type="radio" name="radio" id="rd" checked> <span
            class="checkmark"></span> </label> <label class="options">SECENEK - 4<input type="radio" name="radio">
          <span class="checkmark"></span> </label> </form>
    </div>
    <div class="d-flex justify-content-end pt-2"> <button class="btn btn-info mx-3" id="back2"><span
          class="fas fa-arrow-left">X</span>
        < GERI</button> <button class="btn btn-info" id="next3">ONAYLA
          </button> </div>
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
    let query = window.matchMedia("(max-width: 767px)");
    if (query.matches) {
      next1.onclick = function() {
        q1.style.left = "-50%";
        q2.style.left = "1vw";
      }
      back1.onclick = function() {
        q1.style.left = "1vw";
        q2.style.left = "50%";
      }
      back2.onclick = function() {
        q2.style.left = "1vw";
        q3.style.left = "50%";
      }
      next2.onclick = function() {
        q2.style.left = "-50%";
        q3.style.left = "1vw";
      }
    } else {
      next1.onclick = function() {
        q1.style.left = "-50%";
        q2.style.left = "3vw";
      }
      back1.onclick = function() {
        q1.style.left = "3vw";
        q2.style.left = "50%";
      }
      back2.onclick = function() {
        q2.style.left = "3vw";
        q3.style.left = "50%";
      }
      next2.onclick = function() {
        q2.style.left = "50%";
        q3.
        style.left = "3vw";
      }
    }
  });


  function uncheck() {
    var rad = document.getElementById('rd')
    rad.removeAttribute('checked')
  }
  </script>

  <?php require_once('inc/layout/footer.php'); ?>