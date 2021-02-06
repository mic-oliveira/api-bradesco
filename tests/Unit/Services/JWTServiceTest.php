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

    public function testCreateJWT()
    {
        $this->service->setPayload([
            'sub' => 'id de aplicação fornecido pelo bradesco',
            'iat' => (string)strtotime(Carbon::now()->toDateTimeString()),
            'exp' => (string)strtotime(Carbon::now()->addDay()->toDateTimeString()),
            'jti' => (string)Carbon::now()->unix(),
        ]);
        $this->assertIsString($t=$this->service->createJWTToken(__DIR__.'/private.key.pem'));
    }

}
