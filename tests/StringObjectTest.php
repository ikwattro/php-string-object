<?php

namespace Ikwattro\String\Tests;

use Ikwattro\String\StringArray;
use Ikwattro\String\StringObject;

class StringObjectTest extends \PHPUnit_Framework_TestCase
{
    public function testStringIsCreated()
    {
        $o = StringObject::newInstance("string");
        $this->assertEquals("string", $o);
        $this->assertEquals("string", $o);
    }

    public function testStringIsTrimmed()
    {
        $o = StringObject::newInstance("   Some Text Here ");
        $this->assertEquals("Some Text Here", $o->trim());
    }

    public function testStringIsUpper()
    {
        $o = StringObject::newInstance("Some Text");
        $this->assertEquals("SOME TEXT", $o->toUpper());
    }

    public function testStringIsLower()
    {
        $o = StringObject::newInstance("SOme Text");
        $this->assertEquals("some text", $o->toLower());
    }

    public function testStringIsReplaced()
    {
        $o = StringObject::newInstance("Some-Text-Here");
        $this->assertEquals("SomeTextHere", $o->replace("-",""));
    }

    public function testStringIsSplittedIntoStringArray()
    {
        $o = StringObject::newInstance("Some-Text-Here");
        $this->assertInstanceOf(StringArray::class, $o->split("-"));
        $this->assertEquals(3, $o->split("-")->size());
    }

    public function testAppend()
    {
        $o = StringObject::newInstance("some text");
        $o->append(" here");
        $this->assertEquals("some text here", $o);
    }

    public function testAppendWithStringObject()
    {
        $o = StringObject::newInstance("some text here");
        $o->append(StringObject::newInstance(" and here"));
        $this->assertEquals("some text here and here", $o);
    }
}