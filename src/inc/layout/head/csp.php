    <!-- SECURITY CONFIGS -->
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <meta http-equiv="x-dns-prefetch-control" content="on" />
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="Cache-Control" content="max-age=31536000" />
    <meta http-equiv="Strict-Transport-Security" content="max-age=31536000; includeSubDomains; preload">

    <!-- CSP CONFIG -->
    <meta http-equiv="Content-Security-Policy" content="
      default-src 'self' ;
      connect-src 'self' https://ssl.gstatic.com https://eu.umami.is https://www.google-analytics.com;
      style-src   'self' 'unsafe-inline' https://cdn.jsdelivr.net https://fonts.googleapis.com https://eu.umami.is;
      style-src-elem 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://ssl.gstatic.com https://fonts.gstatic.com https://fonts.googleapis.com;
      font-src    'self' https://fonts.gstatic.com;
      script-src  'self' 'nonce-8IBTHwOdqNKAWeKl7plt8g';
      script-src-elem 'self' 'nonce-8IBTHwOdqNKAWeKl7plt8g' https://cdn.jsdelivr.net https://eu.umami.is;
      img-src     'self' ;
      frame-src   'self' ;
      media-src   'self' ;
      object-src  'none' ;
      form-action 'self' ;
      child-src   'none' ;
      base-uri 'none';
      upgrade-insecure-requests;
      block-all-mixed-content;
      " />

    <link rel="preconnect" href="https://eu.umami.is" crossorigin />
    <link rel="dns-prefetch" href="https://eu.umami.is" />
