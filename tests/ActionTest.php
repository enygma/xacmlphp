<?php


class ActionTest extends PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $obj = new \Xacmlphp\Action();
        $this->assertInstanceOf('\\Xacmlphp\\Action', $obj);
    }

    public function testSetType()
    {
        $obj = new \Xacmlphp\Action('type');
        $this->assertEquals('type', $obj->getType());
    }
}
