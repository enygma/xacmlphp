<?php


class EnforcerTest extends PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $obj = new \Xacmlphp\Enforcer();
        $this->assertInstanceOf('\\Xacmlphp\\Enforcer', $obj);
        $this->assertEmpty($obj->getDecider());

        $decider = new \Xacmlphp\Decider();
        $obj2 = new \Xacmlphp\Enforcer($decider);
        $this->assertInstanceOf('\\Xacmlphp\\Decider', $obj2->getDecider());
    }

    public function testIsAuthorized()
    {
        $enforcer = new \Xacmlphp\Enforcer();

        $decider = new \Xacmlphp\Decider();
        $enforcer->setDecider($decider);

        $match1 = new \Xacmlphp\Match('StringEqual', 'property1', 'TestMatch1', 'test');
        $match2 = new \Xacmlphp\Match('StringEqual', 'property2', 'TestMatch2', 'test2');

        $target = new \Xacmlphp\Target();
        $target->addMatches(array($match1, $match2));


        $rule1 = new \Xacmlphp\Rule();
        $rule1->setTarget($target)
            ->setId('TestRule')
            ->setEffect('Permit')
            ->setDescription(
                'Test to see if there is an attribute on the subject'
                .'that exactly matches the word "test"'
            )
            ->setAlgorithm(new \Xacmlphp\Algorithm\DenyOverrides());


        $policy1 = new \Xacmlphp\Policy();
        $policy1->setAlgorithm('AllowOverrides')->setId('Policy1')->addRule($rule1);

        $subject = new \Xacmlphp\Subject();
        $subject->addAttribute( new \Xacmlphp\Attribute('property1', 'test'));

        $resource = new \Xacmlphp\Resource();
        $resource->addPolicy($policy1);

        $action = new \Xacmlphp\Action();

        $this->assertTrue($enforcer->isAuthorized($subject, $resource, $action));

        $subject->addAttribute(new \Xacmlphp\Attribute('property1', 'test1'));

        $this->assertFalse($enforcer->isAuthorized($subject, $resource, $action));

        $subject->clearAttributes();
        $subject
            ->addAttribute(new \Xacmlphp\Attribute('property1', 'test')) // true
            ->addAttribute(new \Xacmlphp\Attribute('property1', 'test2')) // false
            ->addAttribute(new \Xacmlphp\Attribute('property2', 'test2')); //true

        // But this will true, because policy is AllowOverrides
        $this->assertTrue($enforcer->isAuthorized($subject, $resource, $action));

        $policy2 = new \Xacmlphp\Policy();
        $policy2->setAlgorithm('DenyOverrides')->setId('Policy2')->addRule($rule1);
        // let add new policy
        $resource->addPolicy($policy2);

        $this->assertFalse($enforcer->isAuthorized($subject, $resource, $action));

    }
}
