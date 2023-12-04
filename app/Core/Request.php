<?php
namespace App\Core;

class Request{
    public static function base()
    {
        return trim(dirname($_SERVER['SCRIPT_NAME']), "/");


    }
}