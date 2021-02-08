<?php

namespace Tests\Unit\Traits;

use Bradesco\Traits\Arrayable;
use PHPUnit\Framework\TestCase;

class ArrayableTest extends TestCase
{
    private $trait;
    protected function setUp(): void
    {
        parent::setUp();
        $this->trait = new TestClass();
    }

    public function testToArray()
    {
        $this->assertIsArray($this->trait->toArray());
    }

}
