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

// const umami = (function () {
//   umami.trackEvent = function (type, data) {
//     if (typeof umamiTracker !== 'undefined') {
//       umamiTracker.trackEvent(type, data)
//     }
//   }
//   return umami
// })(umami || {})

// umami.trackEvent('pageview', {
//   event_category: 'pageview',
//   event_action: 'pageview',
//   event_label: window.location.href
// })

// // UMAMI EVENT TRACKING
// document.addEventListener('DOMContentLoaded', function () {
//   document.querySelectorAll('a').forEach((link) => {
//     link.addEventListener('click', (event) => {
//       if (link.href.startsWith(window.location.origin)) {
//         umami.trackEvent('click', {
//           event_category: 'internal_link',
//           event_action: 'click',
//           event_label: link.href
//         })
//       } else {
//         umami.trackEvent('click', {
//           event_category: 'external_link',
//           event_action: 'click',
//           event_label: link.href
//         })
//       }
//     })
//   })
// })

// // UMAMI EVENT TRACKING
// document.addEventListener('DOMContentLoaded', function () {
//   document.querySelectorAll('button').forEach((button) => {
//     button.addEventListener('click', (event) => {
//       umami.trackEvent('click', {
//         event_category: 'button',
//         event_action: 'click',
//         event_label: button.innerText
//       })
//     })
//   })
// })

// // UMAMI EVENT TRACKING

// document.querySelectorAll('select').forEach((select) => {
//   select.addEventListener('change', (event) => {
//     umami.trackEvent('change', {
//       event_category: 'select',
//       event_action: 'change',
//       event_label: select.innerText
//     })
//   })
// })

// // UMAMI EVENT TRACKING

// document.querySelectorAll('form').forEach((form) => {
//   form.addEventListener('submit', (event) => {
//     umami.trackEvent('submit', {
//       event_category: 'form',
//       event_action: 'submit',
//       event_label: form.innerText
//     })
//   })
// })
