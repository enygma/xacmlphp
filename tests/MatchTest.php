<?php


class MatchTest extends PHPUnit_Framework_TestCase
{
    public function testConstructAndGetters()
    {
        $obj = new \Xacmlphp\Match('StringEqual', 'foo', 'Foo match', 'bar');
        $this->assertEquals('StringEqual', $obj->getOperation());
        $this->assertEquals('foo', $obj->getDesignator());
        $this->assertEquals('Foo match', $obj->getId());
        $this->assertEquals('bar', $obj->getValue());
    }

    public function testAttributes()
    {
        $obj = new \Xacmlphp\Match('StringEqual', 'foo', 'Foo match', 'bar');
        $obj->addAttribute(new \Xacmlphp\Attribute('foo', 'bar'));
        $this->assertCount(1, $obj->getAttributes());
        foreach ($obj->getAttributes() as $attribute) {
            $this->assertInstanceOf('\\Xacmlphp\\Attribute', $attribute);
        }
    }
}
