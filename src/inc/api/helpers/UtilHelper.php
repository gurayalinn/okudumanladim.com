<?php
defined('BASE_PATH') or exit('No direct script access allowed');

class Util
{

    public static function head(string $title): void
    {
        include(SITE_ROOT.'/layout/head.inc.php');
    }

    public static function footer(): void
    {
        include(SITE_ROOT.'/layout/footer.inc.php');
    }

    public static function display(string $string): string
    {
        return htmlspecialchars($string);
    }

    public static function xss_clean(string $string): string
    {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }
    public static function clean_input(string $data): string
     {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

    public static function randomCode(int $int): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $int; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }

    // Check if user is a valid user
    public static function isUser(): void
    {
        // If user is logged in
        if (!Session::get('login')) {
            // Prevents infinite redirect loop
            if (basename($_SERVER['PHP_SELF']) !== 'login.php' && basename($_SERVER['PHP_SELF']) !== 'register.php') {
                Util::redirect('/admin/login.php');
            }
        }
        // Prevents logged in users to access login or register
        if (Session::get('login')) {
            if (basename($_SERVER['PHP_SELF']) == 'login.php' || basename($_SERVER['PHP_SELF']) == 'register.php') {
                Util::redirect('/admin');
            }
        }
    }

    public static function redirect(string $location): void
    {
        header("location: http://".$_SERVER['HTTP_HOST'].$location);
exit;
}


public static function debug_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);
    echo ("<script>console.log('PHP DEBUG : " . json_encode($output) . "');</script>");
}

// Check is user is admin
public static function isAdmin(): void
{
if (!Session::get('admin')) {
Util::redirect('../');
}
}
}