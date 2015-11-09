<?php

namespace CRssFeed\Rss;
 
/**
 * A test for RssFeedController.
 *
 */
class RssFeedControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test 
     *
     * @return void
     *
     */
    public function testCreateElement() 
    {
        $el = new \Mos\HTMLForm\CFormElement('test');

        $res = $el['name'];
        $exp = 'test';
        $this->assertEquals($res, $exp, "Created element name missmatch.");

        $res = $el->characterEncoding;
        $exp = 'UTF-8';
        $this->assertEquals($res, $exp, "Character encoding missmatch.");
    }
    
}