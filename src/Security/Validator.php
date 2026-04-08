<?php
namespace App\Security;

class Validator
{
    public static function required($value)
    {
        return !empty($value);
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function cne($value)
    {
        return preg_match('/^[A-Z0-9]{6,20}$/', $value);
    }
}