<?php


class OperationTest extends PHPUnit_Framework_TestCase
{
    /** @var  \Xacmlphp\Operation */
    protected $mock;

    public function setUp()
    {
        $this->mock = $this->getMockForAbstractClass('\\Xacmlphp\\Operation', ['foo', 'bar']);
    }

    public function testProperties()
    {
        $this->assertEquals('foo', $this->mock->getProperty1());
        $this->assertEquals('bar', $this->mock->getProperty2());
    }
}
