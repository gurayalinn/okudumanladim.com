<?php

// SITE PRESETS
define('SITE_ROOT', dirname(__FILE__, 3)); // DO NOT CHANGE
define('SITE_URL', 'http://'.$_SERVER['SERVER_NAME']); // DO NOT CHANGE
define('BASE_PATH', realpath(dirname(__FILE__)));
define('CURRENT_PAGE', basename($_SERVER['REQUEST_URI']));
define('CURRENT_PAGE_ARRAY', explode('/', CURRENT_PAGE));

// Website Name
const SITE_NAME = 'okudumanladim.com';

// Website Description
const SITE_DESC = 'okudumanladim.com';