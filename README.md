Oasisphp
==========================
The Oasisphp library is an implementation of the OASIS/XACML standard for Policy-based
authorization. It's a work in progress, but the basic concepts are there.

## The OASIS Standard

The [OASIS/XACML standard](http://docs.oasis-open.org/xacml/3.0/xacml-3.0-core-spec-os-en.pdf) is a
well-defined XML-based structure for evaluating attributes on Policies against attributes on Subjects
to see if there's a match (based on Operation rules and combining Algorithms).

#### Terminology:

- **PolicySet:** Set of Policy objects
- **Policy:** Defines the policies to evaluate for authoriation. Policies contain sets of Rules
    that are evaluated and the results are combined according to the Policy's Algorithm for an
    overall Policy pass/fail status
- **Rule:** A Rule is made of of a set of Matches (inside a Target) that are used to evaluate
    authorization
- **Match:** An object that defines the property to look at (Designator) and the value to check
    against (Value) and the Operation to perform (like "StringEqual") for Permit/Deny result
- **Attribute:** Property on a Subject, Resource, Action or Environment
- **Algorithm:** Evaluation method for combining results of the object (like Policy or Rule). In
    the OASIS spec, these are called *Functions*.
- **Effect:** According to the spec, this can only be "PERMIT" or "DENY"
- **Enforcer:** Point of enforcement of the access, called the PEP (Policy Enforcement Point)
    in the OASIS spec.
- **Decider:** The object that handles the decision logic, tracing down from Policies to Matches.
    Called the PDP (Policy Decision Point) in the OASIS spec.
- **Resource:** An object representing a "something" the Subject is trying to access.

## Example Usage:

This is a basic interpretation of the OASIS XACML structure and flow. It sets up the Policy structure
with Rules & Matches first, then assigns them to the Resource. Then, the Subject and Resource are
passed in to the Enforcer to check if they're allowed or not:

```php
<?php

require_once 'vendor/autoload.php';

$enforcer = new \Oasisphp\Enforcer();

$decider = new \Oasisphp\Decider();
$enforcer->setDecider($decider);

// Create some Matches
$match1 = new \Oasisphp\Match();
$match1->setOperation('StringEqual')
    ->setDesignator('property1')
    ->setValue('test')->setId('TestMatch1');

$match2 = new \Oasisphp\Match();
$match2->setOperation('StringEqual')
    ->setDesignator('property1')
    ->setValue('test1234')->setId('TestMatch2');

// Create a Target container for our Matches
$target = new \Oasisphp\Target();
$target->addMatches(array($match1, $match2));

// Make a new Rule and add the Target to it
$rule1 = new \Oasisphp\Rule();
$rule1->setTarget($target)
    ->setId('TestRule')
    ->setEffect('Permit')
    ->setDescription(
        'Test to see if there is an attribute on the subject'
        .'that exactly matches the word "test"'
    )
    ->setAlgorithm(new \Oasisphp\Algorithm\DenyOverrides());

// Make two new policies and add the Rule to it (with our Match)
$policy1 = new \Oasisphp\Policy();
$policy1->setAlgorithm(new \Oasisphp\Algorithm\AllowOverrides())
    ->setId('Policy1')
    ->addRule($rule1);

$policy2 = new \Oasisphp\Policy();
$policy2->setAlgorithm(new \Oasisphp\Algorithm\DenyOverrides())
    ->setId('Policy2')
    ->addRule($rule1);


// Create the subject with its own Attribute
$subject = new \Oasisphp\Subject();
$subject->addAttribute(
    new \Oasisphp\Attribute('property1', 'test')
);

// Link the Policies to the Resource
$resource = new \Oasisphp\Resource();
$resource
    ->addPolicy($policy1)
    ->addPolicy($policy2);


$environment = null;
$action = null;

$result = $enforcer->isAuthorized($subject, $resource);

/**
 * So, because the Subject has the "property1" Atrribute and it's
 * set to "test", the $result is true
 */

echo "\n\n".' END RESULT: '.var_export($result, true);
echo "\n\n";

?>
```