<?php


namespace Bradesco\Services;


use Bradesco\Models\Signature;
use GuzzleHttp\Client;

class AuthService
{
    private Client $client;
    private array $headers = [
        'X-Brad-Once' => null,
        'X-Brad-Timestamp' => null,
        'X-Brad-Algorithm' => 'SHA256',
    ];


    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://proxy.api.prebanco.com.br',
            'verify' => false
        ]);
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    public function accessToken(Signature $signature, string $private_key)
    {
        $signature->validateAttributes();
        $this->client->request($signature->getVerb(),$signature->getUri());
    }

    private function makeHeaders(Signature $signature) {
        return [];
    }


}
