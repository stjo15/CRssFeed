<?php
/**
 * Add the RSS controller class to your config file for pagecontrollers.
 *
 */


$di->set('RssController', function() use ($di) {
    $controller = new \CRssFeed\Rss\RssFeedController();
    $controller->setDI($di);
    return $controller;
});

