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
    protected function setUp(): void
    {
        parent::setUp();
        $this->cache = new FilesystemAdapter();

    }

    public function testRequestString()
    {
        var_dump($this->cache->getItem('token.access_token')->get());
        $signature = new Signature();
        $signature->setVerb('POST');
        $signature->setUri('/v1.1/jwt-service');
        $signature->setAgency(111111);
        $signature->setAccount(5122);
        $signature->setAlgorithm('SHA256');
        $signature->setBody(json_encode(['teste' => 'valor']));
        $signature->setAccessToken($this->cache->getItem('token.access_token')->get());
        $signature->setTimestamp(Carbon::now()->toDateTimeLocalString());
        $signature->setNonce(Carbon::now()->timestamp);
        $brad = SignatureService::bradRequestSignature($signature,__DIR__.'/private.key.pem','1235');
        var_dump($signature->toArray());
        var_dump($brad);
    }

}
