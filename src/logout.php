<?php

include 'inc/api/require.php';
include 'inc/api/controllers/authController.php';

(new authController())->logout();
Util::redirect('/anket');