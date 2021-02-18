<?php

namespace Tests\Unit\Services;

use Bradesco\Models\Signature;
use Bradesco\Services\SignatureService;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class SignatureServiceTest extends TestCase
{
    private FilesystemAdapter $cache;
    private Signature $signature;
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->cache = new FilesystemAdapter();
        $this->signature = new Signature();
        $this->signature->setVerb('POST');
        $this->signature->setUri('/v1.1/jwt-service');
        $this->signature->setAgency(111111);
        $this->signature->setAccount(5122);
        $this->signature->setAlgorithm('SHA256');
        $this->signature->setBody(['teste' => 'valor']);
        $this->signature->setTimestamp(Carbon::now()->toDateTimeLocalString());
        $this->signature->setNonce(Carbon::now()->timestamp);
    }
    
    public function testCreateRequestString()
    {
        $this->signature->setAccessToken($this->cache->getItem('token.access_token')->get());
        $this->assertIsArray(SignatureService::createRequestArray($this->signature));
    }

    public function testBradRequestSignature()
    {
        $this->signature->setAccessToken($this->cache->getItem('token.access_token')->get());
        $this->assertIsString(SignatureService::bradRequestSignature($this->signature,__DIR__.'/private.key.pem','1235'));
    }

    public function testRequestString()
    {
        $this->signature->setAccessToken($this->cache->getItem('token.access_token')->get());
        var_dump($this->cache->getItem('token.access_token')->get());
        $this->assertIsString(SignatureService::requestString($this->signature));
    }

}
