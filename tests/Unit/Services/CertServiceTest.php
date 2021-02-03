<?php


namespace Tests\Unit\Services;


use Bradesco\Services\CertService;
use Exception;
use PHPUnit\Framework\TestCase;

class CertServiceTest extends TestCase
{
    private string $private_key_path;
    private string $public_key_path;
    private string $certificate_path;
    private CertService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->private_key_path = __DIR__.'/private.key.pem';
        $this->public_key_path = __DIR__.'/public.key.pem';
        $this->certificate_path = __DIR__.'/public.cert.pem';
        $this->service = new CertService();
    }

    public function testSetKeyParams()
    {
        $key = $this->service->getKeyParams();
        $this->assertIsArray($key);
        $this->assertArrayHasKey('digest_alg',$key);
        $this->assertArrayHasKey('private_key_bits',$key);
        $this->assertArrayHasKey('private_key_type',$key);
    }

    public function testSetDistinguishedNames()
    {
        $distinguished_names = $this->service->getDistinguishedNames();
        $this->assertIsArray($distinguished_names);
        $this->assertArrayHasKey('countryName',$distinguished_names);
        $this->assertArrayHasKey('stateOrProvinceName',$distinguished_names);
        $this->assertArrayHasKey('localityName',$distinguished_names);
        $this->assertArrayHasKey('organizationName',$distinguished_names);
        $this->assertArrayHasKey('organizationalUnitName',$distinguished_names);
        $this->assertArrayHasKey('commonName',$distinguished_names);
        $this->assertArrayHasKey('emailAddress',$distinguished_names);
    }

    public function testValidateprivateKeY()
    {
        file_exists($this->private_key_path) ? unlink($this->private_key_path) : null;
        $this->expectException(Exception::class);
        $this->service::validateKeyPath($this->private_key_path);
    }

    public function testCreatePrivateKey()
    {
        $this->assertTrue($this->service->createPrivateKey($this->private_key_path));
        var_dump(file_get_contents($this->private_key_path));
    }

    public function testCreatePublicKey()
    {
        file_exists($this->public_key_path) ? unlink($this->public_key_path) : null;
        $this->assertTrue($this->service->createPublicKey($this->private_key_path,$this->public_key_path));
        var_dump(file_get_contents($this->public_key_path));
    }

    public function testCreateX509File()
    {
        $this->service->createPrivateKey($this->private_key_path);
        $this->assertTrue($this->service->createCertificate($this->private_key_path,$this->certificate_path));
    }

    public function testX509()
    {
        $this->assertEquals(1,$this->service->verifyX509($this->certificate_path,$this->public_key_path));
    }
}
