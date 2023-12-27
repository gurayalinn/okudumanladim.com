<header>
  <div class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
    <nav style="background-color: var(--bs-body-bg);   border-radius: 1vh;
  border-bottom: 0.1em solid var(--bs-tertiary-color);
  box-shadow: 0 0 0.2em var(--bs-tertiary-color);
" aria-label="Navigation" role="navigation"
      class="container-fluid navbar navbar-dark fixed-top d-flex flex-row justify-content-around"
      data-bs-theme="var(--bs-body-bg)">
      <a class="navbar-brand link-info mobile or lower hidden  fw-semibold fs-5 font-monospace"
        style="color: var(--bs-body-color);" href="#" aria-label="Home" title="Home">
        <img src="/public/assets/images/favicon.svg" alt="okudumanladim.com" width="60" height="auto"
          class="d-inline-block align-text-top">
        okudumanladim.com
      </a>
      <a class="navbar-brand link-info mobile only d-md-none" style="color: var(--bs-body-color);" href="#"
        aria-label="Home" title="Home">
        <img src="/public/assets/images/favicon.svg" alt="okudumanladim.com" width="60" height="auto"
          class="d-inline-block align-text-top">
      </a>
      <a class="nav-link mobile hidden tablet hidden fw-semibold fs-5 font-monospace"
        style="color: var(--bs-body-color);" href="/survey">SURVEY</a>
      <a class="nav-link mobile onyl tablet only fw-semibold fs-5 font-monospace" style="color: var(--bs-body-color);"
        href="/survey">SURVEY</a>
      <a class="nav-link mobile hidden tablet hidden fw-semibold fs-5 font-monospace"
        style="color: var(--bs-body-color);" href="/project">PROJECT</a>
      <a class="nav-link mobile hidden tablet hidden fw-semibold fs-5 font-monospace"
        style="color: var(--bs-body-color);" href="/license">LICENSE</a>
      <div class="bd-theme-text" style="text-decoration: none;" class="fs-4" tabindex="0" id="btnSwitch">
        🌞
      </div>
      <div class="mobile only tablet only">

        <button style="background-color: var(--bs-tertiary-bg);"
          class="navbar-toggler d-xxl-none btn btn-light d-flex justify-content-center align-items-center" type="button"
          data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar"
          aria-label="Toggle navigation">
          <span style="color: var(--bs-body-color);" class="fs-3 fw-semibold link-info"> &Xi; </span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
          aria-labelledby="offcanvasDarkNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title fw-semibold fs-4 font-monospace" id="offcanvasDarkNavbarLabel">MENU</h5>
            <button type="button" class="navbar-toggler fs-3 fw-semibold link-info" data-bs-dismiss="offcanvas"
              aria-label="Close">&Chi;
            </button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-2">
              <li class="nav-item">
                <a class="nav-link link-info fw-semibold fs-5 font-monospace" href="/survey">SURVEY</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-semibold fs-5 font-monospace" href="/project">PROJECT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-semibold fs-5 font-monospace" href="/license">LICENSE</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link link-primary dropdown-toggle fw-semibold fs-5 font-monospace" href="#" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  ADMIN
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                  <li><a class="dropdown-item link-success fw-semibold fs-5 font-monospace" href="/policy">LOGIN</a>
                  </li>
                  <li>
                  </li>
                  <div class="dropdown-divider"></div>
                  <li><a class="dropdown-item link-danger fw-semibold fs-5 font-monospace" href="/license">LOGOUT</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>