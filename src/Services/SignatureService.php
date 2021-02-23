<?php


namespace Bradesco\Services;


use Bradesco\Models\Signature;

class SignatureService
{

    static public function createRequestArray(Signature $signature): array
    {
        return [
            $signature->getVerb(),
            $signature->getUri(),
            $signature->getAgency(),
            $signature->getAccount(),
            json_encode($signature->getBody()),
            $signature->getAccessToken(),
            $signature->getNonce(),
            $signature->getTimestamp(),
            $signature->getAlgorithm()
        ];
    }

    static public function requestString($signature): string
    {
        return vsprintf("%s\n%s\nagencia=%d&conta=%d\n%s\n%s\n%d\n%s\n%s", self::createRequestArray($signature));
    }

    static public function bradRequestSignature(Signature $signature, $private_key, $password = null)
    {
        return CertService::sign(self::requestString($signature), $private_key, $password);
    }
}
