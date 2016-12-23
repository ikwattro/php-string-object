<?php

namespace Ikwattro\String\Tests;

use Ikwattro\String\StringArray;
use Ikwattro\String\StringObject;

class StringArrayTest extends \PHPUnit_Framework_TestCase
{
    public function testStringArrayInstance()
    {
        $o = new StringArray(['a','b','c']);
        $this->assertEquals('a', $o->get(0));
    }

    public function testSize()
    {
        $o = new StringArray(['a','b','c']);
        $this->assertEquals(3, $o->size());
    }

    public function testAdd()
    {
        $o = new StringArray(['a','b','c']);
        $this->assertEquals(3, $o->size());
        $o->add('d');
        $this->assertEquals(4, $o->size());
    }

    public function testContains()
    {
        $o = new StringArray(['a','b','c']);
        $this->assertTrue($o->contains('a'));
    }

    public function testContainsWithStringObject()
    {
        $o = new StringArray(['a', 'b', 'c']);
        $this->assertTrue($o->contains(StringObject::newInstance('b')));
    }

    public function testGetFirstElement()
    {
        $o = new StringArray([]);
        $this->assertNull($o->first());
        $o->add("a");
        $this->assertEquals("a", $o->first());
    }

    public function testGetLastElement()
    {
        $o = new StringArray([]);
        $this->assertNull($o->last());
        $o->add("a");
        $o->add("b");
        $o->add("c");
        $this->assertEquals("c", $o->last());
    }
}