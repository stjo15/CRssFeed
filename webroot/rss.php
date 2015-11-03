<?php 
/**
 * This is a Anax pagecontroller.
 *
 */

// Get environment & autoloader and the $app-object.
require __DIR__.'/config_with_app.php'; 

// Read the config files for this theme
$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);

$app->theme->setVariable('title', "RSS Test Pagecontroller");

// Add custom stylesheets for this app

// Add routers for the pages

$app->router->add('', function() use ($app) {
    $app->theme->setTitle("Home");
    
    $app->views->add('rss/index');
});

$app->router->add('rss', function() use ($app) {
        
    $app->theme->setTitle("RSS Feeder");
    
    $app->dispatcher->forward([
        'controller' => 'rss',
        'action'     => 'list',
    ]);
     
});

$app->router->handle();

// Render the response using theme engine.

$app->theme->render();
