<?php
session_start();
session_destroy();


function clearAuthCookie() {

	unset($_COOKIE['uid']);
	unset($_COOKIE['remember_me']);
	unset($_COOKIE['AUTH']);
	setcookie('uid', null, -1, '/');
	setcookie('remember_me', null, -1, '/');
	setcookie('AUTH', null, -1, '/');
}



if(isset($_COOKIE['uid']) && isset($_COOKIE['remember_me']) && isset($_COOKIE['AUTH'])){
	clearAuthCookie();
}

header('Location: index.php');
exit();

 ?>