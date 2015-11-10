<?php

namespace CRssFeed\Rss;
 
/**
 * A test for RssFeed.
 *
 */
class RssFeedTest extends \PHPUnit_Framework_TestCase
{
    static private $feed;
    const PAGEKEY =  "pagekey";
    const TITLE =  "Example Feed";
    const DESCRIPTION =  "Example feed description";
    const NAME =  "Testadmin";
    const CONTENT =  "This is an example content of the RSS Feed";
    const LANGUAGE =  "sv-se";
    
    /**
     * setUpBeforeClass, called once for all tests in this class.
     *
     * @return void
     *
     */
    public static function setUpBeforeClass()
    {
        self::$feed = new RssFeed();
        self::$feed->setDI($this->di);
        self::$feed->setOptions(['dsn' => "sqlite:memory::", "verbose" => false]);
        self::$feed->connect();
        // Create 'rssfeed' table
        self::$feed->dropTableIfExists("rssfeed");
        self::$feed->execute();
        self::$feed->createTable(
            'rssfeed',
            [
                'id'    => ['integer', 'auto_increment', 'primary key', 'not null'],
                'pagekey'  => ['varchar(80)'],
                'title'  => ['text'],
                'description'  => ['text'],
                'language'  => ['text'],
                'image_title'  => ['text'],
                'image_url'  => ['text'],
                'image_link'  => ['text'],
                'image_width'  => ['int(11)'],
                'image_height'  => ['int(11)'],
            ]
        );
        self::$mumin->execute();
        // Create 'itemstest' table
        self::$feed->dropTableIfExists("itemstest");
        self::$feed->execute();
        self::$feed->createTable(
            'itemstest',
            [
                'id'    => ['integer', 'auto_increment', 'primary key', 'not null'],
                'pagekey'  => ['varchar(80)'],
                'name'  => ['varchar(80)'],
                'content'  => ['text'],
                'timestamp'  => ['datetime'],
            ]
        );
        self::$mumin->execute();
        // Insert test data into 'rssfeed' table
        self::$mumin->insert(
            'rssfeed',
            ['pagekey'],
            ['title'],
            ['description'],
            ['language']
        );
        self::$mumin->execute([self::PAGEKEY],[self::TITLE],[self::DESCRIPTION],[self::LANGUAGE]);
        // Insert test data into 'itemstest' table
        self::$mumin->insert(
            'itemstest',
            ['pagekey'],
            ['content'],
            ['name'],
            ['timestamp']
        );
        self::$mumin->execute([self::PAGEKEY],[self::CONTENT],[self::NAME],['NOW()']);
 
    }
    
    /**
     * Test getFeed() with parameter 'pagekey'.
     *
     * @return void
     *
     */
    public function testGetFeed() 
    {
        $res = self::$feed->getFeed('pagekey');
        $prefix = '<?xml version="1.0" encoding="utf-8"';
        $this->assertStringStartsWith($prefix, $res, "The function does not return a valid string.");

    }
    
    
    
}
 