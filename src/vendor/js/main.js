// ANCHOR DEFAULT FUNCTION RESET
document.querySelectorAll('.content [href="#"]').forEach((link) => {
  link.addEventListener('click', (event) => {
    event.preventDefault()
  })
})

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

//BACK TO TOP
let topButton = document.getElementById('btn-back-to-top')

window.onscroll = function () {
  scrollFunction()
}

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    topButton.style.display = 'block'
  } else {
    topButton.style.display = 'none'
  }
}

topButton.addEventListener('click', backToTop)

function backToTop() {
  document.body.scrollTop = 0
  document.documentElement.scrollTop = 0
}

// DARK MODE TOGGLE
document.getElementById('btnSwitch').addEventListener('click', () => {
  if (document.documentElement.getAttribute('data-bs-theme') == 'dark') {
    document.documentElement.setAttribute('data-bs-theme', 'light')
  } else {
    document.documentElement.setAttribute('data-bs-theme', 'dark')
  }
})

function updateTheme() {
  const colorMode = window.matchMedia('(prefers-color-scheme: dark)').matches
    ? 'dark'
    : 'light'
  document.querySelector('html').setAttribute('data-bs-theme', colorMode)
}

updateTheme()

window
  .matchMedia('(prefers-color-scheme: dark)')
  .addEventListener('change', updateTheme)

//DisableDevtool()

document.documentElement.className = document.documentElement.className.replace(
  'no-js',
  'js'
)
