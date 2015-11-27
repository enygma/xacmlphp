<?php


class PolicySetTest extends PHPUnit_Framework_TestCase
{
    /** @var  \Xacmlphp\PolicySet */
    private $policySet;

    public function setUp()
    {
        $this->policySet = new \Xacmlphp\PolicySet();
    }

    public function testPolicySets()
    {
        $policy = new \Xacmlphp\Policy();
        $this->assertCount(0, $this->policySet->getPolicies());
        $this->policySet->addPolicy($policy);
        $this->assertCount(1, $this->policySet->getPolicies());
        foreach ($this->policySet->getPolicies() as $policy) {
            $this->assertInstanceOf('\\Xacmlphp\\Policy', $policy);
        }
    }

    public function testAlgorithm()
    {
        $algorithm = new Xacmlphp\Algorithm\DenyOverrides();
        $this->assertEmpty($this->policySet->getAlgorithm());
        $this->policySet->setAlgorithm($algorithm);
        $this->assertInstanceOf('\\Xacmlphp\\Algorithm\\DenyOverrides', $this->policySet->getAlgorithm());
    }
}
