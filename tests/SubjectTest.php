<?php


class SubjectTest extends \PHPUnit_Framework_TestCase
{
    /** @var  \Xacmlphp\Subject */
    private $subject;

    public function setUp()
    {
        $this->subject = new \Xacmlphp\Subject();
    }

    public function testAttributeSet()
    {
        $this->subject->addAttribute(new \Xacmlphp\Attribute('foo', 'bar'));
        $this->subject->addAttribute(new \Xacmlphp\Attribute('bar', 'foo'));
        $this->assertCount(2, $this->subject->getAttributes());
        foreach ($this->subject->getAttributes() as $attr) {
            $this->assertInstanceOf('\\Xacmlphp\\Attribute', $attr);
        }
    }
}
