<?php

namespace CRssFeed\Rss;
 
/**
 * @backupGlobals disabled
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
    const NOW = "NOW()";
    
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
        
        //$db    = new \CRssFeed\Database\CDatabaseBasic();
        $this->db = self::$feed->setDI($this->di);
        
        //$db->setOptions(['dsn' => "sqlite:memory::", "verbose" => false]);
        //$db->connect();
        // Create 'rssfeed' table
        $this->db->dropTableIfExists("rssfeed");
        $this->db->execute();
        $this->db->createTable(
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
        $this->db->execute();
        // Create 'itemstest' table
        $this->db->dropTableIfExists("itemstest");
        $this->db->execute();
        $this->db->createTable(
            'itemstest',
            [
                'id'    => ['integer', 'auto_increment', 'primary key', 'not null'],
                'pagekey'  => ['varchar(80)'],
                'name'  => ['varchar(80)'],
                'content'  => ['text'],
                'timestamp'  => ['datetime'],
            ]
        );
        $this->db->execute();
        // Insert test data into 'rssfeed' table
        $this->db->insert(
            'rssfeed',
            [
            'pagekey',
            'title',
            'description',
            'language'
            ]
        );
        $this->db->execute(['pagekey', 'title', 'description', 'language']);
        //self::PAGEKEY, self::TITLE, self::DESCRIPTION, self::LANGUAGE
        // Insert test data into 'itemstest' table
        $this->db->insert(
            'itemstest',
            [
            'pagekey',
            'content',
            'name',
            'timestamp'
            ]
        );
        $this->db->execute(['pagekey', 'content', 'staffan', 'NOW()']);
        //self::PAGEKEY, self::CONTENT, self::NAME, self::NOW
 
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
 