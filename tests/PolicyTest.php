<?php


class PolicyTest extends PHPUnit_Framework_TestCase
{
    /** @var  \Xacmlphp\Policy */
    private $policy;

    public function setUp()
    {
        $this->policy = new \Xacmlphp\Policy();
    }

    public function testAlgorithm()
    {
        $algorithm = new Xacmlphp\Algorithm\AllowOverrides();
        $this->policy->setAlgorithm($algorithm);
        $this->assertInstanceOf('\\Xacmlphp\\Algorithm', $this->policy->getAlgorithm());

        $this->policy->setAlgorithm('DenyOverrides');
        $this->assertInstanceOf('\\Xacmlphp\\Algorithm\\DenyOverrides', $this->policy->getAlgorithm());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid algorithm foo
     */
    public function testInvalidAlgorithmString()
    {
        $this->policy->setAlgorithm('foo');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Algorithm must be instance of \Xacmlphp\Algorithm
     */
    public function testInvalidAlgorithmObject()
    {
        $algorithm = new Xacmlphp\Action();
        $this->policy->setAlgorithm($algorithm);
    }

    public function testTarget()
    {
        $this->policy->setTarget('foo');
        $this->assertEquals('foo', $this->policy->getTarget());
    }

    public function testId()
    {
        $this->policy->setId('foo');
        $this->assertEquals('foo', $this->policy->getId());
    }

    public function testDescription()
    {
        $this->policy->setDescription('foo');
        $this->assertEquals('foo', $this->policy->getDescription());
    }

    public function testAction()
    {
        $action = new \Xacmlphp\Action('foo');
        $this->policy->addAction($action);
        $this->assertInstanceOf('\\Xacmlphp\\Action', $this->policy->getAction());
    }

    public function testRules()
    {
        $this->assertCount(0, $this->policy->getRules());
        $rule = new \Xacmlphp\Rule();
        $this->policy->addRule($rule);
        $this->assertCount(1, $this->policy->getRules());
        foreach ($this->policy->getRules() as $rule) {
            $this->assertInstanceOf('\\Xacmlphp\\Rule', $rule);
        }
    }
}
