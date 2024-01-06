document.documentElement.className = document.documentElement.className.replace(
  'no-js',
  'js'
)

//POPUP WINDOW PROTECTION
function openPopup(url, name, windowFeatures) {
  //Open the popup and set the opener and referrer policy instruction
  var newWindow = window.open(
    url,
    name,
    'noopener,noreferrer,' + windowFeatures
  )
  newWindow.opener = null
}

document.addEventListener('DOMContentLoaded', function () {
  // ANCHOR DEFAULT FUNCTION RESET
  document.querySelectorAll('.content [href="#"]').forEach((link) => {
    link.addEventListener('click', (event) => {
      event.preventDefault()
    })
  })

  //BACK TO TOP
  let topButton = document.getElementById('btn-back-to-top')
  topButton.addEventListener('click', backToTop)

  function backToTop() {
    document.body.scrollTop = 0
    document.documentElement.scrollTop = 0
  }
  window.onscroll = function () {
    scrollFunction()
  }

  function scrollFunction() {
    if (
      document.body.scrollTop > 20 ||
      document.documentElement.scrollTop > 20
    ) {
      topButton.style.display = 'block'
    } else {
      topButton.style.display = 'none'
    }
  }
  $(document).ready(function () {
    $('#btn-back-to-top').click(function () {
      $('html, body').animate({ scrollTop: 0 }, 300)
      return
    })
  })
})

// LOADER ANIMATION
$(window).on('load', function () {
  $('.loader').delay(300).fadeOut('slow')
})

document.addEventListener('DOMContentLoaded', function () {
  // DARK MODE TOGGLE
  document.getElementById('btnSwitch').addEventListener('click', () => {
    if (document.documentElement.getAttribute('data-bs-theme') == 'dark') {
      document.documentElement.setAttribute('data-bs-theme', 'light')
      btnSwitch.innerHTML = '🌚'
    } else {
      document.documentElement.setAttribute('data-bs-theme', 'dark')
      btnSwitch.innerHTML = '🌞'
    }
  })
})

// ONLY /login PAGE scripts
// if (window.location.pathname === '/login') {
//   document.addEventListener('DOMContentLoaded', function () {
//     const loginForm = document.getElementById('loginForm')
//     loginForm.addEventListener('submit', (event) => {
//       event.preventDefault()
//       if (loginForm.checkValidity() === false) {
//         event.stopPropagation()
//       } else {
//         loginForm.classList.add('was-validated')
//         loginForm.submit()
//       }
//     })
//   })
// }
if (window.location.pathname === '/lisans') {
  document.addEventListener('DOMContentLoaded', function () {
    const tabEl = document.querySelector('button[data-bs-toggle="tab"]')
    tabEl.addEventListener('shown.bs.tab', (event) => {
      event.target // newly activated tab
      event.relatedTarget // previous active tab
    })
    const bsTab = new bootstrap.Tab('#tab')
    bsTab.show()
    const triggerTabList = document.querySelectorAll('#tab button')
    triggerTabList.forEach((triggerEl) => {
      const tabTrigger = new bootstrap.Tab(triggerEl)

      triggerEl.addEventListener('click', (event) => {
        event.preventDefault()
        tabTrigger.show()
      })
    })

    const triggerEl = document.querySelector(
      '#tab button[data-bs-target="#second"]'
    )
    bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name

    const triggerFirstTabEl = document.querySelector(
      '#tab li:first-child button'
    )
    bootstrap.Tab.getInstance(triggerFirstTabEl).show() // Select first tab
  })
}

if (window.location.pathname === '/') {
  document.addEventListener('DOMContentLoaded', function () {
    $('#onay').click(function () {
      if ($(this).is(':checked')) {
        document.cookie = 'onay=true; max-age=86400; path=/anket'
        document.cookie = 'onay=false; max-age=0; path=/'

        $('#anketbtn').removeAttr('disabled')
        $('#anketbtn').addClass('btn-info')
      } else {
        $('#anketbtn').attr('disabled', 'disabled')
        $('#anketbtn').removeClass('btn-info')
      }
    })
  })
}

if (window.location.pathname === '/anket') {
  document.addEventListener('DOMContentLoaded', function () {
    $('#submitAnket').click(function () {
      document.cookie = 'sonuc=true; max-age=86400; path=/sonuc'
      document.cookie = 'sonuc=false; max-age=0; path=/'
      window.location.href = '/sonuc'
    })
    if (document.cookie.indexOf('onay=true') == -1) {
      document.cookie = 'onay=false; max-age=86400; path=/'
      window.location.href = '/'
    }
  })
}

if (window.location.pathname === '/') {
  document.addEventListener('DOMContentLoaded', function () {
    if (document.cookie.indexOf('onay=false') == -1) {
      $('#onayAlert').attr('hidden')
    } else {
      if (!$('#onayAlert').is(':visible')) {
        $('#onayAlert').removeAttr('hidden')
      }
    }

    if (document.cookie.indexOf('sonuc=false') == -1) {
      $('#sonucAlert').attr('hidden')
    } else {
      if (!$('#sonucAlert').is(':visible')) {
        $('#sonucAlert').removeAttr('hidden')
      }
    }
  })
}

if (window.location.pathname === '/sonuc') {
  document.addEventListener('DOMContentLoaded', function () {
    if (document.cookie.indexOf('sonuc=true') == -1) {
      document.cookie = 'sonuc=false; max-age=86400; path=/'
      window.location.href = '/'
    }
  })
}
