<?php
session_start();

spl_autoload_register(function ($class) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

    if (str_ends_with($file, 'Controller.php')) {

        require 'Controllers/' . $file;

    } elseif (str_ends_with($file, 'Service.php')) {

        require 'Services/' . $file;
    } elseif (str_ends_with($file, 'Manager.php')) {

        require 'Models/Managers/' . $file;
    } else {
        require 'Models/' . $file;
    }
});

?>