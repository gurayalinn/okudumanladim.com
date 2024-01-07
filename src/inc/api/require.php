<?php

ini_set('session.use_strict_mode', 1);
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 0);
ini_set('session.cookie_samesite', 'Lax');
ini_set('session.cookie_lifetime', 0);
ini_set('session.use_cookies', 1);

ini_set('session.gc_maxlifetime', 1440);
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);

ini_set('session.sid_length', 128);
ini_set('session.sid_bits_per_character', 6);

ini_set('session.hash_function', 'sha256');
ini_set('session.hash_bits_per_character', 5);

ini_set('session.referer_check', '');
ini_set('session.lazy_write', 1);

ini_set('upload_max_filesize', '20M');
ini_set('post_max_size', '21M');
ini_set('memory_limit', '512M');
ini_set('mbstring.func_overload', 0);
ini_set('always_populate_raw_post_data', -1);
ini_set('default_charset', 'UTF-8');
ini_set('output_buffering', 0);
ini_set('max_execution_time', 0);
ini_set('max_input_time', -1);
ini_set('max_input_vars', 10000);
ini_set('expose_php', 'off');
ini_set('allow_url_fopen', 'off');
ini_set('allow_url_include', 'off');


require_once 'core/Config.php';
require_once 'core/Connect.php';
require_once 'helpers/UtilHelper.php';
require_once 'helpers/SessionHelper.php';



Session::init();
$user = $_SESSION;

$msg = "MySQL PDO Connection Successful";
Util::debug_console($msg);