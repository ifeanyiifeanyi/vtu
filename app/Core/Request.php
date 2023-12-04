<?php
namespace App\Core;

class Request{
    public static function base()
    {
        return trim(dirname($_SERVER['SCRIPT_NAME']), "/");
    }

    // URI
    public static function uri()
    {
        if (!self::secure()){
            $trim_url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
            $get_base_url = self::base();
            if (strpos($trim_url, $get_base_url) === 0){
                $trim_url = substr($trim_url, strlen($get_base_url)) ;
            }
            return $trim_url ?: '/';
        }   else{
            return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");
        }
    }

    public static function secure()
    {
        return isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off';
    }

    // method
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    // IS POST
    public static function isPost()
    {
        return self::method() == 'POST';
    }

    public static function isGet()
    {
        return self::method() == 'GET';
    }
    public static function isAjax(){
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTPS_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    }

    public static function isPut()
    {
        return self::method() == 'PUT';
    }

    public static function isDelete()
    {
        return self::method() == "DELETE";
    }

    public static function isPatch()
    {
        return self::method() == "PATCH";
    }

    public static function isAny()
    {
        return self::isPost() || self::isGet() || self::isPut() || self::isDelete() || self::isPatch();
    }
}