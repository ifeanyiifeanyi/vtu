<?php
    use App\Controller\HomeController;
require "vendor/autoload.php";

//echo  HomeController:: index();
echo "<pre>";
var_dump(\App\Core\Request::uri());
echo "</pre>";