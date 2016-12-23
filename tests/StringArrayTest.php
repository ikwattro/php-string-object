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
}