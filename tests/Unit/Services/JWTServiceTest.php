<?php


namespace Tests\Unit\Services;


use Bradesco\Services\JWTService;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

class JWTServiceTest extends TestCase
{
    private $service;
    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new JWTService();
        $this->service->setPayload([]);
    }

    public function testGetSetHeader()
    {
        $this->service->setHeader(['teste'=>'teste']);
        $this->assertArrayHasKey('teste',$this->service->getHeader());
        $this->assertEquals('teste',$this->service->getHeader()['teste']);
    }

    public function testGetSetPayload()
    {
        $this->service->setPayload(['teste'=>'teste']);
        $this->assertArrayHasKey('teste',$this->service->getPayload());
        $this->assertEquals('teste',$this->service->getPayload()['teste']);
    }

    public function testCreateJWT()
    {
        $this->service->setPayload([
            'sub' => 'application_id',
            'iat' => (string)strtotime(Carbon::now()->toDateTimeString()),
            'exp' => (string)strtotime(Carbon::now()->addDay()->toDateTimeString()),
            'jti' => (string)Carbon::now()->unix(),
        ]);
        $this->assertIsString($t=$this->service->createJWTToken(__DIR__.'/private.key.pem','1235'));
    }

}
