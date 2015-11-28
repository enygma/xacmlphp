<?php


class AttributeTest extends PHPUnit_Framework_TestCase
{
    public function testProperties()
    {
        $obj = new \Xacmlphp\Attribute('foo', 'bar');
        $this->assertEquals('foo', $obj->getName());
        $this->assertEquals('bar', $obj->getValue());
    }
}
