<?php


namespace Bradesco\Models;


class Signature extends Model
{
    private string $verb;
    private string $uri;
    private int $account;
    private int $agency;
    private array $body;
    private string $access_token;
    private int $nonce;
    private string $timestamp;
    private string $algorithm;
    private ?string $bradSignature = null;

    protected array $mandatory = [
        'verb',
        'uri',
        'account',
        'agency',
        'body',
        'access_token',
        'nonce',
        'timestamp',
        'algorithm'
    ];

    /**
     * Signature constructor.
     * @param array $body
     */
    public function __construct(array $body = [])
    {
        $this->body = $body;
    }


    public function getVerb(): string
    {
        return $this->verb;
    }

    public function setVerb(string $verb): void
    {
        $this->verb = $verb;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function setUri(string $uri): void
    {
        $this->uri = $uri;
    }

    public function getAccount(): ?int
    {
        return $this->account ?? null;
    }

    public function setAccount(int $account): void
    {
        $this->account = $account;
    }

    public function getAgency(): ?int
    {
        return $this->agency ?? null;
    }

    public function setAgency(int $agency): void
    {
        $this->agency = $agency;
    }

    public function getBody(): array
    {
        return $this->body;
    }

    public function setBody(array $body): void
    {
        $this->body = $body;
    }

    public function getAccessToken(): string
    {
        return $this->access_token;
    }

    public function setAccessToken(string $access_token): void
    {
        $this->access_token = $access_token;
    }

    public function getNonce(): int
    {
        return $this->nonce;
    }

    public function setNonce(int $nonce): void
    {
        $this->nonce = $nonce;
    }

    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    public function setTimestamp(string $timestamp): void
    {
        $this->timestamp = $timestamp;
    }

    public function getAlgorithm(): string
    {
        return $this->algorithm;
    }

    public function setAlgorithm(string $algorithm): void
    {
        $this->algorithm = $algorithm;
    }

    public function getBradSignature(): string
    {
        return $this->bradSignature;
    }

    public function setBradSignature(string $bradSignature): void
    {
        $this->bradSignature = $bradSignature;
    }

}
