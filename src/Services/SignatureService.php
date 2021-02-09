<?php


namespace Bradesco\Services;


use Bradesco\Models\Signature;

class SignatureService
{

    static public function createRequestString($signature): array
    {
        if ($signature instanceof Signature) {
            $signature = $signature->toArray();
        }
        return [
            $signature['verb'],
            $signature['uri'],
            $signature['agency'],
            $signature['account'],
            $signature['body'],
            $signature['access_token'],
            $signature['nonce'],
            $signature['timestamp'],
            $signature['algorithm']
        ];
    }

    static public function requestString($signature)
    {
        return $request = vprintf("%s\n%s\nagencia=%d&conta=%d\n%s\n%s\n%d\n%s\n%s", self::createRequestString($signature));
    }

    static public function bradRequestSignature($signature, $private_key, $password = null)
    {
        return CertService::sign(self::requestString($signature),$private_key,$password);
    }
}
