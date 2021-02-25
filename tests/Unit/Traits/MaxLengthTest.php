<?php


namespace Tests\Unit\Traits;


use Bradesco\Exceptions\MaxLengthException;
use PHPUnit\Framework\TestCase;

class MaxLengthTest extends TestCase
{
    private TestClass $trait;

    protected function setUp(): void
    {
        parent::setUp();
        $this->trait = new TestClass();
    }

    public function testGetScalable()
    {
        $this->trait->setAttributeScalable(['name' => 5]);
        $this->assertIsArray($this->trait->getAttributeScalable());
        $this->assertArrayHasKey('name',$this->trait->getAttributeScalable());
        $this->assertEquals(5, $this->trait->getAttributeScalable()['name']);
    }

    public function testValidateLength()
    {
        $this->trait->setAttributeScalable(['name' => 5]);
        $this->assertTrue($this->trait->validateLength());
    }

    public function testValidateLengthException()
    {
        $this->trait->setAttributeScalable(['name' => 4]);
        $this->expectException(MaxLengthException::class);
        $this->trait->validateLength();
    }

}