<?php


class RuleTest extends PHPUnit_Framework_TestCase
{
    public function testGettersAndSetters()
    {
        $rule = new \Xacmlphp\Rule();
        $target = new \Xacmlphp\Target();
        $rule->setTarget($target)
            ->setId('FooId')
            ->setEffect('Permit')
            ->setDescription('Bar')
            ->setAlgorithm(new \Xacmlphp\Algorithm\DenyOverrides());

        $this->assertEquals('FooId', $rule->getId());
        $this->assertEquals('PERMIT', $rule->getEffect());
        $this->assertEquals('Bar', $rule->getDescription());
        $this->assertInstanceOf('\\Xacmlphp\\Target', $rule->getTarget());
        $this->assertInstanceOf('\\Xacmlphp\\Algorithm', $rule->getAlgorithm());
    }

    /**
     *  @expectedException \InvalidArgumentException
     *  @expectedExceptionMessage Invalid effect setting FOO
     */
    public function testWrongEffect()
    {
        $rule = new \Xacmlphp\Rule();
        $rule->setEffect('foo');
    }
}
