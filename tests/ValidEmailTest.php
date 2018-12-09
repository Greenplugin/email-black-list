<?php

namespace Greenplugin\EmailBlackList\Tests;

use Greenplugin\EmailBlackList\EmailBlackList;
use Greenplugin\EmailBlackList\BlockedEmail;
use greenplugin\EmailBlackList\InvalidEmailException;
use Mockery\Exception;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class ValidEmailTest extends TestCase
{
    public function testCheckIsValidEmail()
    {
        $this->assertSame('email@example.org', $this->invokeValidation('email@example.org'));
    }

    public function testIsInvalidEmail()
    {
        $this->expectException(InvalidEmailException::class);
        $this->invokeValidation('not email@example.org');
    }

    private function invokeValidation($email)
    {
        $object = new EmailBlackList();
        $class = new ReflectionClass($object);
        $method = $class->getMethod('validate');
        $method->setAccessible(true);
        return $method->invokeArgs($object, [$email]);
    }
}
