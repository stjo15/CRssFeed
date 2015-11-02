

<?php

// The MVC route to list all of your RSS feeds. Put this code in your MVC controller. 

$app->router->add('rss', function() use ($app) {
        
    $app->theme->setTitle("RSS Feeder");
    
    $app->dispatcher->forward([
        'controller' => 'rss',
        'action'     => 'list',
    ]);
     
});


?>

