<?php


namespace Bradesco\Services;


use Bradesco\Models\Signature;
use GuzzleHttp\Client;
use Symfony\Component\Cache\Adapter\AbstractAdapter;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class AuthService
{
    private Client $client;
    private ?AbstractAdapter $cache;

    public function __construct(FilesystemAdapter $cache = null)
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


    public function accessToken(string $assertion)
    {
        $request = $this->client->request('POST','/auth/server/v1.1/token',
            [
                'headers' => [
                    'Content-type' => 'application/x-www-form-urlencoded'
                ],
                'form_params' => [
                    'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
                    'assertion' => $assertion
                ],
            ]
        );
        $token = json_decode($request->getBody()->getContents());
        $this->cache ? $this->setCache($token->access_token,$token->expires_in) : null;
        return $token->access_token;
    }

    public function setCache(string $access_token_value,$expires_in): bool
    {
        $access_token = $this->cache->getItem('token.access_token');
        $access_token->set($access_token_value);
        $access_token->expiresAfter($expires_in);
        $this->cache->save($access_token);
        return $access_token ? true : false;
    }

    public function authorize(Signature $signature): string
    {
        $headers = $this->makeHeaders($signature);
        $request = $this->client->post($signature->getUri(), [
            'headers' => $headers,
            'query' => ['agencia' => $signature->getAgency(), 'conta' => $signature->getAccount()],
            'json' => $signature->getBody()
        ]);
        return $request->getBody()->getContents();
    }

    static public function makeHeaders(Signature $signature): array
    {
        return [
            'Authorization' => sprintf('Bearer %s', $signature->getAccessToken()),
            'X-Brad-Nonce'  =>  $signature->getNonce(),
            'X-Brad-Timestamp' => $signature->getTimestamp(),
            'X-Brad-Signature' => $signature->getBradSignature(),
            'X-Brad-Algorithm' => $signature->getAlgorithm(),
            'Content-type' => 'application/json'
        ];
    }

}
