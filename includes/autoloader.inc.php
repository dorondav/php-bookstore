<?php

spl_autoload_register('myAutoloader');

function myAutoloader($className)
{
    $uri = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    if (strpos($uri, 'includes') !== false) {
        $path = "../classes/";
    } else {
        $path = "classes/";
    }

    $ext = ".php";
    $fullPath = $path . $className . $ext;

    if (!file_exists($fullPath)) {
        return false;
    }


    include_once  $fullPath;
}