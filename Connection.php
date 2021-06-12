<?php 
 
    define('DB_HOST','192.168.0.34');
    define('DB_USERNAME','testing1');
    define('DB_PASSWORD','Daffaganteng1!');
    define('DB_NAME', 'kotlin');

    $connection = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME)
    or die ("unable to connect");

    //  header('Content-Type: application/x-www-form-urlencoded');
?>