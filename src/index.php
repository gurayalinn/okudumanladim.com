<?php require_once('inc/layout/header.php');
Session::init();
session_start();
$user = null;
$_SESSION['user_id'] = 1;
?>

<?php
if (isset($_SESSION['user_id'])) {
  $user = $con->query("SELECT * FROM users WHERE id = " . $_SESSION['user_id'])->fetch(PDO::FETCH_ASSOC);
}
echo "<pre>";
print_r($user);
echo "</pre>";
?>
<header>
  <navbar class="navbar">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="/">HOME</li>
        <li class="breadcrumb-item">
          <a href="/license.php">LICENSE</a>
        </li>
        &nbsp;
        <li>
          <a tabindex="0" target="_self" rel="top" id="btnSwitch">
            🌓
          </a>
        </li>
      </ol>
    </nav>
  </navbar>
</header>

<main id="content">
  <article>
    <section aria-label="Introduction">
      <h1><i>OKUDUMANLADIM.COM</i></h1>
      <p>Kişisel bilgi güvenliği farkındalığının artırılmasına yönelik interaktif web platformu.</p>
      <h2>Projenin Kısa Özeti:</h2>
      <p>
        Siber güvenlik alanı kapsamında kişisel verilerin gizliliği güvenliği mahremiyeti
        ve dijital okuryazarlık konularında farkındalık yaratılarak web tabanlı yazılım
        platformunda senaryolar oluşturulmasını ve bu konuda araştırma çalışmalarını içerecektir.
        Siber güvenlik alanı kapsamında gizlilik, güvenlik, dijital mahremiyet
        ve dijital okuryazarlık alanında farkındalık ve araştırma projesi.
        Tüm bu konuları ortak paydada buluşturup web projesi ile kullanıcılara
        çevrimiçi anket soruları sorup verilen cevaplara göre gereken önerileri sağlamak
        farkındalığı artırmak.
        Kullanım alışkanlıklarına göre ihtiyaca yönelik doğru ürün seçimini
        sağlamak.
      </p>
    </section>

    <section aria-label="Purpose">
      <h3>Projenin Gerekçesi:</h3>
      <p>
        Endüstri 4.0 ve dijital çağın ortasında olmamıza rağmen günümüzde
        dijital kimlik, kişisel verilerin korunması ve çevrimiçi güvenlik
        konularında duyarsızlık sorunu doğrultusunda farkındalık
        oluşturmayı hedefliyoruz.
      </p>
    </section>

    <section aria-label="Goals">
      <h3>Projenin Hedefleri :</h3>
      <p>
        - Siber güvenlik alanı kapsamında gizlilik, güvenlik, dijital mahremiyet ve dijital okuryazarlık alanında
        farkındalık yaratmak.
        <br /> - Tüm bu konuları ortak paydada buluşturup web projesi ile kullanıcılara çevrimiçi anket soruları sorup
        verilen cevaplara göre gereken önerileri sağlamak.
        <br /> - Kullanım alışkanlıklarına göre ihtiyaca yönelik doğru ürün seçimini
        kolaylaştırmak.
        <br /> - Dijital okuryazarlığın ve bilinçli dijital tüketimin sağlanması.
        <br /> - Çevrimiçi ortamlarda gizlilik, güvenlik ve mahremiyetin artırılması adına farkındalık oluşturmak.
        <br /> - Kullanıcı sözleşmeleri, gizlilik sözleşmeleri ve dijital lisansların farkındalığını artırıp okunmasını
        sağlamak.
        <br /> - KVKK ve GDPR gibi sözleşmelerin kişisel verilere etkisinin farkındalığını oluşturmak.
      </p>
    </section>

    <section aria-label="Target">
      <h3>Projenin Hedef Kitlesi:</h3>
      <p>
        Dijital ortamda bilinçli tüketici olmayı hedefleyenlere yönelik araştırma
        projesi.
      </p>
    </section>

    <section aria-label="Result">
      <h3>Projenin Muhtemel Sonuçları:</h3>
      <p>
        - Dijital lisansların okunmasında farkındalık.
        <br /> - Açık kaynak yazılımların daha fazla tercih edilmesi.
        <br /> - Bilinçli çevrimiçi kullanıcı sayısında gözlemlenebilir artış.
      </p>
    </section>
  </article>
</main>

<?php include('inc/layout/footer.php'); ?>