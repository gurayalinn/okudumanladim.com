<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif
}

body {
  background: #fff;
}

.wrapper {
  max-width: 600px;
  margin: 80px auto 50px;
  padding: 30px;
  border-radius: 20px;
  background: #c0e2df;
  position: relative;
  min-height: 400px;
  overflow: hidden
}

.wrapper .wrap {
  width: 500px;
  position: absolute;
  left: 50px;
  transition: 0.6s
}

#q2,
#q3 {
  left: 650px
}

.h4 {
  margin: 0
}

label {
  display: block;
  margin-bottom: 15px;
  font-size: 1.2rem;
  cursor: pointer
}

.options {
  position: relative;
  padding-left: 30px
}

.options input {
  opacity: 0
}

.checkmark {
  position: absolute;
  top: 4px;
  left: 3px;
  height: 20px;
  width: 20px;
  background-color: #c0e2df;
  border: 2px solid #444;
  border-radius: 50%
}

.options input:checked~.checkmark:after {
  display: block
}

.options .checkmark:after {
  content: "";
  width: 9px;
  height: 9px;
  display: block;
  background: white;
  position: absolute;
  top: 51%;
  left: 51%;
  border-radius: 50%;
  transform: translate(-50%, -50%) scale(0);
  transition: 300ms ease-in-out 0s
}

.options input[type="radio"]:checked~.checkmark {
  background: #590995;
  border: 2px solid #590995;
  transition: 300ms ease-in-out 0s
}

.options input[type="radio"]:checked~.checkmark:after {
  transform: translate(-50%, -50%) scale(1)
}

.btn.btn-primary {
  background-color: rgb(63, 139, 139);
  border: 1px solid rgb(63, 139, 139)
}

.btn {
  background-color: inherit;
  border: 1px solid rgb(63, 139, 139);
  border-radius: 20%;
  padding: 0.5em;
}

.btn:focus {
  box-shadow: none
}

.btn:hover {
  background-color: teal;
  color: #fff
}

.fa-arrow-right,
.fa-arrow-left {
  transition: 0.2s ease-in all
}

.btn.btn-primary:hover .fa-arrow-right {
  transform: translate(8px)
}

.btn.btn-primary:hover .fa-arrow-left {
  transform: translate(-8px)
}

@media(max-width: 767px) {
  .wrapper {
    margin: 30px 10px;
    height: 420px
  }

  .wrapper .wrap {
    width: 280px;
    left: 15px
  }
}

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 28px;
  background-color: inherit
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s
}

.slider:before {
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  left: 4px;
  bottom: 4px;
  background-color: #590995;
  -webkit-transition: .4s;
  transition: .4s
}

input:checked+.slider {
  background-color: #000
}

input:focus+.slider {
  box-shadow: 0 0 1px #2196F3
}

input:checked+.slider:before {
  transform: translateX(30px);
  background-color: #fff
}

.slider.round {
  border-radius: 34px
}

.slider.round:before {
  border-radius: 50%
}

.dark-theme {
  background-color: #222
}
</style>



<div class="wrapper">
  <div class="wrap" id="q1">
    <div class="text-center pb-4">
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
    <div class="d-flex justify-content-end pt-2"> <button class="btn btn-primary" id="next1">ILERI ></button>
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

    <div class="d-flex justify-content-end pt-2"> <button class="btn btn-primary mx-3" id="back1">
        < GERI</button>
          <button class="btn btn-primary" id="next2">ILERI ><span class="fas fa-arrow-right"></span> </button>
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
    <div class="d-flex justify-content-end pt-2"> <button class="btn btn-primary mx-3" id="back2"> <span
          class="fas fa-arrow-left pr-2"></span>
        < GERI</button> <button class="btn btn-primary" id="next3">ONAYLA
          </button> </div>
  </div>
  <!-- </div>
<div class="d-flex flex-column align-items-center">
  <div class="h3 font-weight-bold text-white">Go Dark</div> <label class="switch"> <input type="checkbox"> <span
      class="slider round"></span> </label>
</div> -->


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
        q1.style.left = "-650px";
        q2.style.left = "15px";
      }
      back1.onclick = function() {
        q1.style.left = "15px";
        q2.style.left = "650px";
      }
      back2.onclick = function() {
        q2.style.left = "15px";
        q3.style.left = "650px";
      }
      next2.onclick = function() {
        q2.style.left = "-650px";
        q3.style.left = "15px";
      }
    } else {
      next1.onclick = function() {
        q1.style.left = "-650px";
        q2.style.left = "50px";
      }
      back1.onclick = function() {
        q1.style.left = "50px";
        q2.style.left = "650px";
      }
      back2.onclick = function() {
        q2.style.left = "50px";
        q3.style.left = "650px";
      }
      next2.onclick = function() {
        q2.style.left = "-650px";
        q3.
        style.left = "50px";
      }
    }
  });


  function uncheck() {
    var rad = document.getElementById('rd')
    rad.removeAttribute('checked')
  }
  // document.addEventListener('DOMContentLoaded', function() {
  //   const main = document.querySelector('body')
  //   const toggleSwitch = document.querySelector('.slider')

  //   toggleSwitch.addEventListener('click', () => {
  //     main.classList.toggle('dark-theme')
  //   })
  // })
  </script>