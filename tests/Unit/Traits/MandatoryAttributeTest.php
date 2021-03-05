<?php


namespace Tests\Unit\Traits;


use Bradesco\Exceptions\ValidationException;
use PHPUnit\Framework\TestCase;

class MandatoryAttributeTest extends TestCase
{
    private TestClass $trait;

    protected function setUp(): void
    {
        parent::setUp();
        $this->trait = new TestClass();
    }

    public function testGetMandatory()
    {
        $this->trait->setMandatory(['id']);
        $this->assertIsArray($this->trait->getMandatory());
        $this->assertArrayHasKey('id',array_flip($this->trait->getMandatory()));
    }

    public function testValidatedAttribute()
    {
        $this->assertTrue($this->trait->validateAttributes());
    }

    public function testInvalidAttribute()
    {
        $this->trait->setMandatory(['amount']);
        $this->expectException(ValidationException::class);
        $this->trait->validateAttributes();
    }
}
