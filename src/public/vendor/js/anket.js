$(document).ready(function () {
  loadQuestion()
  loadPagination()
})

let localStorageKey = 'userAnswers'
let currentQuestion = 0
let userAnswers = {}

// Sayfa yüklendiğinde local storage kontrolü
let lastQuestionIndex = localStorage.getItem('lastQuestionIndex')
if (lastQuestionIndex !== null && lastQuestionIndex < questions.length) {
  currentQuestion = parseInt(lastQuestionIndex)
  loadQuestion()
}

function loadQuestion() {
  // Sayfa yüklendiğinde LocalStorage'dan kullanıcı cevaplarını al
  let storedUserAnswers = localStorage.getItem(localStorageKey)
  if (storedUserAnswers) {
    userAnswers = JSON.parse(storedUserAnswers)
  }

  if (!questions || questions.length === 0 || !questions[currentQuestion]) {
    console.error('Sorular yüklenemedi.')
    return
  }
  if (currentQuestion >= questions.length) {
    console.error('Sorular bitti.')
    return
  }

  let question = questions[currentQuestion]

  localStorage.setItem('lastQuestionIndex', currentQuestion.toString())

  let html = '<div class="card">'
  html += '<div class="card-body">'

  html +=
    '<strong class="card-title p-1 m-1 fw-semibold fs-6 text-info">#' +
    (currentQuestion + 1) +
    '</strong>'
  html +=
    '<strong class="fw-semibold p-1 m-1 fs-6 text-info">' +
    question.category +
    '</strong>'

  html +=
    '<p class="fw-semibold fs-5 text-light p-1 m-1">' +
    question.question_text +
    '</p>'

  if (question.option_a) {
    html += createOptionButton('A', question.option_a)
  }

  if (question.option_b) {
    html += createOptionButton('B', question.option_b)
  }

  if (question.option_c) {
    html += createOptionButton('C', question.option_c)
  }

  if (question.option_d) {
    html += createOptionButton('D', question.option_d)
  }

  if (userAnswers[currentQuestion] !== undefined) {
    let selectedAnswer = userAnswers[currentQuestion]
    let correctAnswer = question.correct_answer

    let isCorrect = selectedAnswer === correctAnswer
    let isChecked = 'checked="checked"'
    let bgColor = isCorrect ? 'bg-success' /* Doğru cevap */ : 'bg-success' // Yanlış cevap

    html = html.replace(
      isChecked,
      isChecked +
        ' data-toggle="tooltip" data-placement="center" title="Seçiminiz: ' +
        selectedAnswer +
        ', Doğru Cevap: ' +
        correctAnswer +
        '"'
    )
    html = html.replace(
      '<div class="card-body">',
      '<div class="card-body ' + bgColor + '">'
    )
  } else {
    // Seçili cevap yoksa arkaplanı varsayılan yap
    html = html.replace(
      '<div class="card-body">',
      '<div class="card-body bg-secondary">'
    )
  }

  let bgColor =
    userAnswers[currentQuestion] !== undefined
      ? userAnswers[currentQuestion] === question.correct_answer
        ? 'bg-success' // Doğru cevap
        : 'bg-success' // Yanlış cevap
      : 'bg-secondary'
  html = html.replace(
    '<div class="card-body">',
    '<div class="card-body ' + bgColor + '">'
  )

  html += '</div></div>'
  $('#question-container').html(html)

  // Tüm sorular cevaplandıysa question-container'ı gizle
  if (Object.keys(userAnswers).length === questions.length) {
    $('#survey-container-quest').hide()
  }

  checkNavButtonVisibility()
}

function loadPagination() {
  let html = '<nav aria-label="Page navigation example"><ul class="pagination">'

  for (let i = 0; i < questions.length; i++) {
    let questionStatus = getQuestionStatus(i)

    let liClass =
      questionStatus === 'correct'
        ? 'bg-success'
        : questionStatus === 'incorrect'
        ? 'bg-success'
        : 'bg-secondary'

    let textColor = currentQuestion === i ? 'text-light' : 'text-dark' // Seçili olan sorunun rengini siyah yap
    html +=
      '<li class=" page-item ' +
      liClass +
      '"><a class="page-link bg-transparent ' +
      textColor +
      '" href="/anket#">' +
      (i + 1) +
      '</a></li>'
  }

  html += '</ul></nav>'

  $('#pagination-container').html(html)

  $('.pagination li').click(function () {
    currentQuestion = $(this).index()

    loadQuestion()
  })
}

function saveAnswer() {
  let selectedAnswer = $('input[name="answer"]:checked').val()
  userAnswers[currentQuestion] = selectedAnswer

  // Kullanıcı cevaplarını LocalStorage'a kaydet
  localStorage.setItem(localStorageKey, JSON.stringify(userAnswers))
  setCookie('userAnswers', JSON.stringify(userAnswers), 30)

  loadQuestion()
}

function getQuestionStatus(questionIndex) {
  let selectedAnswer = userAnswers[questionIndex]
  if (selectedAnswer === undefined) {
    return 'unanswered'
  }

  let correctAnswer = questions[questionIndex].correct_answer
  return selectedAnswer === correctAnswer ? 'correct' : 'incorrect'
}

function showResults() {
  // Sonuçları kontrol ederek uygun bir şekilde gösterin
  let correctCount = 0

  questions.forEach(function (question, index) {
    let userAnswer = userAnswers[index]
    if (userAnswer !== undefined && userAnswer === question.correct_answer) {
      correctCount++
    }
  })
  localStorage.setItem('userCorrectQuestion', correctCount.toString())

  let correctPercentage = (correctCount / questions.length) * 100

  let correctPercentageCeil = correctPercentage.toFixed(2) + '%'

  let resultMessage =
    'Toplam doğru sayısı: ' +
    correctCount +
    ' / ' +
    questions.length +
    '<br> Başarı oranı ' +
    correctPercentageCeil

  if (correctPercentage >= 80) {
    resultMessage +=
      '<br> <strong class="fw-semibold text-success">Tebrikler, başarılı oldunuz!</strong>'
  } else if (correctPercentage >= 50) {
    resultMessage +=
      '<br> <strong class="fw-semibold text-primary">Başarılı sayılırsınız.</strong>'
  } else {
    resultMessage +=
      '<br> <strong class="fw-semibold text-danger">Başarısız oldunuz.</strong>'
  }

  let alertClass = correctPercentage >= 80 ? 'success' : 'secondary'

  let alertHtml = '<div class="alert alert-' + alertClass + '" role="alert">'
  alertHtml += resultMessage
  alertHtml += '</div>'

  setCookie('result', correctPercentage, 30)
  checkResultVisibility()
  $('#result-container').html(alertHtml)
}

function deleteCookie(cname) {
  // Çerezin süresini geçmiş bir tarihle güncelleyerek silme işlemi
  document.cookie = cname + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;'
}
function setCookie(cname, cvalue, exdays, path) {
  let d = new Date()
  d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000)
  let expires = 'expires=' + d.toUTCString()
  document.cookie = cname + '=' + cvalue + '; ' + expires
}

function createOptionButton(value, text) {
  let isChecked = userAnswers[currentQuestion] === value
  let activeClass = isChecked ? 'active' : ''
  let bgColorClass = isChecked ? 'btn-light' : 'btn-dark'

  let html =
    '<div class="form-check"><label class="form-check-label btn btn-lg ' +
    bgColorClass +
    ' ' +
    activeClass +
    '">'
  html +=
    '<input class="form-check-input text-center m-2 p-2" type="radio" name="answer" value="' +
    value +
    '" ' +
    (isChecked ? 'checked' : '') +
    '>' +
    text
  html += '</label></div>'

  // Seçenek değişikliklerini dinamik olarak takip etmek için event listener ekleyin
  $(document).on('change', 'input[name="answer"]', function () {
    $('label.btn').removeClass('btn-success') // Tüm butonlardan 'btn-success' sınıfını kaldır
    $('input[name="answer"]:checked')
      .closest('label.btn')
      .addClass('btn-success') // Seçili olan butona 'btn-success' sınıfını ekle
  })

  return html
}

function checkResultVisibility() {
  if (Object.keys(userAnswers).length !== questions.length) {
    $('#result-container').hide()
  } else {
    $('#result-container').show()
  }
}

function checkNavButtonVisibility() {
  // "Gönder" butonunu kontrol et
  if (Object.keys(userAnswers).length !== questions.length) {
    // Tüm sorular cevaplanmamışsa "Gönder" butonunu devre dışı bırak
    $('#submit-btn').prop('disabled', true)
  } else {
    // Tüm sorular cevaplandıysa "Gönder" butonunu etkinleştir
    $('#submit-btn').prop('disabled', false)
    showResults()
  }

  // "Önceki" butonunu kontrol et
  if (currentQuestion === 0) {
    $('#prev-btn').prop('disabled', true)
  } else {
    $('#prev-btn').prop('disabled', false)
    $('#prev-btn').show()
  }

  // "Sonraki" butonunu kontrol et
  if (currentQuestion === questions.length - 1) {
    $('#next-btn').prop('disabled', true)
  } else {
    $('#next-btn').prop('disabled', false)
    $('#next-btn').show()
  }

  if (Object.keys(userAnswers).length === questions.length) {
    $('#next-btn').hide()
    $('#next-btn').prop('disabled', true)
    $('#prev-btn').prop('disabled', true)
    $('#prev-btn').hide()
    $('#user-container').removeAttr('hidden')
  }
}

function updatePagination() {
  $('.pagination li').removeClass('active') // Tüm sayfa numaralarından 'active' sınıfını kaldır
  $('.pagination li:eq(' + currentQuestion + ')').addClass('active') // Şuanki soru numarasına 'active' sınıfını ekle
  loadPagination()
  checkNavButtonVisibility()
}

function goToNextQuestion() {
  saveAnswer()
  currentQuestion++
  updatePagination()
  loadQuestion()
}

function goToPreviousQuestion() {
  saveAnswer()
  currentQuestion--
  updatePagination()
  loadQuestion()
}

// İleri ve geri butonları için event listener'lar
$('#pagination-container').on('click', '.pagination li', function () {
  currentQuestion = $(this).index()
  updatePagination()
  loadQuestion()
})

$('#button-container').append(
  '<button class="btn btn-lg p-2 m-2 btn-secondary" id="prev-btn">⬅ Geri</button>'
)
$('#button-container').append(
  '<button class="btn btn-lg p-2 m-2 btn-secondary" id="next-btn">İleri ➡</button>'
)

$('#prev-btn').click(function () {
  goToPreviousQuestion()
})

$('#next-btn').click(function () {
  goToNextQuestion()
})

$('#question-container').on('change', 'input[name="answer"]', function () {
  saveAnswer()
})

$('#pagination-container').on('click', '.pagination li', function () {
  saveAnswer()
})
$('#reset-container').append(
  '<a class="link-info text-white text-decoration-none" href="/logout"><button class="btn-danger btn btn-md btn-outline-white btn-block" id="reset-btn">Sıfırla ❌</button></a>'
)
$('#submit-container').append(
  '<button class="btn-success btn btn-md btn-outline-white btn-block" data-umami-event="anketBitir"  name="register" id="submit-btn">Gönder ✔</button>'
)

$('#submit-btn').click(function () {
  saveAnswer()
})
// Sıfırla butonu için event listener ekle
$('#reset-btn').click(function () {
  // LocalStorage'ı temizle
  localStorage.removeItem(localStorageKey)
  deleteCookie('result')
  deleteCookie('userAnswers')
  document.cookie = 'sonuc=true; max-age=0; path=/'
  document.cookie = 'sonuc=true; max-age=0; path=/sonuc'
  // Kullanıcı cevapları ve arka plan renklerini sıfırla
  userAnswers = {}
  $('.pagination li').removeClass('bg-success bg-danger bg-dark')
  $('label.btn').removeClass('btn-success')

  loadQuestion()
  localStorage.removeItem('lastQuestionIndex')
  localStorage.removeItem('userCorrectQuestion')
  localStorage.removeItem('userAnswers')

  location.reload()
})
