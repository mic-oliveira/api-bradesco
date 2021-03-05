<?php


namespace Bradesco\Services;


use Firebase\JWT\JWT;

class JWTService
{
    private array $header;
    private array $payload;

    /**
     * JWTService constructor.
     * @param array|string[] $header
     * @param array $payload
     */
    public function __construct(array $header =  ['alg' => 'HS256', 'typ' => 'JWT'],
                                array $payload = ['aud' => 'https://proxy.api.prebanco.com.br/auth/server/v1.1/token',
                                    'sub' => 'Bradesco client_id', 'iat' => null, 'exp' => null, 'jti' => null,
                                    'ver' => '1.1'])
    {
        $this->header = $header;
        $this->payload = $payload;
    }


    public function getHeader(): array
    {
        return $this->header;
    }

    public function setHeader(array $header): void
    {
        $this->header = array_merge($this->header, $header);
    }

    public function getPayload(): array
    {
        return $this->payload;
    }

    public function setPayload(array $payload): void
    {
        $this->payload = array_merge($this->payload,$payload);
    }

    public function createJWTToken(string $private_key='path/private_key',string $password = null, array $payload = []): string
    {
        $private_key = openssl_get_privatekey(file_get_contents($private_key), $password);
        $this->setPayload($payload);
        return JWT::encode($this->getPayload(),$private_key, 'RS256');
    }
}
