<?php
namespace App\Security;

class Sanitizer
{
    public static function clean($value)
    {
        return trim(htmlspecialchars($value));
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_SANITIZE_EMAIL);
    }

    public static function int($value)
    {
        return (int)$value;
    }
}