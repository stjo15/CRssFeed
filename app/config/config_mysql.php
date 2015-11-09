<?php

// Settings for private server
/*

define('DB_USER', 'YourDatabaseUserName');
define('DB_PASSWORD', 'YourPassword'); 

return [
    // Set up details on how to connect to the database
    'dsn'     => "mysql:memory::",
    'username'        => DB_USER,
    'password'        => DB_PASSWORD,
    'driver_options'  => [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
    'table_prefix'    => "mvc_",

    // Display details on what happens
    'verbose' => false,

    // Throw a more verbose exception when failing to connect
    'debug_connect' => 'false',
];
*/

return [
    'dsn' => "sqlite:memory::";
];
