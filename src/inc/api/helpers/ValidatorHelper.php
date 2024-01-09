<?php

class Validator
{
    public static function registerForm(
        string $username,
        string $password,
        string $confirmPassword,
    ): string|bool {
        // Validate username
        $validateUsername = self::validateUsername($username);
        if ($validateUsername) {
            return (string) $validateUsername;
        }

        // Validate password
        $validatePassword = self::validatePassword($password);
        if ($validatePassword) {
            return (string) $validatePassword;
        }

        // Validate confirmPassword
        if (empty($confirmPassword) && $password != $confirmPassword) {
            return "Passwords do not match, please try again.";
        }

        return false;
    }



    public static function registerFormGuest(
        string $username,
    ): string {
        $validateUsername = self::validateUsername($username);
        if ($validateUsername) {
            return (string) $validateUsername;
        }
        return false;
    }

    public static function loginFormGuest(string $username): string|bool
    {
        // Validate username
        $validateUsername = self::validateUsername($username);
        if ($validateUsername) {
            return (string) $validateUsername;
        }

        return false;
    }


    private static function validateUsername(string $username): string|bool
    {
        $usernameSchema = "/^[a-zA-Z0-9]*$/";
        if (empty($username)) {
            $error = "Lütfen bir kullanıcı adı giriniz.";
        } elseif (strlen($username) < 3) {
            $error = "Kullanıcı adı 3 karakterden kısa olamaz.";
        } elseif (strlen($username) > 20) {
            $error = "Kullanıcı adı çok uzun.";
        } elseif (!preg_match($usernameSchema, $username)) {
            $error = "Kullanıcı adı sadece harf ve rakamlardan oluşabilir.";
        }
        return $error ?? false;
    }

    private static function validatePassword(string $password): string|bool
    {
        if (empty($password)) {
            $error = "Please enter a password.";
        } elseif (strlen($password) < 4) {
            $error = "Password is too short.";
        } elseif (strlen($password) > 50) {
            $error = "Password is too long.";
        }
        return $error ?? false;
    }

    public static function loginForm(string $username, string $password): string|bool
    {
        // Validate username
        $validateUsername = self::validateUsername($username);
        if ($validateUsername) {
            return (string) $validateUsername;
        }

        // Validate password
        $validatePassword = self::validatePassword($password);
        if ($validatePassword) {
            return (string) $validatePassword;
        }

        return false;
    }

    public static function updatePasswordForm(
        string $currentPassword,
        string $newPassword,
        string $confirmPassword
    ): string|bool {
        // Validate $currentPassword
        $validatePassword = self::validatePassword($currentPassword);
        if ($validatePassword) {
            return (string) $validatePassword;
        }

        // Validate $newPassword
        $validateMewPassword = self::validatePassword($newPassword);
        if ($validateMewPassword) {
            return (string) $validateMewPassword;
        }

        // Validate confirmPassword
        if (empty($confirmPassword) || $newPassword !== $confirmPassword) {
            return "Passwords do not match, please try again.";
        }

        return false;
    }

}