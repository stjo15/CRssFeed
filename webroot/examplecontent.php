

<?php

/* This link could be added in your content, for example a blog page, for the
user to click on to go to the RSS feed page. Change file path according to your application. */

$xmlfile = ANAX_APP_PATH . 'rss/' . $pagekey . "_rss.xml";
if(file_exists($xmlfile)) {
    // Create link to the RssFeedController view action
    echo "<a href=".$this->url->create('rss/view/'.$pagekey)." title='RSS'>RSS Feed</a>";
}


/* Add this code to the code when new content is added to update the xml file.
       Change file path to the xml file according to your application. */
    
    $xmlfile = ANAX_APP_PATH . 'rss/' . $pagekey . "_rss.xml";
         if(file_exists($xmlfile)) {
             $rss = new \Anax\Rss\RssFeed();
             $rss->setDI($this->di);
             $xml = $rss->getFeed($this->pagekey);
             $fh = fopen($xmlfile, 'w') or die("can't open file");
             fwrite($fh, $xml);
             fclose($fh);
         }


?>

