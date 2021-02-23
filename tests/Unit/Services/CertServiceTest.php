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

    public function testKeyParams()
    {
        $this->service->setKeyParams(['test' => 'test']);
        $this->assertIsArray($this->service->getKeyParams());
        $this->assertArrayHasKey('test',$this->service->getKeyParams());
        $this->assertEquals('test', $this->service->getKeyParams()['test']);
    }

    public function testDistinguishedNames()
    {
        $distinguished_names = [
            'test' => 'test'
        ];
        $this->service->setDistinguishedNames($distinguished_names);
        $this->assertIsArray($this->service->getDistinguishedNames());
        $this->assertArrayHasKey('test',$this->service->getDistinguishedNames());
        $this->assertEquals('test',$this->service->getDistinguishedNames()['test']);
    }

    public function testValidateprivateKeY()
    {
        file_exists($this->private_key_path) ? unlink($this->private_key_path) : null;
        $this->expectException(Exception::class);
        $this->service::validateKeyPath($this->private_key_path);
    }

    public function testCreatePrivateKey()
    {
        $this->assertTrue($this->service->createPrivateKey($this->private_key_path,'1235'));
    }

    public function testCreatePublicKey()
    {
        file_exists($this->public_key_path) ? unlink($this->public_key_path) : null;
        $this->assertTrue($this->service->createPublicKey($this->private_key_path,$this->public_key_path,'1235'));
    }

    public function testCreateFailed()
    {
        $this->service->createPrivateKey($this->private_key_path,'1235');
        $this->expectException(Exception::class);
        $this->service->createCertificate('not_exist_path',$this->certificate_path,'1235');
    }

    public function testCreateCertificate()
    {
        $this->service->createPrivateKey($this->private_key_path,'1235');
        $this->assertTrue($this->service->createCertificate($this->private_key_path,$this->certificate_path,'1235'));
    }

    public function testX509()
    {
        $this->assertEquals(1,$this->service->verifyX509($this->certificate_path,$this->public_key_path));
    }

}
