<?php
/*
    Load all the declared files in given namespace
*/
/**
 * @param string $class
 */
spl_autoload_register(function($class){

    $prefix = 'MVC\\';

    $length = strlen($prefix);

    $base_directory = __DIR__ . '\\' ;

    // Check if prefix witf class exist
    if(strncmp($prefix, $class, $length !== 0)){
        return;
    }

    $relative_class = substr($class, $length);

    $file = $base_directory . $relative_class . '.php';

    // Check if file class exist
    if(file_exists($file)){
        require $file;
    }

});