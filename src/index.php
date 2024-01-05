<?php require_once('inc/layout/head.php'); ?>


<section class="mt-4" aria-label="Home">
  <div class="container">
    <div class="row">
      <!-- <img src="favicon.svg" alt="logo" class="rounded mx-auto d-block float-start img-fluid img-responsive"> -->
      <div class="col">
        <h1 class="fs-1"><strong>okudumanladim.com</strong></h1>


        <h2 class="fw-normal fs-2 mt-4">
          Bilgi güvenliği farkındalığı artırmaya yönelik interaktif web uygulaması.
        </h2>
        <p class="lead">
          Siber güvenlik alanı kapsamında gizlilik, güvenlik, dijital mahremiyet
          ve dijital okuryazarlık alanında farkındalık oluşturma ve araştırma projesi.
          Tüm bu konuları ortak paydada buluşturup web projesi ile kullanıcılara
          çevrimiçi anket soruları sorup verilen cevaplara göre senaryolar oluşturup tavsiyelerde bulunmak.
          Kullanım alışkanlıklarına göre ihtiyaca yönelik doğru ürün seçimini
          sağlamak. <a data-umami-event="ProjeDevamBtn" href="/proje"><strong>devamını oku...</strong></a>
        </p>
        <p class="lead">
          Bu uygulama, bilgi güvenliği farkındalığı artırmaya yönelik hazırlanmıştır. Uygulamayı kullanmadan önce
          lütfen aşağıdaki metni okuyunuz.
          Bu uygulamayı kullanarak,
          <a data-umami-event="LisansKabulBtn" href="/lisans"><strong> lisans ve kullanım koşullarını</strong></a> kabul
          etmiş
          sayılırsınız.
        </p>
      </div>
    </div>
  </div>
</section>

<hr>

<section aria-label="Anket">
  <button id="anketbtn1" style="color: var(--bs-body-color); border: 1px solid var(--bs-body-color);" type="button"
    class="btn-lg btn btn-info m-2" data-bs-toggle="modal" data-bs-target="#anketModal" data-bs-whatever="anket">
    Ankete Git >>
  </button>

  <div hidden id="onayAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Lütfen!</strong>
    anket için onay veriniz aksi takdirde anketi başlatamazsınız.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  <div hidden id="sonucAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Lütfen!</strong>
    anketi tamamlayınız aksi takdirde sonuçları göremezsiniz.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  <div class="modal fade modal-xl" id="anketModal" tabindex="-1" aria-labelledby="anketModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div style="background-color: var(--bs-tertiary-bg);" class="modal-header">
          <h1 class="modal-title fs-5" id="anketModalLabel">LİSANS VE KULLANIM KOŞULLARI</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php include('lisans.php'); ?>
        </div>
        <div
          style="background-color: var(--bs-tertiary-bg); border-radius: 2vh; border: 1px solid var(--bs-body-color);"
          class="sticky-bottom modal-footer clearfix d-inline-flex flex-row justify-content-end align-items-center">
          <form class="col">
            <span class="row">
              <a style="color: var(--bs-body-color); text-decoration: none !important;" href="#second-tab"
                class="fs-6 fw-semibold" target="_self" aria-label="Page Top" tabindex="0" rel="top">
                👆 Yukarı git
              </a>
            </span>
            <div class="form-check fs-6 fw-semibold mt-2">
              <input class="form-check-input" type="checkbox" value="" id="onay" data-umami-event="anketOnay">
              <label class="form-check-label" for="onay">
                Onaylıyorum.
              </label>
            </div>
            <button style="color: var(--bs-body-color); border: 1px solid var(--bs-body-color);" data-bs-toggle="modal"
              data-bs-target="#anketModal2" data-bs-whatever="anket" id="anketbtn" tabindex="-1"
              class="fs-6 fw-semibold btn btn-md btn-secondary mt-2" disabled>
              <a style="color: var(--bs-body-color); text-decoration: none !important;" data-umami-event="anketBaslat"
                href="/anket" class="fs-6 fw-semibold" target="_self" aria-label="Anket" tabindex="0">
                Anketi Başlat >>
              </a>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>





<?php require_once('inc/layout/footer.php'); ?>