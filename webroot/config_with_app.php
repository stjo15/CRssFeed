<?php
/**
 * Config file for pagecontrollers, creating an instance of $app.
 *
 */

// Get environment & autoloader.
require ANAX_INSTALL_PATH .'webroot/config.php'; 

// Create services and inject into the app. 
$di  = new \Anax\DI\CDIFactoryDefault();
$app = new \Anax\Kernel\CAnax($di);

$di->set('RssController', function() use ($di) {
    $controller = new \CRssFeed\Rss\RssFeedController();
    $controller->setDI($di);
    return $controller;
});