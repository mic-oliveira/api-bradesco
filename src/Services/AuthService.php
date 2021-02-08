<?php


namespace Bradesco\Services;


use Bradesco\Models\Signature;
use Carbon\Carbon;
use DateTime;
use GuzzleHttp\Client;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Contracts\Cache\ItemInterface;

class AuthService
{
    private Client $client;
    private FilesystemAdapter $cache;
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
        $this->cache = new FilesystemAdapter();
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    public function accessToken(string $private_key,$password=null)
    {
        $request = $this->client->request('POST','/auth/server/v1.1/token',
            [
                'forms_params' => [
                    'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
                    'assertion' => (new JWTService)->createJWTToken($private_key,$password)
                ]
            ]
        );
        $token = json_decode($request->getBody()->getContents());
        $this->setCache($token->access_token,$token->expires_in);
        return $token;
    }

    public function setCache(string $access_token_value,$expires_in): bool
    {
        $access_token = $this->cache->getItem('token.access_token');
        $access_token->set($access_token_value);
        $this->setExpireIn($expires_in);
        $this->cache->get('token.access_token', function (ItemInterface $item) use ($expires_in) {
            $item->expiresAt(Carbon::createFromTimestamp($expires_in));
        });
        return $access_token ? true : false;
    }

    public function setExpireIn(int $expires_value): bool
    {
        $expires_at = $this->cache->getItem('token.expire_at');
        $expires_at->set($expires_value);
        return $expires_at ? true : false;
    }

    private function makeHeaders(Signature $signature) {

    }


}
