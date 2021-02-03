<?php


namespace Tests\Unit\Traits;

use Bradesco\Traits\Jsonable;
use PHPUnit\Framework\TestCase;

class JsonableTest extends TestCase
{
    private $jsonable;
    protected function setUp(): void
    {
        parent::setUp();
        $this->jsonable = $this->getObjectForTrait(Jsonable::class);
    }

    public function testToJson()
    {
        $this->assertJson($this->jsonable->toJson());
    }

}
