<?php


namespace Bradesco\Services;

use Bradesco\Interfaces\BradescoBilletTemplateInterface;
use Bradesco\Models\Signature;
use GuzzleHttp\Client;
use Symfony\Component\Cache\Adapter\AbstractAdapter;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class BilletEmissionService
{
    private Client $client;
    private Signature $signature;
    private ?AbstractAdapter $cache;

    public function __construct(AbstractAdapter $cache = null)
    {
        $this->client = new Client([
            'verify' => false,
            'base_uri' => 'https://proxy.api.prebanco.com.br'
        ]);
        $this->cache = $cache;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    public function getSignature(): Signature
    {
        return $this->signature;
    }

    public function setSignature(Signature $signature): void
    {
        $this->signature = $signature;
    }

    public function getCache()
    {
        return $this->cache;
    }

    public function setCache(AbstractAdapter $cache): void
    {
        $this->cache = $cache;
    }

    public function emit(BradescoBilletTemplateInterface $billet)
    {
        $this->getSignature()->setBody($billet->parse());
        $headers = AuthService::makeHeaders($this->signature);
        return $this->client->request('POST',$this->signature->getUri(), [
            'headers' => $headers,
            'json' => $billet->parse(),
        ]);
    }
}
