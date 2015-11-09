<?php

namespace CRssFeed\Rss;
 
/**
 * A test for RssFeed.
 *
 */
class RssFeedTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * Test getFeed() with parameter 'pagekey'.
     *
     * @return void
     *
     */
    public function testGetFeed() 
    {
        $di    = new \Anax\DI\CDIFactoryDefault();
        
        $feed = new RssFeed('pagekey');
        $feed->setDI($di);

        $res = $feed->getFeed('pagekey');
        $prefix = '<?xml version="1.0" encoding="utf-8"';
        $this->assertStringStartsWith($prefix, $res, "The function does not return a valid string.");

    }
    
    
    
}
 