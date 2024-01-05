<?php
  if (isset($GLOBALS['title'])) {
  echo '
  <title>' . $GLOBALS['title'] . '|okudumanladim.com' . '</title>';
  } else {
  if (isset($_SESSION["user"]))
  { echo "Merhaba" . $_SESSION["user"];
    '| okudumanladim.com' . '</title>';
  } else {
    echo
    '<title>' . 'okudumanladim.com' . '</title>';}
  }
  if (isset($GLOBALS['description'])) {
  echo '
  <meta name="description" content="' . $GLOBALS['description'] . '" />';
  } else {
  echo '
  <meta name="description"
    content="Kişisel bilgi güvenliği farkındalığının artırılmasına yönelik interaktif web platformu." />';
  }
  if (isset($GLOBALS['keywords'])) {
  echo '
  <meta name="keywords" content="' . $GLOBALS['keywords'] . '" />';
  } else {
  echo '
  <meta name="keywords"
    content="Siber Güvenlik, Bilgi Güvenliği, Siber Tehditler, Ağ Güvenliği, Veri Koruma, Kötü Amaçlı Yazılımlar, Şifreleme, Güvenlik Duvarı, Kimlik Doğrulama, Sızma Testi" />
  ';
  }
  if (isset($GLOBALS['robots'])) {
  echo '
  <meta name="robots" content="' . $GLOBALS['robots'] . '" />';
  } else {
  echo '
  <meta name="robots" content="index, follow, max-snippet:-1, max-video-preview:-1, max-image-preview:-1" />';
  }?>