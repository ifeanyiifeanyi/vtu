<?php

namespace App\Core;

class Route{
    public static $routes = [];

    public static function routeHandler($uri, $controlArgs, $method){

        // fetch route parameters
        if(preg_match_all("/\{[a-zA-Z0-9]+\}/", $uri, $matches)){
            //convert to dynamic regex
            $uri2 = preg_replace("/\{[a-zA-Z0-9]+\}/","([a-zA-Z0-9]+)",  $uri);

            // escape 
            $uri2 = str_replace("/","\/", $uri2);
            $uri2 = '/^' .$uri2. '$/' ; 
        }  else {
            $uri2 = $uri;
            $matches = false;
        }
        self::$routes[] = [
            'uri' => $uri,
            'preg' =>$uri2,
            'matches' => $matches,
            'controlArgs' => $controlArgs,
            'method' => $method
        ];
    }

    public static function get($uri, $controlArgs){
        self::routeHandler($uri, $controlArgs, 'GET');
    }
    public static function post($uri, $controlArgs){
        self::routeHandler($uri, $controlArgs, 'POST');
    }
    public static function put($uri, $controlArgs){
        self::routeHandler($uri, $controlArgs, 'PUT');
    }
    public static function delete($uri, $controlArgs){
        self::routeHandler($uri, $controlArgs, 'DELETE');
    }
    public static function any($uri, $controlArgs){
        self::routeHandler($uri, $controlArgs, 'ANY');
    }

    public static function notFound(){
        echo '404';
    }

    public static function notFoundHeader(){
        echo 'No route found for this request';
    }
    public static function classNotFound($class){
        echo "'{$class}' Class not found";
    }

    public static function run() {
        echo "<pre>";
        var_dump(self::$routes);
        echo "</pre>";
    }
}
